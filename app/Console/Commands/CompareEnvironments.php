<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CompareEnvironments extends Command
{
    protected $signature = 'env:compare';
    protected $description = 'Compare current environment with expected production settings';

    public function handle()
    {
        $this->info("🔍 Environment Configuration Comparison");
        $this->info("=========================================");
        
        $expectedConfig = [
            'SMS Gateway' => [
                'services.emma_sms.username' => 'healthcall-otp-api',
                'services.emma_sms.login_url' => 'http://api.emma.hk/sms/login.jsp',
                'services.emma_sms.send_url' => 'http://api.emma.hk/sms/emmasmsjson.jsp',
                'services.emma_sms.sender_id' => 'LUMIRIX',
                'services.emma_sms.enabled' => true,
            ],
            'OTP Settings' => [
                'otp.length' => 6,
                'otp.expiry_minutes' => 10,
                'otp.max_attempts' => 5,
                'otp.lockout_minutes' => 15,
            ],
            'App Settings' => [
                'app.debug' => false, // Should be false in production
                'app.env' => 'production',
            ]
        ];
        
        foreach ($expectedConfig as $section => $configs) {
            $this->info("\n📋 {$section}:");
            foreach ($configs as $key => $expected) {
                $actual = config($key);
                $status = $this->compareValues($expected, $actual);
                
                $this->line("  {$key}:");
                $this->line("    Expected: " . $this->formatValue($expected));
                $this->line("    Actual:   " . $this->formatValue($actual) . " {$status}");
            }
        }
        
        // Check required environment variables
        $this->info("\n🔑 Environment Variables:");
        $requiredEnvVars = [
            'EMMA_SMS_USERNAME',
            'EMMA_SMS_PASSWORD', 
            'EMMA_SMS_LOGIN_URL',
            'EMMA_SMS_SEND_URL',
            'EMMA_SMS_SENDER_ID',
            'DB_HOST',
            'DB_DATABASE',
            'DB_USERNAME',
            'APP_ENV',
            'APP_DEBUG'
        ];
        
        foreach ($requiredEnvVars as $var) {
            $value = env($var);
            $status = $value ? "✅ SET" : "❌ MISSING";
            $displayValue = in_array($var, ['EMMA_SMS_PASSWORD', 'DB_PASSWORD']) 
                ? ($value ? '[HIDDEN]' : 'NOT SET') 
                : $value;
            $this->line("  {$var}: {$displayValue} {$status}");
        }
        
        // Check critical file permissions (if on Unix-like system)
        if (PHP_OS_FAMILY !== 'Windows') {
            $this->info("\n📁 File Permissions:");
            $paths = [
                'storage/logs' => 'storage/logs',
                'storage/framework/cache' => 'storage/framework/cache',
                'storage/framework/sessions' => 'storage/framework/sessions',
                'bootstrap/cache' => 'bootstrap/cache'
            ];
            
            foreach ($paths as $name => $path) {
                if (file_exists($path)) {
                    $perms = substr(sprintf('%o', fileperms($path)), -4);
                    $writable = is_writable($path);
                    $status = $writable ? "✅ WRITABLE ({$perms})" : "❌ NOT WRITABLE ({$perms})";
                    $this->line("  {$name}: {$status}");
                } else {
                    $this->line("  {$name}: ❌ MISSING");
                }
            }
        }
        
        return 0;
    }
    
    protected function compareValues($expected, $actual)
    {
        if ($expected === $actual) {
            return "✅ MATCH";
        } elseif (is_bool($expected) && is_bool($actual)) {
            return "❌ MISMATCH";
        } elseif (is_numeric($expected) && is_numeric($actual)) {
            return $expected == $actual ? "✅ MATCH" : "❌ MISMATCH";
        } elseif (is_string($expected) && is_string($actual)) {
            return "❌ MISMATCH";
        } else {
            return "⚠️ TYPE MISMATCH";
        }
    }
    
    protected function formatValue($value)
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        } elseif (is_null($value)) {
            return 'null';
        } elseif (is_string($value)) {
            return "'{$value}'";
        } else {
            return (string) $value;
        }
    }
}
