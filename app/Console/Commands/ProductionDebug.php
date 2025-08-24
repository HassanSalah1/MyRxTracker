<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Services\EmmaSmsService;
use App\Services\OtpService;

class ProductionDebug extends Command
{
    protected $signature = 'sms:prod-debug {mobile?}';
    protected $description = 'Debug SMS system in production environment';

    public function handle()
    {
        $mobile = $this->argument('mobile') ?? '+201008882269';
        $this->info("🔍 Production Environment Debug");
        $this->info("==============================");
        
        try {
            // Environment Check
            $this->info("\n=== ENVIRONMENT CHECK ===");
            $this->checkEnvironment();
            
            // Configuration Check
            $this->info("\n=== CONFIGURATION CHECK ===");
            $this->checkConfiguration();
            
            // Database Check
            $this->info("\n=== DATABASE CHECK ===");
            $this->checkDatabase();
            
            // Network Connectivity Check
            $this->info("\n=== NETWORK CONNECTIVITY CHECK ===");
            $this->checkNetworkConnectivity();
            
            // SMS Gateway Authentication Test
            $this->info("\n=== SMS GATEWAY AUTHENTICATION TEST ===");
            $this->testSmsAuthentication();
            
            // Full SMS Test
            $this->info("\n=== FULL SMS TEST ===");
            $this->testFullSmsFlow($mobile);
            
        } catch (\Exception $e) {
            $this->error("❌ Production debug failed: " . $e->getMessage());
            $this->error("Stack trace: " . $e->getTraceAsString());
        }
        
        return 0;
    }
    
    protected function checkEnvironment()
    {
        $this->info("App Environment: " . app()->environment());
        $this->info("App Debug: " . (config('app.debug') ? 'true' : 'false'));
        $this->info("PHP Version: " . PHP_VERSION);
        $this->info("Laravel Version: " . app()->version());
        $this->info("App URL: " . config('app.url'));
        $this->info("Timezone: " . config('app.timezone'));
        $this->info("Locale: " . config('app.locale'));
        
        // Check if SSL is enforced
        $this->info("HTTPS Enforced: " . (config('app.force_https', false) ? 'true' : 'false'));
    }
    
    protected function checkConfiguration()
    {
        // EMMA SMS Configuration
        $this->info("EMMA SMS Configuration:");
        $this->info("  Username: " . config('services.emma_sms.username', 'NOT SET'));
        $this->info("  Password: " . (config('services.emma_sms.password') ? '[SET]' : 'NOT SET'));
        $this->info("  Login URL: " . config('services.emma_sms.login_url', 'NOT SET'));
        $this->info("  Send URL: " . config('services.emma_sms.send_url', 'NOT SET'));
        $this->info("  Sender ID: " . config('services.emma_sms.sender_id', 'NOT SET'));
        $this->info("  Enabled: " . (config('services.emma_sms.enabled') ? 'true' : 'false'));
        
        // OTP Configuration
        $this->info("\nOTP Configuration:");
        $this->info("  Length: " . config('otp.length', 'NOT SET'));
        $this->info("  Expiry (minutes): " . config('otp.expiry_minutes', 'NOT SET'));
        $this->info("  Max Attempts: " . config('otp.max_attempts', 'NOT SET'));
        $this->info("  Lockout (minutes): " . config('otp.lockout_minutes', 'NOT SET'));
        $this->info("  Development Mode: " . (config('otp.development_mode') ? 'true' : 'false'));
        
        // Cache Configuration
        $this->info("\nCache Configuration:");
        $this->info("  Driver: " . config('cache.default'));
        $this->info("  Redis Host: " . config('database.redis.default.host', 'N/A'));
        
        // Database Configuration
        $this->info("\nDatabase Configuration:");
        $this->info("  Driver: " . config('database.default'));
        $this->info("  Host: " . config('database.connections.mysql.host'));
        $this->info("  Database: " . config('database.connections.mysql.database'));
        $this->info("  Port: " . config('database.connections.mysql.port'));
    }
    
    protected function checkDatabase()
    {
        try {
            // Test database connection
            DB::connection()->getPdo();
            $this->info("✅ Database connection: OK");
            
            // Check users table
            $userCount = DB::table('users')->count();
            $this->info("✅ Users table: {$userCount} total users");
            
            // Check OTP fields exist
            $columns = DB::getSchemaBuilder()->getColumnListing('users');
            $otpFields = ['otp_code', 'otp_expires_at', 'otp_attempts', 'otp_locked_until'];
            foreach ($otpFields as $field) {
                $exists = in_array($field, $columns);
                $this->info(($exists ? "✅" : "❌") . " OTP field '{$field}': " . ($exists ? "EXISTS" : "MISSING"));
            }
            
            // Check recent OTP activity
            $recentOtpCount = DB::table('users')
                ->whereNotNull('otp_code')
                ->where('otp_expires_at', '>', now()->subHours(24))
                ->count();
            $this->info("📊 Recent OTP activity (24h): {$recentOtpCount} users");
            
        } catch (\Exception $e) {
            $this->error("❌ Database check failed: " . $e->getMessage());
        }
    }
    
    protected function checkNetworkConnectivity()
    {
        $endpoints = [
            'EMMA Login' => config('services.emma_sms.login_url'),
            'EMMA Send' => config('services.emma_sms.send_url'),
            'Google DNS' => 'http://8.8.8.8',
            'Test HTTP' => 'http://httpbin.org/get'
        ];
        
        foreach ($endpoints as $name => $url) {
            if (!$url) {
                $this->error("❌ {$name}: URL not configured");
                continue;
            }
            
            try {
                $start = microtime(true);
                $response = Http::timeout(10)->get($url);
                $duration = round((microtime(true) - $start) * 1000, 2);
                
                if ($response->successful()) {
                    $this->info("✅ {$name}: OK ({$duration}ms)");
                } else {
                    $this->error("❌ {$name}: HTTP {$response->status()} ({$duration}ms)");
                }
            } catch (\Exception $e) {
                $this->error("❌ {$name}: " . $e->getMessage());
            }
        }
    }
    
    protected function testSmsAuthentication()
    {
        try {
            $username = config('services.emma_sms.username');
            $password = config('services.emma_sms.password');
            $loginUrl = config('services.emma_sms.login_url');
            
            if (!$username || !$password || !$loginUrl) {
                $this->error("❌ SMS credentials not configured");
                return;
            }
            
            $credentials = base64_encode($username . ':' . $password);
            
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . $credentials
                ])
                ->get($loginUrl);
                
            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['users'][0]['token'])) {
                    $token = $data['users'][0]['token'];
                    $expiresAt = $data['users'][0]['expires_after'] ?? 'unknown';
                    $this->info("✅ SMS Authentication: SUCCESS");
                    $this->info("   Token Length: " . strlen($token));
                    $this->info("   Expires: " . $expiresAt);
                } else {
                    $this->error("❌ SMS Authentication: No token in response");
                    $this->error("   Response: " . $response->body());
                }
            } else {
                $this->error("❌ SMS Authentication: HTTP " . $response->status());
                $this->error("   Response: " . $response->body());
            }
            
        } catch (\Exception $e) {
            $this->error("❌ SMS Authentication failed: " . $e->getMessage());
        }
    }
    
    protected function testFullSmsFlow($mobile)
    {
        try {
            // Check if user exists
            $user = \App\Models\User::withTrashed()->where('mobile', $mobile)->first();
            if (!$user) {
                $this->info("⚠️ User not found, creating test user...");
                try {
                    $user = \App\Models\User::create([
                        'name' => 'Production Test User',
                        'mobile' => $mobile,
                        'password' => bcrypt('password'),
                        'role' => 'user',
                        'status' => 'active'
                    ]);
                    $this->info("✅ Test user created: ID " . $user->id);
                } catch (\Exception $e) {
                    if (str_contains($e->getMessage(), 'Duplicate entry')) {
                        $user = \App\Models\User::withTrashed()->where('mobile', $mobile)->first();
                        if ($user && $user->trashed()) {
                            $user->restore();
                            $this->info("✅ Test user restored: ID " . $user->id);
                        }
                    } else {
                        throw $e;
                    }
                }
            } else {
                if ($user->trashed()) {
                    $user->restore();
                    $this->info("✅ User restored: ID " . $user->id);
                } else {
                    $this->info("✅ User found: ID " . $user->id);
                }
            }
            
            // Test OTP Service
            $this->info("\nTesting OtpService...");
            $otpService = new OtpService(new EmmaSmsService());
            $result = $otpService->generateAndSendOtp($mobile, 'production_test');
            
            if ($result['success']) {
                $this->info("✅ OTP Service: SUCCESS");
                $this->info("   Message: " . $result['message']);
                if (isset($result['expires_in'])) {
                    $this->info("   Expires in: " . $result['expires_in'] . " seconds");
                }
            } else {
                $this->error("❌ OTP Service: FAILED");
                $this->error("   Message: " . $result['message']);
                if (isset($result['error'])) {
                    $this->error("   Error: " . $result['error']);
                }
            }
            
        } catch (\Exception $e) {
            $this->error("❌ Full SMS test failed: " . $e->getMessage());
        }
    }
}
