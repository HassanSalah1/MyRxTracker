# Quick Setup Guide - EMMA SMS Gateway OTP System

## 🚀 Get Started in 5 Minutes

### 1. Add Environment Variables

Add these to your `.env` file:

```env
# EMMA SMS Gateway Credentials
EMMA_SMS_USERNAME=your_actual_username
EMMA_SMS_PASSWORD=your_actual_password

# OTP System Settings
OTP_LENGTH=6
OTP_EXPIRY_MINUTES=10
OTP_MAX_ATTEMPTS=5
OTP_LOCKOUT_MINUTES=15
OTP_RATE_LIMIT_MINUTES=2
```

### 2. Run Database Migration

```bash
php artisan migrate
```

### 3. Test the SMS Service

```bash
# Test with your mobile number
php artisan sms:test 966501234567

# Or test with a custom OTP
php artisan sms:test 966501234567 --otp=123456
```

### 4. Test API Endpoints

#### Send OTP for Password Reset
```bash
curl -X POST http://your-domain.com/api/v1/forget-password \
  -H "Content-Type: application/json" \
  -d '{"mobile": "966501234567"}'
```

#### Verify OTP
```bash
curl -X POST http://your-domain.com/api/v1/check-code \
  -H "Content-Type: application/json" \
  -d '{"mobile": "966501234567", "code": "123456"}'
```

#### Reset Password
```bash
curl -X POST http://your-domain.com/api/v1/create-password \
  -H "Content-Type: application/json" \
  -d '{"mobile": "966501234567", "code": "123456", "password": "newpassword123"}'
```

## 🔧 Configuration Options

### SMS Gateway Settings
- **Username/Password**: Your EMMA SMS Gateway credentials
- **Sender ID**: Will appear as the sender name (default: LUMIRIX)
- **Enabled**: Set to `false` to disable SMS sending (useful for development)

### OTP Security Settings
- **Length**: OTP code length (default: 6 digits)
- **Expiry**: How long OTP is valid (default: 10 minutes)
- **Max Attempts**: Failed attempts before lockout (default: 5)
- **Lockout Duration**: How long account is locked (default: 15 minutes)
- **Rate Limit**: Time between OTP requests (default: 2 minutes)

## 📱 Mobile App Integration

### API Endpoints for Mobile App

1. **Password Reset Flow**:
   - `POST /api/v1/forget-password` → Send OTP
   - `POST /api/v1/check-code` → Verify OTP
   - `POST /api/v1/create-password` → Set new password

2. **Mobile Verification Flow**:
   - `POST /api/v1/send-otp` → Send verification OTP
   - `POST /api/v1/verify-mobile` → Verify mobile number

3. **Resend OTP**:
   - `POST /api/v1/resend-otp` → Request new OTP

### Response Format

```json
{
  "success": true,
  "message": "Verification code sent successfully",
  "data": {
    "expires_in": 600
  }
}
```

## 🚨 Troubleshooting

### Common Issues

1. **Authentication Failed**
   - Check username/password in `.env`
   - Verify EMMA SMS Gateway credentials

2. **SMS Not Sending**
   - Check `EMMA_SMS_ENABLED` setting
   - Verify mobile number format
   - Check application logs

3. **OTP Verification Fails**
   - Check OTP expiry time
   - Verify attempt limits
   - Check account lockout status

### Debug Commands

```bash
# Check configuration
php artisan config:cache
php artisan config:clear

# View logs
tail -f storage/logs/laravel.log

# Test SMS service
php artisan sms:test 966501234567
```

## 📋 What's Next?

1. **Test the system** with your mobile number
2. **Integrate with your mobile app** using the API endpoints
3. **Customize SMS messages** in `EmmaSmsService::prepareOtpMessage()`
4. **Monitor usage** through application logs
5. **Set up production environment** with your EMMA SMS Gateway credentials

## 📞 Support

If you encounter issues:
1. Check the application logs
2. Test with the console command
3. Verify your EMMA SMS Gateway credentials
4. Review the detailed documentation in `docs/OTP_SYSTEM_IMPLEMENTATION.md`

---

**Ready to test?** Run `php artisan sms:test YOUR_MOBILE_NUMBER` to get started!
