<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TestDifferentEndpoints extends Command
{
    protected $signature = 'sms:test-endpoints';
    protected $description = 'Test different SMS endpoints with the current token';

    public function handle()
    {
        $this->info("🧪 Testing different SMS endpoints...");
        
        $token = Cache::get('emma_sms_token')['token'] ?? null;
        if (!$token) {
            $this->error("❌ No token available. Run 'php artisan sms:token' first.");
            return 1;
        }
        
        $this->info("🔑 Using token: " . substr($token, 0, 50) . "...");
        
        $endpoints = [
            'http://api.emma.hk/sms/emmasmsjson.jsp',
            'http://sms.emma.hk/sms/emmasmsjson.jsp',
            'http://api.emma.hk/sms/send.jsp',
            'http://sms.emma.hk/sms/send.jsp',
            'http://api.emma.hk/sms/send',
            'http://sms.emma.hk/sms/send'
        ];
        
        $testPayload = [
            'sendrequest' => [
                'correlationid' => 'test_' . time(),
                'messages' => [
                    [
                        'phonenumbers' => '201008882269',
                        'content' => 'Test SMS - OTP: 123456',
                        'scheduledatetime' => '',
                        'senderid' => 'LUMIRIX'
                    ]
                ]
            ]
        ];
        
        foreach ($endpoints as $endpoint) {
            $this->info("\n🔗 Testing: " . $endpoint);
            
            try {
                $response = Http::timeout(30)
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $token
                    ])
                    ->post($endpoint, $testPayload);
                
                $this->info("Status: " . $response->status());
                $this->info("Response: " . $response->body());
                
                if ($response->successful()) {
                    $responseData = $response->json();
                    if (isset($responseData['sendresponse']['statuscode']) && 
                        $responseData['sendresponse']['statuscode'] === '0') {
                        $this->info("✅ SUCCESS! This endpoint works!");
                        $this->info("Use this endpoint: " . $endpoint);
                        return 0;
                    }
                }
                
            } catch (\Exception $e) {
                $this->error("Error: " . $e->getMessage());
            }
        }
        
        $this->error("❌ No working endpoints found");
        return 1;
    }
}
