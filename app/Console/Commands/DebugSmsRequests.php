<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\EmmaSmsService;

class DebugSmsRequests extends Command
{
    protected $signature = 'sms:debug {mobile}';
    protected $description = 'Debug SMS requests to compare with Postman';

    public function handle()
    {
        $mobile = $this->argument('mobile');
        $this->info("🔍 Debugging SMS requests for mobile: {$mobile}");
        
        try {
            // Step 1: Test Authentication
            $this->info("\n=== STEP 1: Testing Authentication ===");
            $this->testAuthentication();
            
            // Step 2: Test SMS Service Direct
            $this->info("\n=== STEP 2: Testing EmmaSmsService ===");
            $this->testSmsServiceDirect($mobile);
            
            // Step 3: Test OTP Service  
            $this->info("\n=== STEP 3: Testing OtpService ===");
            $this->testOtpService($mobile);
            
        } catch (\Exception $e) {
            $this->error("❌ Debug failed: " . $e->getMessage());
            $this->error("Stack trace: " . $e->getTraceAsString());
        }
        
        return 0;
    }
    
    protected function testAuthentication()
    {
        try {
            $username = config('services.emma_sms.username');
            $password = config('services.emma_sms.password');
            $loginUrl = config('services.emma_sms.login_url');
            
            $this->info("Login URL: {$loginUrl}");
            $this->info("Username: {$username}");
            $this->info("Password: {$password}");
            
            $credentials = base64_encode($username . ':' . $password);
            $this->info("Basic Auth: Basic {$credentials}");
            
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . $credentials
                ])
                ->get($loginUrl);
                
            $this->info("Status: " . $response->status());
            $this->info("Response: " . $response->body());
            
            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['users'][0]['token'])) {
                    $token = $data['users'][0]['token'];
                    $this->info("✅ Token obtained: " . substr($token, 0, 50) . "...");
                    return $token;
                } else {
                    $this->error("❌ No token in response");
                    return null;
                }
            } else {
                $this->error("❌ Authentication failed");
                return null;
            }
        } catch (\Exception $e) {
            $this->error("❌ Auth exception: " . $e->getMessage());
            return null;
        }
    }
    
    protected function testSmsServiceDirect($mobile)
    {
        try {
            $emmaService = new EmmaSmsService();
            $this->info("Testing EmmaSmsService->sendOtp()");
            
            // Enable detailed logging
            Log::info("=== DEBUGGING SMS SERVICE ===");
            
            $result = $emmaService->sendOtp($mobile, '123456');
            
            $this->info("SMS Service Result:");
            $this->info("Success: " . ($result['success'] ? 'true' : 'false'));
            $this->info("Message: " . $result['message']);
            
            if (isset($result['error'])) {
                $this->error("Error: " . $result['error']);
            }
            
            if (isset($result['batchid'])) {
                $this->info("Batch ID: " . $result['batchid']);
            }
            
        } catch (\Exception $e) {
            $this->error("❌ SMS Service exception: " . $e->getMessage());
        }
    }
    
    protected function testOtpService($mobile)
    {
        try {
            $this->info("Testing OtpService->generateAndSendOtp()");
            
            // Check if user exists
            $user = \App\Models\User::where('mobile', $mobile)->first();
            if (!$user) {
                $this->info("⚠️ User not found, creating test user...");
                try {
                    $user = \App\Models\User::create([
                        'name' => 'Debug User',
                        'mobile' => $mobile,
                        'password' => bcrypt('password'),
                        'role' => 'user',
                        'status' => 'active'
                    ]);
                    $this->info("✅ Test user created with ID: " . $user->id);
                } catch (\Exception $e) {
                    if (str_contains($e->getMessage(), 'Duplicate entry')) {
                        $this->info("✅ User already exists (duplicate entry error)");
                        $user = \App\Models\User::where('mobile', $mobile)->first();
                    } else {
                        throw $e;
                    }
                }
            } else {
                $this->info("✅ User found with ID: " . $user->id);
            }
            
            // Test OTP service
            $otpService = new \App\Services\OtpService(new EmmaSmsService());
            $result = $otpService->generateAndSendOtp($mobile, 'debug_test');
            
            $this->info("OTP Service Result:");
            $this->info("Success: " . ($result['success'] ? 'true' : 'false'));
            $this->info("Message: " . $result['message']);
            
            if (isset($result['error'])) {
                $this->error("Error: " . $result['error']);
            }
            
        } catch (\Exception $e) {
            $this->error("❌ OTP Service exception: " . $e->getMessage());
            $this->error("Stack trace: " . $e->getTraceAsString());
        }
    }
}
