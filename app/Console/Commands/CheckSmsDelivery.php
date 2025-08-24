<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CheckSmsDelivery extends Command
{
    protected $signature = 'sms:check-delivery {mobile} {--batch-id= : Specific batch ID to check}';
    protected $description = 'Check SMS delivery status and detailed response from EMMA SMS Gateway';

    public function handle()
    {
        $mobile = $this->argument('mobile');
        $batchId = $this->option('batch-id');
        
        $this->info("📱 SMS Delivery Status Check for: {$mobile}");
        $this->info("===============================================");
        
        try {
            // Step 1: Check if we have recent SMS records
            $this->info("\n=== STEP 1: Recent SMS Records ===");
            $this->checkRecentSmsRecords($mobile);
            
            // Step 2: Test sending a new SMS with detailed logging
            $this->info("\n=== STEP 2: Send Test SMS with Detailed Logging ===");
            $this->sendTestSmsWithLogging($mobile);
            
            // Step 3: Check delivery status if we have batch ID
            if ($batchId) {
                $this->info("\n=== STEP 3: Check Specific Batch ID ===");
                $this->checkBatchStatus($batchId);
            }
            
            // Step 4: Manual verification steps
            $this->info("\n=== STEP 4: Manual Verification Steps ===");
            $this->showManualVerificationSteps($mobile);
            
        } catch (\Exception $e) {
            $this->error("❌ SMS delivery check failed: " . $e->getMessage());
        }
        
        return 0;
    }
    
    protected function checkRecentSmsRecords($mobile)
    {
        $this->info("Checking recent SMS activity for {$mobile}...");
        
        // Check if we have any cached tokens
        $cachedToken = Cache::get('emma_sms_token');
        if ($cachedToken) {
            $this->info("✅ Cached token found (expires: " . $cachedToken['expires_at'] . ")");
        } else {
            $this->info("⚠️ No cached token found");
        }
        
        // Check recent logs for this mobile
        $this->info("📋 Recent SMS logs for {$mobile}:");
        $logFile = storage_path('logs/laravel.log');
        if (file_exists($logFile)) {
            $logs = file_get_contents($logFile);
            $lines = explode("\n", $logs);
            $recentLines = array_slice($lines, -100); // Last 100 lines
            
            $smsLogs = array_filter($recentLines, function($line) use ($mobile) {
                return str_contains($line, $mobile) && 
                       (str_contains($line, 'SMS') || str_contains($line, 'OTP'));
            });
            
            if (empty($smsLogs)) {
                $this->info("   No recent SMS logs found");
            } else {
                foreach (array_slice($smsLogs, -5) as $log) { // Show last 5
                    $this->info("   " . trim($log));
                }
            }
        }
    }
    
    protected function sendTestSmsWithLogging($mobile)
    {
        $this->info("Sending test SMS with detailed logging...");
        
        try {
            // Get fresh token
            $username = config('services.emma_sms.username');
            $password = config('services.emma_sms.password');
            $loginUrl = config('services.emma_sms.login_url');
            
            $credentials = base64_encode($username . ':' . $password);
            
            $this->info("🔐 Authenticating with EMMA SMS Gateway...");
            $authResponse = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . $credentials
                ])
                ->get($loginUrl);
                
            if (!$authResponse->successful()) {
                $this->error("❌ Authentication failed: " . $authResponse->status());
                return;
            }
            
            $authData = $authResponse->json();
            if (!isset($authData['users'][0]['token'])) {
                $this->error("❌ No token in authentication response");
                return;
            }
            
            $token = $authData['users'][0]['token'];
            $this->info("✅ Authentication successful, token length: " . strlen($token));
            
            // Send test SMS
            $this->info("📤 Sending test SMS...");
            $testPayload = [
                'sendrequest' => [
                    'correlationid' => 'test_delivery_' . time(),
                    'messages' => [
                        [
                            'phonenumbers' => $mobile,
                            'content' => 'Test SMS Delivery Check - ' . date('Y-m-d H:i:s') . ' - Please confirm if you receive this message.',
                            'scheduledatetime' => '',
                            'senderid' => config('services.emma_sms.sender_id')
                        ]
                    ]
                ]
            ];
            
            $this->info("📝 Payload being sent:");
            $this->line(json_encode($testPayload, JSON_PRETTY_PRINT));
            
            $sendResponse = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->post(config('services.emma_sms.send_url'), $testPayload);
                
            $this->info("📡 Response Status: " . $sendResponse->status());
            $this->info("📡 Response Body: " . $sendResponse->body());
            
            if ($sendResponse->successful()) {
                $responseData = $sendResponse->json();
                
                if (isset($responseData['sendresponse']['statuscode'])) {
                    $statusCode = $responseData['sendresponse']['statuscode'];
                    $reason = $responseData['sendresponse']['reason'] ?? 'No reason provided';
                    $batchId = $responseData['sendresponse']['batchid'] ?? 'No batch ID';
                    $correlationId = $responseData['sendresponse']['correlationid'] ?? 'No correlation ID';
                    
                    $this->info("\n📊 SMS Gateway Response Analysis:");
                    $this->info("   Status Code: {$statusCode}");
                    $this->info("   Reason: {$reason}");
                    $this->info("   Batch ID: {$batchId}");
                    $this->info("   Correlation ID: {$correlationId}");
                    
                    if ($statusCode === '0') {
                        $this->info("✅ SMS accepted by gateway successfully!");
                        $this->info("💡 Next steps:");
                        $this->info("   1. Check your phone for the message");
                        $this->info("   2. Check spam/junk folder");
                        $this->info("   3. Wait 1-2 minutes (delivery can be delayed)");
                        $this->info("   4. If no message, contact your mobile carrier");
                    } else {
                        $this->error("❌ SMS rejected by gateway: {$reason}");
                    }
                } else {
                    $this->error("❌ Unexpected response format from SMS gateway");
                }
            } else {
                $this->error("❌ Failed to send SMS: HTTP " . $sendResponse->status());
            }
            
        } catch (\Exception $e) {
            $this->error("❌ Exception during SMS test: " . $e->getMessage());
        }
    }
    
    protected function checkBatchStatus($batchId)
    {
        $this->info("Checking status for batch ID: {$batchId}");
        
        // Try different status endpoints
        $statusEndpoints = [
            'http://api.emma.hk/sms/status.jsp',
            'http://api.emma.hk/sms/delivery.jsp',
            'http://api.emma.hk/sms/batch.jsp'
        ];
        
        foreach ($statusEndpoints as $endpoint) {
            $this->info("🔍 Trying endpoint: {$endpoint}");
            
            try {
                $response = Http::timeout(30)->get($endpoint . '?batchid=' . $batchId);
                $this->info("   Status: " . $response->status());
                $this->info("   Response: " . $response->body());
                
                if ($response->successful()) {
                    $this->info("✅ Endpoint responded successfully");
                }
            } catch (\Exception $e) {
                $this->info("   Error: " . $e->getMessage());
            }
        }
    }
    
    protected function showManualVerificationSteps($mobile)
    {
        $this->info("🔍 Manual Verification Steps:");
        $this->info("1. Check your phone for SMS from 'LUMIRIX'");
        $this->info("2. Check spam/junk folder");
        $this->info("3. Verify mobile number format: {$mobile}");
        $this->info("4. Check if your carrier supports international SMS");
        $this->info("5. Try sending SMS to a different number");
        $this->info("6. Check EMMA SMS Gateway dashboard (if available)");
        $this->info("7. Contact EMMA SMS Gateway support with batch ID");
        
        $this->info("\n📞 Common SMS Delivery Issues:");
        $this->info("- Mobile number format (should include + and country code)");
        $this->info("- Carrier restrictions on international SMS");
        $this->info("- SMS gateway rate limiting");
        $this->info("- Network congestion or delays");
        $this->info("- SMS content filtering");
        
        $this->info("\n💡 Next Debug Steps:");
        $this->info("- Run: php artisan sms:check-delivery {$mobile}");
        $this->info("- Check Laravel logs: tail -f storage/logs/laravel.log");
        $this->info("- Test with different mobile number");
        $this->info("- Verify EMMA SMS Gateway account has sufficient balance");
    }
}
