<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Lang;

class OtpService
{
    protected $emmaSmsService;
    protected $otpLength;
    protected $otpExpiryMinutes;
    protected $maxAttempts;
    protected $lockoutMinutes;

    public function __construct(EmmaSmsService $emmaSmsService)
    {
        $this->emmaSmsService = $emmaSmsService;
        $this->otpLength = config('otp.length', 6);
        $this->otpExpiryMinutes = config('otp.expiry_minutes', 10);
        $this->maxAttempts = config('otp.max_attempts', 5);
        $this->lockoutMinutes = config('otp.lockout_minutes', 15);
    }

    /**
     * Generate and send OTP to user's mobile number
     *
     * @param string $mobile
     * @param string $purpose
     * @return array
     */
    public function generateAndSendOtp(string $mobile, string $purpose = 'verification'): array
    {
        try {
            // Check if mobile number is locked
            if ($this->isMobileLocked($mobile)) {
                return [
                    'success' => false,
                    'message' => trans('messages.otp_too_many_attempts'),
                    'locked_until' => $this->getLockoutTime($mobile)
                ];
            }

            // Check rate limiting for OTP generation
            if ($this->isRateLimited($mobile)) {
                return [
                    'success' => false,
                    'message' => trans('messages.otp_rate_limited'),
                    'retry_after' => $this->getRateLimitRetryTime($mobile)
                ];
            }

            // Generate OTP
            $otp = $this->generateOtp();
            
            // Find or create user
            $user = User::where('mobile', $mobile)->first();
            
            if (!$user) {
                return [
                    'success' => false,
                    'message' => trans('messages.user_not_found')
                ];
            }

            // Store OTP in database
            $user->update([
                'otp_code' => $otp,
                'otp_expires_at' => Carbon::now()->addMinutes($this->otpExpiryMinutes),
                'otp_attempts' => 0,
                'otp_locked_until' => null
            ]);

            // Send OTP via SMS
            $smsResult = $this->emmaSmsService->sendOtp($mobile, $otp);

            if ($smsResult['success']) {
                // Set rate limiting
                $this->setRateLimit($mobile);
                
                Log::info('OTP generated and sent successfully', [
                    'mobile' => $mobile,
                    'purpose' => $purpose,
                    'expires_at' => $user->otp_expires_at
                ]);

                return [
                    'success' => true,
                    'message' => trans('messages.otp_sent_successfully'),
                    'expires_in' => $this->otpExpiryMinutes * 60
                ];
            } else {
                // Remove OTP if SMS failed
                $user->update([
                    'otp_code' => null,
                    'otp_expires_at' => null
                ]);

                return [
                    'success' => false,
                    'message' => trans('messages.otp_send_failed'),
                    'error' => $smsResult['message']
                ];
            }
        } catch (\Exception $e) {
            Log::error('Error generating OTP', [
                'mobile' => $mobile,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'message' => trans('messages.otp_generation_error')
            ];
        }
    }

    /**
     * Verify OTP code
     *
     * @param string $mobile
     * @param string $otp
     * @return array
     */
    public function verifyOtp(string $mobile, string $otp): array
    {
        try {
            $user = User::where('mobile', $mobile)->first();

            if (!$user) {
                return [
                    'success' => false,
                    'message' => trans('messages.user_not_found')
                ];
            }

            // Check if mobile is locked
            if ($this->isMobileLocked($mobile)) {
                return [
                    'success' => false,
                    'message' => trans('messages.otp_account_locked'),
                    'locked_until' => $this->getLockoutTime($mobile)
                ];
            }

            // Check if OTP exists and is not expired
            if (!$user->otp_code || !$user->otp_expires_at) {
                return [
                    'success' => false,
                    'message' => trans('messages.otp_not_found_or_expired')
                ];
            }

            if (Carbon::now()->isAfter($user->otp_expires_at)) {
                // Clear expired OTP
                $user->update([
                    'otp_code' => null,
                    'otp_expires_at' => null,
                    'otp_attempts' => 0
                ]);

                return [
                    'success' => false,
                    'message' => trans('messages.otp_expired')
                ];
            }

            // Verify OTP
            if ($user->otp_code === $otp) {
                // Clear OTP after successful verification
                $user->update([
                    'otp_code' => null,
                    'otp_expires_at' => null,
                    'otp_attempts' => 0,
                    'otp_locked_until' => null
                ]);

                Log::info('OTP verified successfully', ['mobile' => $mobile]);

                return [
                    'success' => true,
                    'message' => trans('messages.otp_verified_successfully')
                ];
            } else {
                // Increment failed attempts
                $newAttempts = $user->otp_attempts + 1;
                $user->update(['otp_attempts' => $newAttempts]);

                // Check if account should be locked
                if ($newAttempts >= $this->maxAttempts) {
                    $user->update([
                        'otp_locked_until' => Carbon::now()->addMinutes($this->lockoutMinutes)
                    ]);

                    Log::warning('Account locked due to too many OTP attempts', [
                        'mobile' => $mobile,
                        'attempts' => $newAttempts
                    ]);

                    return [
                        'success' => false,
                        'message' => trans('messages.otp_account_locked_temporarily'),
                        'locked_until' => $user->otp_locked_until,
                        'remaining_attempts' => 0
                    ];
                }

                $remainingAttempts = $this->maxAttempts - $newAttempts;

                return [
                    'success' => false,
                    'message' => trans('messages.otp_invalid'),
                    'remaining_attempts' => $remainingAttempts
                ];
            }
        } catch (\Exception $e) {
            Log::error('Error verifying OTP', [
                'mobile' => $mobile,
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => trans('messages.otp_verification_error')
            ];
        }
    }

    /**
     * Generate random OTP
     *
     * @return string
     */
    protected function generateOtp(): string
    {
        return str_pad((string) random_int(0, pow(10, $this->otpLength) - 1), $this->otpLength, '0', STR_PAD_LEFT);
    }

    /**
     * Check if mobile number is rate limited
     *
     * @param string $mobile
     * @return bool
     */
    protected function isRateLimited(string $mobile): bool
    {
        $cacheKey = "otp_rate_limit:{$mobile}";
        return Cache::has($cacheKey);
    }

    /**
     * Set rate limit for mobile number
     *
     * @param string $mobile
     * @return void
     */
    protected function setRateLimit(string $mobile): void
    {
        $cacheKey = "otp_rate_limit:{$mobile}";
        // Rate limit: 1 OTP per 2 minutes
        Cache::put($cacheKey, true, now()->addMinutes(2));
    }

    /**
     * Get rate limit retry time
     *
     * @param string $mobile
     * @return int
     */
    protected function getRateLimitRetryTime(string $mobile): int
    {
        $cacheKey = "otp_rate_limit:{$mobile}";
        $ttl = Cache::getTimeToLive($cacheKey);
        return $ttl > 0 ? $ttl : 0;
    }

    /**
     * Check if mobile number is locked
     *
     * @param string $mobile
     * @return bool
     */
    protected function isMobileLocked(string $mobile): bool
    {
        $user = User::where('mobile', $mobile)->first();
        
        if (!$user || !$user->otp_locked_until) {
            return false;
        }

        return Carbon::now()->isBefore($user->otp_locked_until);
    }

    /**
     * Get lockout time for mobile number
     *
     * @param string $mobile
     * @return string|null
     */
    protected function getLockoutTime(string $mobile): ?string
    {
        $user = User::where('mobile', $mobile)->first();
        return $user?->otp_locked_until?->toISOString();
    }

    /**
     * Resend OTP (with rate limiting)
     *
     * @param string $mobile
     * @return array
     */
    public function resendOtp(string $mobile): array
    {
        // Check if mobile is locked
        if ($this->isMobileLocked($mobile)) {
            return [
                'success' => false,
                'message' => trans('messages.otp_too_many_attempts'),
                'locked_until' => $this->getLockoutTime($mobile)
            ];
        }

        // Check rate limiting
        if ($this->isRateLimited($mobile)) {
            return [
                'success' => false,
                'message' => 'Please wait before requesting another code.',
                'retry_after' => $this->getRateLimitRetryTime($mobile)
            ];
        }

        return $this->generateAndSendOtp($mobile, 'resend');
    }

    /**
     * Clear OTP for a user (useful for cleanup)
     *
     * @param string $mobile
     * @return bool
     */
    public function clearOtp(string $mobile): bool
    {
        $user = User::where('mobile', $mobile)->first();
        
        if ($user) {
            $user->update([
                'otp_code' => null,
                'otp_expires_at' => null,
                'otp_attempts' => 0,
                'otp_locked_until' => null
            ]);
            return true;
        }

        return false;
    }
}
