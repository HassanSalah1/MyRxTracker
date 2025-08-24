# OTP System Implementation Guide

## Overview

This document describes the implementation of a comprehensive OTP (One-Time Password) system for mobile verification using the EMMA SMS Gateway. The system provides secure, rate-limited, and user-friendly OTP functionality for various use cases including password reset, mobile verification, and account security.

## Architecture

The OTP system consists of several key components:

1. **EmmaSmsService** - Handles communication with the EMMA SMS Gateway
2. **OtpService** - Manages OTP generation, validation, and security
3. **UserController** - API endpoints for OTP operations
4. **Database Schema** - OTP-related fields in the users table
5. **Configuration** - Environment-based settings for OTP behavior

## Features

### Security Features
- **Rate Limiting**: Prevents OTP spam (1 OTP per 2 minutes)
- **Attempt Limiting**: Locks account after 5 failed attempts
- **Automatic Lockout**: 15-minute lockout period after max attempts
- **OTP Expiry**: OTP codes expire after 10 minutes
- **Secure Generation**: Cryptographically secure random OTP generation

### User Experience Features
- **Resend OTP**: Users can request new codes with rate limiting
- **Clear Error Messages**: Informative feedback for various failure scenarios
- **Multi-language Support**: English and Chinese language support
- **Mobile-First Design**: Optimized for mobile applications

## Configuration

### Environment Variables

Add these variables to your `.env` file:

```env
# EMMA SMS Gateway Configuration
EMMA_SMS_API_KEY=your_api_key_here
EMMA_SMS_API_URL=https://api.emmasms.com/send
EMMA_SMS_SENDER_ID=LUMIRIX
EMMA_SMS_ENABLED=true

# OTP Configuration
OTP_LENGTH=6
OTP_EXPIRY_MINUTES=10
OTP_MAX_ATTEMPTS=5
OTP_LOCKOUT_MINUTES=15
OTP_RATE_LIMIT_MINUTES=2
OTP_DEVELOPMENT_MODE=false
OTP_TEST_CODE=123456
```

### Configuration Files

- `config/services.php` - EMMA SMS Gateway configuration
- `config/otp.php` - OTP system configuration

## Database Schema

### New Fields Added to Users Table

```sql
ALTER TABLE users ADD COLUMN otp_code VARCHAR(255) NULL;
ALTER TABLE users ADD COLUMN otp_expires_at TIMESTAMP NULL;
ALTER TABLE users ADD COLUMN otp_attempts INT DEFAULT 0;
ALTER TABLE users ADD COLUMN otp_locked_until TIMESTAMP NULL;
```

### Migration

Run the migration to add OTP fields:

```bash
php artisan migrate
```

## API Endpoints

### Public Endpoints

#### 1. Send OTP for Mobile Verification
```
POST /api/v1/send-otp
Content-Type: application/json

{
    "mobile": "966501234567"
}
```

#### 2. Verify Mobile Number with OTP
```
POST /api/v1/verify-mobile
Content-Type: application/json

{
    "mobile": "966501234567",
    "code": "123456"
}
```

#### 3. Forgot Password (Send OTP)
```
POST /api/v1/forget-password
Content-Type: application/json

{
    "mobile": "966501234567"
}
```

#### 4. Verify Reset Code
```
POST /api/v1/check-code
Content-Type: application/json

{
    "mobile": "966501234567",
    "code": "123456"
}
```

#### 5. Reset Password
```
POST /api/v1/create-password
Content-Type: application/json

{
    "mobile": "966501234567",
    "code": "123456",
    "password": "newpassword123"
}
```

#### 6. Resend OTP
```
POST /api/v1/resend-otp
Content-Type: application/json

{
    "mobile": "966501234567"
}
```

#### 7. Check SMS Gateway Balance
```
POST /api/v1/check-sms-balance
Content-Type: application/json
Authorization: Bearer {token}

# No request body required
```

### Response Format

#### Success Response
```json
{
    "success": true,
    "message": "Verification code sent successfully",
    "data": {
        "expires_in": 600
    }
}
```

#### Error Response
```json
{
    "success": false,
    "message": "Invalid verification code",
    "data": {
        "remaining_attempts": 3
    }
}
```

## Usage Examples

### 1. Password Reset Flow

```php
// 1. User requests password reset
$response = $this->post('/api/v1/forget-password', [
    'mobile' => '966501234567'
]);

// 2. User receives OTP via SMS
// 3. User verifies OTP
$response = $this->post('/api/v1/check-code', [
    'mobile' => '966501234567',
    'code' => '123456'
]);

// 4. User sets new password
$response = $this->post('/api/v1/create-password', [
    'mobile' => '966501234567',
    'code' => '123456',
    'password' => 'newpassword123'
]);
```

### 2. Mobile Verification Flow

```php
// 1. Send OTP for mobile verification
$response = $this->post('/api/v1/send-otp', [
    'mobile' => '966501234567'
]);

// 2. Verify mobile number
$response = $this->post('/api/v1/verify-mobile', [
    'mobile' => '966501234567',
    'code' => '123456'
]);
```

## Testing

### Console Command

Use the provided console command to test the SMS service:

```bash
# Test with default OTP
php artisan sms:test 966501234567

# Test with custom OTP
php artisan sms:test 966501234567 --otp=654321
```

### Testing in Development

For development environments, you can:

1. Set `EMMA_SMS_ENABLED=false` to disable actual SMS sending
2. Use `OTP_DEVELOPMENT_MODE=true` for testing
3. Check logs for OTP codes and service responses

## Security Considerations

### Rate Limiting
- **OTP Generation**: 1 OTP per 2 minutes per mobile number
- **Verification Attempts**: Maximum 5 attempts before account lockout
- **Lockout Duration**: 15 minutes after max attempts reached

### Data Protection
- OTP codes are not logged in production
- Failed attempt counts are stored for security
- Lockout timestamps are maintained for audit purposes

### Mobile Number Formatting
- Automatic country code detection and formatting
- Support for Saudi Arabia (+966) format
- Input sanitization and validation

## Error Handling

### Common Error Scenarios

1. **Invalid Mobile Number**: User not found in system
2. **OTP Expired**: Code has exceeded 10-minute validity
3. **Too Many Attempts**: Account temporarily locked
4. **Rate Limited**: Please wait before requesting new code
5. **SMS Service Error**: Gateway communication failure

### Error Response Codes

- `422` - Validation errors or business logic failures
- `404` - User not found
- `429` - Rate limited (handled by business logic)

## Monitoring and Logging

### Log Entries

The system logs various events for monitoring:

- OTP generation and sending
- SMS gateway responses
- Verification attempts and results
- Account lockouts and unlocks
- Rate limiting events

### Key Metrics

- OTP success/failure rates
- SMS delivery success rates
- Account lockout frequency
- Rate limiting effectiveness

## Troubleshooting

### Common Issues

1. **SMS Not Delivered**
   - Check EMMA SMS Gateway configuration
   - Verify API key and sender ID
   - Check mobile number format
   - Review gateway logs

2. **OTP Verification Fails**
   - Check OTP expiry time
   - Verify attempt limits
   - Check account lockout status
   - Review validation rules

3. **Rate Limiting Issues**
   - Check rate limit configuration
   - Verify cache configuration
   - Review mobile number uniqueness

### Debug Mode

Enable debug logging by setting:

```env
LOG_LEVEL=debug
```

## Future Enhancements

### Planned Features

1. **Multi-Factor Authentication**: Combine SMS OTP with other factors
2. **Voice OTP**: Fallback to voice calls for SMS failures
3. **Push Notification OTP**: In-app OTP delivery
4. **Advanced Analytics**: Detailed OTP usage statistics
5. **Customizable Templates**: Configurable SMS message formats

### Integration Possibilities

1. **Webhook Support**: Real-time delivery status updates
2. **Multiple SMS Gateways**: Fallback and load balancing
3. **International Support**: Multi-country SMS gateway integration
4. **Advanced Security**: Biometric OTP verification

## Support

For technical support or questions about the OTP system:

1. Check the application logs for detailed error information
2. Review the configuration settings
3. Test with the console command
4. Consult the API documentation
5. Contact the development team

## Changelog

### Version 1.0.0
- Initial OTP system implementation
- EMMA SMS Gateway integration
- Rate limiting and security features
- Multi-language support
- Comprehensive API endpoints
- Testing and debugging tools
