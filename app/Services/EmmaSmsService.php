<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Lang;
use Exception;

class EmmaSmsService
{
    protected $username;
    protected $password;
    protected $loginUrl;
    protected $sendUrl;
    protected $senderId;
    protected $isEnabled;
    protected $authToken;

    public function __construct()
    {
        $this->username = config('services.emma_sms.username');
        $this->password = config('services.emma_sms.password');
        $this->loginUrl = config('services.emma_sms.login_url');
        $this->sendUrl = config('services.emma_sms.send_url');
        $this->senderId = config('services.emma_sms.sender_id');
        $this->isEnabled = config('services.emma_sms.enabled', true);
    }

    /**
     * Authenticate with EMMA SMS Gateway and get JWT token
     *
     * @return array
     */
    protected function authenticate(): array
    {
        // Check if we have a cached token
        $cachedToken = Cache::get('emma_sms_token');
        if ($cachedToken && $cachedToken['expires_at'] > now()) {
            $this->authToken = $cachedToken['token'];
            return ['success' => true, 'token' => $this->authToken];
        }

        try {
            // Create Basic Auth header
            $credentials = base64_encode($this->username . ':' . $this->password);
            
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . $credentials
                ])
                ->get($this->loginUrl);

            if ($response->successful()) {
                $responseData = $response->json();
                
                if (isset($responseData['users'][0]['token'])) {
                    $token = $responseData['users'][0]['token'];
                    $expiresAt = $responseData['users'][0]['expires_after'];
                    
                    // Cache the token (subtract 30 minutes from expiry for safety)
                    $expiryTime = \Carbon\Carbon::parse($expiresAt)->subMinutes(30);
                    Cache::put('emma_sms_token', [
                        'token' => $token,
                        'expires_at' => $expiryTime
                    ], $expiryTime);
                    
                    $this->authToken = $token;
                    
                    Log::info('Successfully authenticated with EMMA SMS Gateway', [
                        'token_length' => strlen($token),
                        'expires_at' => $expiresAt,
                        'cached_until' => $expiryTime
                    ]);
                    
                    return [
                        'success' => true,
                        'token' => $token
                    ];
                } else {
                    Log::error('Invalid response format from EMMA SMS Gateway login', [
                        'response' => $responseData
                    ]);
                    
                    return [
                        'success' => false,
                        'message' => trans('messages.sms_gateway_invalid_response')
                    ];
                }
            } else {
                Log::error('Failed to authenticate with EMMA SMS Gateway', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                
                return [
                    'success' => false,
                    'message' => trans('messages.sms_gateway_auth_failed'),
                    'error' => $response->body()
                ];
            }
        } catch (Exception $e) {
            Log::error('Exception during EMMA SMS Gateway authentication', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return [
                'success' => false,
                'message' => trans('messages.sms_gateway_auth_error'),
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Send OTP SMS to the specified mobile number
     *
     * @param string $mobile
     * @param string $otp
     * @return array
     */
    public function sendOtp(string $mobile, string $otp): array
    {
        if (!$this->isEnabled) {
            Log::info('EMMA SMS Gateway is disabled, skipping SMS send');
            return [
                'success' => true,
                'message' => trans('messages.sms_gateway_disabled'),
                'otp' => $otp
            ];
        }

        try {
            // Authenticate first
            $authResult = $this->authenticate();
            if (!$authResult['success']) {
                return $authResult;
            }

            // Prepare the message content
            $message = $this->prepareOtpMessage($otp);
            
            // Prepare the request payload according to EMMA SMS Gateway format
            $payload = [
                'sendrequest' => [
                    'correlationid' => $this->generateCorrelationId(),
                    'messages' => [
                        [
                            'phonenumbers' => $this->formatMobileNumber($mobile),
                            'content' => $message,
                            'scheduledatetime' => '', // Empty for immediate sending
                            'senderid' => $this->senderId
                        ]
                    ]
                ]
            ];

            // Send the request to EMMA SMS Gateway
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->authToken
                ])
                ->post($this->sendUrl, $payload);

            if ($response->successful()) {
                $responseData = $response->json();
                
                // Check if the response indicates success
                if (isset($responseData['sendresponse']['statuscode']) && 
                    $responseData['sendresponse']['statuscode'] === '0') {
                    
                    Log::info('SMS sent successfully via EMMA Gateway', [
                        'mobile' => $mobile,
                        'batchid' => $responseData['sendresponse']['batchid'] ?? 'N/A',
                        'correlationid' => $responseData['sendresponse']['correlationid'] ?? 'N/A'
                    ]);

                    return [
                        'success' => true,
                        'message' => 'SMS sent successfully',
                        'batchid' => $responseData['sendresponse']['batchid'] ?? null,
                        'correlationid' => $responseData['sendresponse']['correlationid'] ?? null
                    ];
                } else {
                    Log::error('SMS Gateway returned error status', [
                        'mobile' => $mobile,
                        'response' => $responseData,
                        'token_used' => substr($this->authToken, 0, 20) . '...'
                    ]);
                    
                    // If token is invalid, clear the cache and try to re-authenticate
                    if (isset($responseData['sendresponse']['reason']) && 
                        str_contains(strtolower($responseData['sendresponse']['reason']), 'token')) {
                        
                        Log::warning('Token appears to be invalid, clearing cache and re-authenticating');
                        Cache::forget('emma_sms_token');
                        
                        // Try to re-authenticate and send again
                        $reAuthResult = $this->authenticate();
                        if ($reAuthResult['success']) {
                            Log::info('Re-authentication successful, retrying SMS send');
                            return $this->sendOtp($mobile, $otp);
                        }
                    }
                    
                    return [
                        'success' => false,
                        'message' => trans('messages.sms_gateway_error', ['reason' => $responseData['sendresponse']['reason'] ?? trans('messages.unknown_error')]),
                        'error' => $responseData
                    ];
                }
            } else {
                Log::error('Failed to send SMS via EMMA Gateway', [
                    'mobile' => $mobile,
                    'status' => $response->status(),
                    'response' => $response->body(),
                    'token_used' => substr($this->authToken, 0, 20) . '...'
                ]);

                return [
                    'success' => false,
                    'message' => trans('messages.sms_send_failed'),
                    'error' => $response->body()
                ];
            }
        } catch (Exception $e) {
            Log::error('Exception while sending SMS via EMMA Gateway', [
                'mobile' => $mobile,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'message' => trans('messages.sms_service_error'),
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Prepare OTP message content
     *
     * @param string $otp
     * @return string
     */
    protected function prepareOtpMessage(string $otp): string
    {
        // Customize this message format according to your needs
        return trans('messages.otp_sms_content', ['otp' => $otp]);
    }

    /**
     * Format mobile number for EMMA SMS Gateway
     *
     * @param string $mobile
     * @return string
     */
    protected function formatMobileNumber(string $mobile): string
    {
        // Remove any non-digit characters
        $mobile = preg_replace('/[^0-9]/', '', $mobile);
        
        // Handle different country codes
        if (str_starts_with($mobile, '20')) {
            // Egypt (+20)
            return $mobile;
        } elseif (str_starts_with($mobile, '966')) {
            // Saudi Arabia (+966)
            return $mobile;
        } elseif (str_starts_with($mobile, '852')) {
            // Hong Kong (+852)
            return $mobile;
        } else {
            // Add country code based on the first digit
            if (str_starts_with($mobile, '0')) {
                // Remove leading zero and add appropriate country code
                $mobile = substr($mobile, 1);
                if (strlen($mobile) === 10) {
                    // Likely Egyptian number
                    return '20' . $mobile;
                } elseif (strlen($mobile) === 9) {
                    // Likely Saudi number
                    return '966' . $mobile;
                }
            }
            
            // Default to Saudi Arabia if we can't determine
            return '966' . $mobile;
        }
    }

    /**
     * Generate unique correlation ID for tracking
     *
     * @return string
     */
    protected function generateCorrelationId(): string
    {
        return 'lumirix_' . time() . '_' . uniqid();
    }

    /**
     * Check SMS delivery status (if supported by EMMA Gateway)
     *
     * @param string $batchId
     * @return array
     */
    public function checkDeliveryStatus(string $batchId): array
    {
        if (!$this->isEnabled) {
            return ['success' => false, 'message' => trans('messages.sms_gateway_disabled')];
        }

        // Note: EMMA SMS Gateway may not support delivery status checking
        // This method is included for future implementation if needed
        return [
            'success' => false,
            'message' => trans('messages.sms_delivery_status_not_supported')
        ];
    }

    /**
     * Get account balance from EMMA SMS Gateway
     *
     * @return array
     */
    public function getBalance(): array
    {
        if (!$this->isEnabled) {
            return ['success' => false, 'message' => trans('messages.sms_gateway_disabled')];
        }

        try {
            // Authenticate first
            $authResult = $this->authenticate();
            if (!$authResult['success']) {
                return $authResult;
            }

            // Try different possible balance endpoints
            $balanceEndpoints = [
                'http://api.emma.hk/sms/balance.jsp',
                'http://sms.emma.hk/sms/balance.jsp',
                'http://api.emma.hk/sms/account.jsp',
                'http://sms.emma.hk/sms/account.jsp'
            ];

            foreach ($balanceEndpoints as $endpoint) {
                try {
                    $response = Http::timeout(30)
                        ->withHeaders([
                            'Content-Type' => 'application/json',
                            'Authorization' => 'Bearer ' . $this->authToken
                        ])
                        ->get($endpoint);

                    if ($response->successful()) {
                        $responseData = $response->json();
                        
                        // Check for common balance response formats
                        if (isset($responseData['balance'])) {
                            return [
                                'success' => true,
                                'balance' => $responseData['balance'],
                                'currency' => $responseData['currency'] ?? 'USD',
                                'data' => $responseData
                            ];
                        } elseif (isset($responseData['credits'])) {
                            return [
                                'success' => true,
                                'balance' => $responseData['credits'],
                                'currency' => 'Credits',
                                'data' => $responseData
                            ];
                        } elseif (isset($responseData['sms_balance'])) {
                            return [
                                'success' => true,
                                'balance' => $responseData['sms_balance'],
                                'currency' => 'SMS Credits',
                                'data' => $responseData
                            ];
                        } elseif (isset($responseData['account'])) {
                            return [
                                'success' => true,
                                'balance' => $responseData['account']['balance'] ?? 'N/A',
                                'currency' => $responseData['account']['currency'] ?? 'N/A',
                                'data' => $responseData
                            ];
                        }
                        
                        // If we get here, the endpoint worked but format is unknown
                        Log::info('Balance endpoint responded but format unknown', [
                            'endpoint' => $endpoint,
                            'response' => $responseData
                        ]);
                    }
                } catch (Exception $e) {
                    Log::debug('Balance endpoint failed', [
                        'endpoint' => $endpoint,
                        'error' => $e->getMessage()
                    ]);
                    continue;
                }
            }

            // If no endpoints worked, try a generic account info request
            try {
                $response = Http::timeout(30)
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $this->authToken
                    ])
                    ->get('http://api.emma.hk/sms/userinfo.jsp');

                if ($response->successful()) {
                    $responseData = $response->json();
                    Log::info('User info endpoint responded', ['response' => $responseData]);
                    
                    return [
                        'success' => true,
                        'message' => 'Account info retrieved (balance may not be available)',
                        'data' => $responseData
                    ];
                }
            } catch (Exception $e) {
                Log::debug('User info endpoint failed', ['error' => $e->getMessage()]);
            }

            return [
                'success' => false,
                'message' => trans('messages.sms_balance_not_supported'),
                'note' => trans('messages.contact_sms_gateway_support')
            ];

        } catch (Exception $e) {
            Log::error('Exception while checking SMS balance', [
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => trans('messages.sms_balance_check_error'),
                'error' => $e->getMessage()
            ];
        }
    }
}
