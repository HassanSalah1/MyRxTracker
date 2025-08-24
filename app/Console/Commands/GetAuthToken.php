<?php

namespace App\Console\Commands;

use App\Services\EmmaSmsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetAuthToken extends Command
{
    protected $signature = 'sms:token';
    protected $description = 'Get EMMA SMS Gateway authentication token for testing';

    public function handle()
    {
        $this->info("🔐 Getting EMMA SMS Gateway authentication token...");
        
        try {
            $emmaService = new EmmaSmsService();
            
            // Use reflection to access protected method
            $reflection = new \ReflectionClass($emmaService);
            $method = $reflection->getMethod('authenticate');
            $method->setAccessible(true);
            
            $authResult = $method->invoke($emmaService);
            
            if ($authResult['success']) {
                $this->info("✅ Authentication successful!");
                $this->info("🔑 Token: " . $authResult['token']);
                $this->info("📏 Token length: " . strlen($authResult['token']) . " characters");
                
                $this->newLine();
                $this->info("📋 Postman Configuration:");
                $this->info("URL: " . config('services.emma_sms.send_url'));
                $this->info("Method: POST");
                $this->info("Headers:");
                $this->info("  Content-Type: application/json");
                $this->info("  Authorization: Bearer " . $authResult['token']);
                
                $this->newLine();
                $this->info("📝 JSON Body:");
                $this->info(json_encode([
                    'sendrequest' => [
                        'correlationid' => 'test_' . time(),
                        'messages' => [
                            [
                                'phonenumbers' => '201008882269',
                                'content' => 'Test SMS from Postman - OTP: 123456',
                                'scheduledatetime' => '',
                                'senderid' => config('services.emma_sms.sender_id')
                            ]
                        ]
                    ]
                ], JSON_PRETTY_PRINT));
                
            } else {
                $this->error("❌ Authentication failed");
                $this->error("Error: " . $authResult['message']);
                if (isset($authResult['error'])) {
                    $this->error("Details: " . $authResult['error']);
                }
            }
            
        } catch (\Exception $e) {
            $this->error("❌ Exception occurred: " . $e->getMessage());
        }
        
        return 0;
    }
}
