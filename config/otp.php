<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OTP Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration options for the OTP system including
    | length, expiry time, rate limiting, and security settings.
    |
    */

    // OTP Code Settings
    'length' => env('OTP_LENGTH', 6),
    'expiry_minutes' => env('OTP_EXPIRY_MINUTES', 10),
    
    // Security Settings
    'max_attempts' => env('OTP_MAX_ATTEMPTS', 5),
    'lockout_minutes' => env('OTP_LOCKOUT_MINUTES', 15),
    
    // Rate Limiting
    'rate_limit_minutes' => env('OTP_RATE_LIMIT_MINUTES', 2),
    
    // SMS Gateway Settings
    'sms_gateway' => env('OTP_SMS_GATEWAY', 'emma_sms'),
    
    // Development/Testing Settings
    'development_mode' => env('OTP_DEVELOPMENT_MODE', false),
    'test_otp' => env('OTP_TEST_CODE', '123456'),
];
