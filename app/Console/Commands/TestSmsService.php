<?php

namespace App\Console\Commands;

use App\Services\EmmaSmsService;
use App\Services\OtpService;
use Illuminate\Console\Command;

class TestSmsService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:test {mobile} {--otp=123456}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the SMS service by sending a test OTP';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mobile = $this->argument('mobile');
        $otp = $this->option('otp');

        $this->info("Testing SMS service for mobile: {$mobile}");
        $this->info("Test OTP: {$otp}");

        // Test EMMA SMS Service directly
        $this->info("\n--- Testing EMMA SMS Service ---");
        $emmaService = new EmmaSmsService();
        
        // Test authentication first
        $this->info("Testing authentication...");
        $authResult = $emmaService->sendOtp($mobile, $otp);

        if ($authResult['success']) {
            $this->info("✅ SMS sent successfully via EMMA Gateway");
            $this->info("Message: " . $authResult['message']);
            if (isset($authResult['batchid'])) {
                $this->info("Batch ID: " . $authResult['batchid']);
            }
            if (isset($authResult['correlationid'])) {
                $this->info("Correlation ID: " . $authResult['correlationid']);
            }
        } else {
            $this->error("❌ SMS failed to send");
            $this->error("Error: " . $authResult['message']);
            if (isset($authResult['error'])) {
                $this->error("Details: " . json_encode($authResult['error']));
            }
        }

        // Test OTP Service
        $this->info("\n--- Testing OTP Service ---");
        $otpService = new OtpService($emmaService);
        
        // First, check if user exists
        $user = \App\Models\User::where('mobile', $mobile)->first();
        if (!$user) {
            $this->warn("⚠️  User not found with mobile: {$mobile}");
            $this->info("Creating a test user for testing...");
            
            $user = \App\Models\User::create([
                'name' => 'Test User',
                'mobile' => $mobile,
                'password' => bcrypt('password'),
                'role' => \App\Enums\Roles::USER,
                'status' => \App\Enums\UserStatus::ACTIVE,
            ]);
            
            $this->info("✅ Test user created with ID: {$user->id}");
        }

        // Test OTP generation and sending
        $this->info("Generating and sending OTP...");
        $otpResult = $otpService->generateAndSendOtp($mobile, 'test');

        if ($otpResult['success']) {
            $this->info("✅ OTP generated and sent successfully");
            $this->info("Message: " . $otpResult['message']);
            if (isset($otpResult['expires_in'])) {
                $this->info("Expires in: " . $otpResult['expires_in'] . " seconds");
            }
        } else {
            $this->error("❌ OTP generation failed");
            $this->error("Error: " . $otpResult['message']);
        }

        // Test OTP verification
        $this->info("\n--- Testing OTP Verification ---");
        $verifyResult = $otpService->verifyOtp($mobile, $otp);

        if ($verifyResult['success']) {
            $this->info("✅ OTP verified successfully");
            $this->info("Message: " . $verifyResult['message']);
        } else {
            $this->error("❌ OTP verification failed");
            $this->error("Error: " . $verifyResult['message']);
            
            if (isset($verifyResult['remaining_attempts'])) {
                $this->warn("Remaining attempts: " . $verifyResult['remaining_attempts']);
            }
            
            if (isset($verifyResult['locked_until'])) {
                $this->warn("Account locked until: " . $verifyResult['locked_until']);
            }
        }

        // Test SMS Gateway balance (if supported)
        $this->info("\n--- Testing SMS Gateway Balance ---");
        $balanceResult = $emmaService->getBalance();

        if ($balanceResult['success']) {
            $this->info("✅ Balance retrieved successfully");
            if (isset($balanceResult['balance'])) {
                $this->info("💰 Balance: " . $balanceResult['balance']);
            }
            if (isset($balanceResult['currency'])) {
                $this->info("💱 Currency: " . $balanceResult['currency']);
            }
            if (isset($balanceResult['data'])) {
                $this->info("📊 Data: " . json_encode($balanceResult['data']));
            }
        } else {
            $this->warn("⚠️  Balance checking not supported or failed");
            $this->warn("Message: " . $balanceResult['message']);
            if (isset($balanceResult['note'])) {
                $this->warn("Note: " . $balanceResult['note']);
            }
        }

        $this->info("\n--- Test Complete ---");
        
        // Clean up test user if it was created
        if (isset($user) && $user->name === 'Test User') {
            $this->info("Cleaning up test user...");
            $user->delete();
            $this->info("✅ Test user cleaned up");
        }

        return 0;
    }
}
