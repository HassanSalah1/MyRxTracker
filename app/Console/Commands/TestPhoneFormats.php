<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TestPhoneFormats extends Command
{
    protected $signature = 'sms:test-phones';
    protected $description = 'Test different phone number formats with EMMA SMS Gateway';

    public function handle()
    {
        $this->info("📱 Testing different phone number formats...");
        
        $token = Cache::get('emma_sms_token')['token'] ?? null;
        if (!$token) {
            $this->error("❌ No token available. Run 'php artisan sms:token' first.");
            return 1;
        }
        
        $this->info("🔑 Using token: " . substr($token, 0, 50) . "...");
        $this->info("🔗 Endpoint: http://api.emma.hk/sms/emmasmsjson.jsp");
        
        $phoneFormats = [
            '201008882269',      // Egypt without +
            '+201008882269',     // Egypt with +
            '966501234567',      // Saudi without +
            '+966501234567',     // Saudi with +
            '85212345678',       // Hong Kong without +
            '+85212345678',      // Hong Kong with +
            '001201008882269',   // Egypt with 00
            '00966501234567',    // Saudi with 00
        ];
        
        $testPayload = [
            'sendrequest' => [
                'correlationid' => 'test_' . time(),
                'messages' => [
                    [
                        'phonenumbers' => '',
                        'content' => 'Test SMS - OTP: 123456',
                        'scheduledatetime' => '',
                        'senderid' => 'LUMIRIX'
                    ]
                ]
            ]
        ];
        
        foreach ($phoneFormats as $phone) {
            $this->info("\n📞 Testing phone: " . $phone);
            $testPayload['sendrequest']['messages'][0]['phonenumbers'] = $phone;
            
            try {
                $response = Http::timeout(30)
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $token
                    ])
                    ->post('http://api.emma.hk/sms/emmasmsjson.jsp', $testPayload);
                
                $this->info("Status: " . $response->status());
                $this->info("Response: " . $response->body());
                
                if ($response->successful()) {
                    $responseData = $response->json();
                    if (isset($responseData['sendresponse']['statuscode'])) {
                        if ($responseData['sendresponse']['statuscode'] === '0') {
                            $this->info("✅ SUCCESS! Phone format: " . $phone);
                            $this->info("Use this format for your phone numbers!");
                            return 0;
                        } else {
                            $this->info("❌ Failed: " . $responseData['sendresponse']['reason']);
                        }
                    }
                }
                
            } catch (\Exception $e) {
                $this->error("Error: " . $e->getMessage());
            }
        }
        
        $this->error("❌ No working phone formats found");
        return 1;
    }
}
