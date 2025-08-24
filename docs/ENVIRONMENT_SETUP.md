# Environment Configuration Guide

## Required Environment Variables

Add the following variables to your `.env` file to configure the OTP system:

### EMMA SMS Gateway Configuration

```env
# Your EMMA SMS Gateway username
EMMA_SMS_USERNAME=your_emma_sms_username_here

# Your EMMA SMS Gateway password
EMMA_SMS_PASSWORD=your_emma_sms_password_here

# EMMA SMS Gateway login endpoint
EMMA_SMS_LOGIN_URL=https://api.emma.hk/sms/login.jsp

# EMMA SMS Gateway send endpoint
EMMA_SMS_SEND_URL=https://sms.emma.hk/sms/emmasmsjson.jsp

# Sender ID for SMS messages
EMMA_SMS_SENDER_ID=LUMIRIX

# Enable/disable SMS sending (useful for development)
EMMA_SMS_ENABLED=true
```

### OTP System Configuration

```env
# OTP code length (default: 6)
OTP_LENGTH=6

# OTP expiry time in minutes (default: 10)
OTP_EXPIRY_MINUTES=10

# Maximum verification attempts before lockout (default: 5)
OTP_MAX_ATTEMPTS=5

# Account lockout duration in minutes (default: 15)
OTP_LOCKOUT_MINUTES=15

# Rate limiting for OTP generation in minutes (default: 2)
OTP_RATE_LIMIT_MINUTES=2

# Development mode flag (default: false)
OTP_DEVELOPMENT_MODE=false

# Test OTP code for development (default: 123456)
OTP_TEST_CODE=123456
```

## Configuration Examples

### Production Environment

```env
EMMA_SMS_USERNAME=your_production_username
EMMA_SMS_PASSWORD=your_production_password
EMMA_SMS_LOGIN_URL=https://api.emma.hk/sms/login.jsp
EMMA_SMS_SEND_URL=https://sms.emma.hk/sms/emmasmsjson.jsp
EMMA_SMS_SENDER_ID=LUMIRIX
EMMA_SMS_ENABLED=true

OTP_LENGTH=6
OTP_EXPIRY_MINUTES=10
OTP_MAX_ATTEMPTS=5
OTP_LOCKOUT_MINUTES=15
OTP_RATE_LIMIT_MINUTES=2
OTP_DEVELOPMENT_MODE=false
```

### Development Environment

```env
EMMA_SMS_USERNAME=your_dev_username
EMMA_SMS_PASSWORD=your_dev_password
EMMA_SMS_LOGIN_URL=https://api.emma.hk/sms/login.jsp
EMMA_SMS_SEND_URL=https://sms.emma.hk/sms/emmasmsjson.jsp
EMMA_SMS_SENDER_ID=LUMIRIX
EMMA_SMS_ENABLED=false

OTP_LENGTH=6
OTP_EXPIRY_MINUTES=10
OTP_MAX_ATTEMPTS=5
OTP_LOCKOUT_MINUTES=15
OTP_RATE_LIMIT_MINUTES=1
OTP_DEVELOPMENT_MODE=true
OTP_TEST_CODE=123456
```

### Testing Environment

```env
EMMA_SMS_USERNAME=your_test_username
EMMA_SMS_PASSWORD=your_test_password
EMMA_SMS_LOGIN_URL=https://api.emma.hk/sms/login.jsp
EMMA_SMS_SEND_URL=https://sms.emma.hk/sms/emmasmsjson.jsp
EMMA_SMS_SENDER_ID=LUMIRIX
EMMA_SMS_ENABLED=false

OTP_LENGTH=4
OTP_EXPIRY_MINUTES=5
OTP_MAX_ATTEMPTS=3
OTP_LOCKOUT_MINUTES=10
OTP_RATE_LIMIT_MINUTES=1
OTP_DEVELOPMENT_MODE=true
OTP_TEST_CODE=0000
```

## Security Considerations

1. **Never commit API keys to version control**
2. **Use different API keys for different environments**
3. **Rotate API keys regularly**
4. **Monitor API usage and set appropriate limits**
5. **Use environment-specific sender IDs when possible**

## Validation

After setting up your environment variables, you can validate the configuration using:

```bash
# Test the SMS service
php artisan sms:test 966501234567

# Check configuration
php artisan config:cache
php artisan config:clear
```

## Troubleshooting

### Common Configuration Issues

1. **SMS not sending**: Check `EMMA_SMS_ENABLED` and API key
2. **Invalid API responses**: Verify `EMMA_SMS_API_URL` format
3. **Rate limiting too strict**: Adjust `OTP_RATE_LIMIT_MINUTES`
4. **OTP expiry too fast**: Increase `OTP_EXPIRY_MINUTES`
5. **Too many lockouts**: Adjust `OTP_MAX_ATTEMPTS` and `OTP_LOCKOUT_MINUTES`

### Environment Variable Debugging

```bash
# Check if variables are loaded
php artisan tinker
echo config('services.emma_sms.api_key');
echo config('otp.length');
```
