<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowLoginRequest extends Command
{
    protected $signature = 'sms:login-request';
    protected $description = 'Show Postman configuration for EMMA SMS Gateway login';

    public function handle()
    {
        $this->info("🔐 EMMA SMS Gateway - Login Request Configuration");
        $this->info("================================================");
        
        $username = config('services.emma_sms.username');
        $password = config('services.emma_sms.password');
        $loginUrl = config('services.emma_sms.login_url');
        
        $this->newLine();
        $this->info("📋 Request Details:");
        $this->info("Method: GET");
        $this->info("URL: " . $loginUrl);
        
        $this->newLine();
        $this->info("🔑 Authentication:");
        $this->info("Type: Basic Auth");
        $this->info("Username: " . $username);
        $this->info("Password: " . $password);
        
        $this->newLine();
        $this->info("📝 Headers:");
        $this->info("Content-Type: application/json");
        $this->info("Authorization: Basic " . base64_encode($username . ':' . $password));
        
        $this->newLine();
        $this->info("📊 Expected Response:");
        $this->info("Status: 200 OK");
        $this->info("Response Format:");
        $this->info(json_encode([
            'users' => [
                [
                    'token' => 'eyJhbGciOiJIUzI1NiJ9...',
                    'expires_after' => '2025-08-25T10:00:00Z',
                    'username' => $username,
                    'status' => 'ACTIVE'
                ]
            ]
        ], JSON_PRETTY_PRINT));
        
        $this->newLine();
        $this->info("💡 Postman Setup Instructions:");
        $this->info("1. Create a new request");
        $this->info("2. Set method to GET");
        $this->info("3. Set URL to: " . $loginUrl);
        $this->info("4. Go to Authorization tab");
        $this->info("5. Select 'Basic Auth' type");
        $this->info("6. Enter Username: " . $username);
        $this->info("7. Enter Password: " . $password);
        $this->info("8. Send request");
        $this->info("9. Copy the 'token' value from response");
        
        $this->newLine();
        $this->info("🔗 After Login - SMS Request:");
        $this->info("URL: " . config('services.emma_sms.send_url'));
        $this->info("Method: POST");
        $this->info("Header: Authorization: Bearer [token_from_login]");
        
        return 0;
    }
}
