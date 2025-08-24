<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SmsDeliveryController extends Controller
{
    /**
     * Check SMS delivery status for a specific mobile number
     */
    public function checkDeliveryStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string',
            'batch_id' => 'nullable|string',
            'correlation_id' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        try {
            $mobile = $request->mobile;
            $batchId = $request->batch_id;
            $correlationId = $request->correlation_id;

            // Get recent SMS logs for this mobile
            $recentSms = $this->getRecentSmsLogs($mobile);
            
            // Check delivery status if batch ID provided
            $deliveryStatus = null;
            if ($batchId) {
                $deliveryStatus = $this->checkBatchStatus($batchId);
            }

            // Get current SMS gateway status
            $gatewayStatus = $this->getSmsGatewayStatus();

            return $this->successResponse('SMS delivery status retrieved successfully', [
                'mobile' => $mobile,
                'recent_sms' => $recentSms,
                'delivery_status' => $deliveryStatus,
                'gateway_status' => $gatewayStatus,
                'last_checked' => now()->toISOString()
            ]);

        } catch (\Exception $e) {
            Log::error('Error checking SMS delivery status', [
                'mobile' => $request->mobile,
                'error' => $e->getMessage()
            ]);

            return $this->errorResponse('Failed to check SMS delivery status', 500);
        }
    }

    /**
     * Send test SMS for delivery verification
     */
    public function sendTestSms(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string',
            'message' => 'nullable|string',
            'sender_id' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        try {
            $mobile = $request->mobile;
            $message = $request->message ?? 'Test SMS from Lumirix API - ' . date('Y-m-d H:i:s');
            $senderId = $request->sender_id ?? config('services.emma_sms.sender_id');

            // Authenticate with EMMA SMS Gateway
            $authResult = $this->authenticateWithGateway();
            if (!$authResult['success']) {
                return $this->errorResponse('SMS Gateway authentication failed', 500);
            }

            // Send test SMS
            $smsResult = $this->sendSmsViaGateway($mobile, $message, $senderId, $authResult['token']);

            if ($smsResult['success']) {
                Log::info('Test SMS sent successfully via API', [
                    'mobile' => $mobile,
                    'batch_id' => $smsResult['batch_id'],
                    'correlation_id' => $smsResult['correlation_id']
                ]);

                return $this->successResponse('Test SMS sent successfully', [
                    'mobile' => $mobile,
                    'batch_id' => $smsResult['batch_id'],
                    'correlation_id' => $smsResult['correlation_id'],
                    'message' => $message,
                    'sender_id' => $senderId,
                    'sent_at' => now()->toISOString()
                ]);
            } else {
                return $this->errorResponse('Failed to send test SMS: ' . $smsResult['message'], 500);
            }

        } catch (\Exception $e) {
            Log::error('Error sending test SMS', [
                'mobile' => $request->mobile,
                'error' => $e->getMessage()
            ]);

            return $this->errorResponse('Failed to send test SMS', 500);
        }
    }

    /**
     * Get SMS delivery statistics
     */
    public function getDeliveryStats(Request $request)
    {
        try {
            $mobile = $request->get('mobile');
            
            // Get statistics from logs
            $stats = $this->getSmsStatistics($mobile);

            return $this->successResponse('SMS delivery statistics retrieved successfully', $stats);

        } catch (\Exception $e) {
            Log::error('Error getting SMS delivery statistics', [
                'error' => $e->getMessage()
            ]);

            return $this->errorResponse('Failed to get SMS delivery statistics', 500);
        }
    }

    /**
     * Get recent SMS logs for a mobile number
     */
    protected function getRecentSmsLogs($mobile)
    {
        $logFile = storage_path('logs/laravel.log');
        if (!file_exists($logFile)) {
            return [];
        }

        $logs = file_get_contents($logFile);
        $lines = explode("\n", $logs);
        $recentLines = array_slice($lines, -200); // Last 200 lines

        $smsLogs = array_filter($recentLines, function($line) use ($mobile) {
            return str_contains($line, $mobile) && 
                   (str_contains($line, 'SMS') || str_contains($line, 'OTP') || str_contains($line, 'batchid'));
        });

        $formattedLogs = [];
        foreach (array_slice($smsLogs, -10) as $log) { // Last 10 SMS logs
            $formattedLogs[] = trim($log);
        }

        return $formattedLogs;
    }

    /**
     * Check batch status with EMMA SMS Gateway
     */
    protected function checkBatchStatus($batchId)
    {
        try {
            // Try different status endpoints
            $statusEndpoints = [
                'http://api.emma.hk/sms/status.jsp',
                'http://api.emma.hk/sms/delivery.jsp',
                'http://api.emma.hk/sms/batch.jsp'
            ];

            foreach ($statusEndpoints as $endpoint) {
                try {
                    $response = Http::timeout(30)->get($endpoint . '?batchid=' . $batchId);
                    
                    if ($response->successful()) {
                        return [
                            'endpoint' => $endpoint,
                            'status' => $response->status(),
                            'response' => $response->body(),
                            'checked_at' => now()->toISOString()
                        ];
                    }
                } catch (\Exception $e) {
                    continue;
                }
            }

            return [
                'status' => 'unavailable',
                'message' => 'No status endpoints responded',
                'checked_at' => now()->toISOString()
            ];

        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
                'checked_at' => now()->toISOString()
            ];
        }
    }

    /**
     * Get SMS Gateway status
     */
    protected function getSmsGatewayStatus()
    {
        try {
            // Check if we have a cached token
            $cachedToken = Cache::get('emma_sms_token');
            
            if ($cachedToken && $cachedToken['expires_at'] > now()) {
                return [
                    'status' => 'authenticated',
                    'token_expires_at' => $cachedToken['expires_at']->toISOString(),
                    'last_checked' => now()->toISOString()
                ];
            }

            // Try to authenticate
            $authResult = $this->authenticateWithGateway();
            
            return [
                'status' => $authResult['success'] ? 'authenticated' : 'failed',
                'message' => $authResult['message'] ?? 'Unknown status',
                'last_checked' => now()->toISOString()
            ];

        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
                'last_checked' => now()->toISOString()
            ];
        }
    }

    /**
     * Authenticate with EMMA SMS Gateway
     */
    protected function authenticateWithGateway()
    {
        try {
            $username = config('services.emma_sms.username');
            $password = config('services.emma_sms.password');
            $loginUrl = config('services.emma_sms.login_url');

            if (!$username || !$password || !$loginUrl) {
                return [
                    'success' => false,
                    'message' => 'SMS Gateway credentials not configured'
                ];
            }

            $credentials = base64_encode($username . ':' . $password);
            
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . $credentials
                ])
                ->get($loginUrl);

            if ($response->successful()) {
                $responseData = $response->json();
                
                if (isset($responseData['users'][0]['token'])) {
                    $token = $responseData['users'][0]['token'];
                    $expiresAt = $responseData['users'][0]['expires_after'];
                    
                    // Cache the token
                    $expiryTime = \Carbon\Carbon::parse($expiresAt)->subMinutes(30);
                    Cache::put('emma_sms_token', [
                        'token' => $token,
                        'expires_at' => $expiryTime
                    ], $expiryTime);
                    
                    return [
                        'success' => true,
                        'token' => $token
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => 'Invalid response format from SMS Gateway'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Authentication failed with SMS Gateway',
                    'error' => $response->body()
                ];
            }

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Authentication error',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Send SMS via EMMA SMS Gateway
     */
    protected function sendSmsViaGateway($mobile, $message, $senderId, $token)
    {
        try {
            $payload = [
                'sendrequest' => [
                    'correlationid' => 'api_test_' . time(),
                    'messages' => [
                        [
                            'phonenumbers' => $mobile,
                            'content' => $message,
                            'scheduledatetime' => '',
                            'senderid' => $senderId
                        ]
                    ]
                ]
            ];

            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->post(config('services.emma_sms.send_url'), $payload);

            if ($response->successful()) {
                $responseData = $response->json();
                
                if (isset($responseData['sendresponse']['statuscode']) && 
                    $responseData['sendresponse']['statuscode'] === '0') {
                    
                    return [
                        'success' => true,
                        'batch_id' => $responseData['sendresponse']['batchid'] ?? null,
                        'correlation_id' => $responseData['sendresponse']['correlationid'] ?? null,
                        'message' => 'SMS sent successfully'
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => 'SMS Gateway error: ' . ($responseData['sendresponse']['reason'] ?? 'Unknown error')
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Failed to send SMS',
                    'error' => $response->body()
                ];
            }

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'SMS service error',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get SMS statistics
     */
    protected function getSmsStatistics($mobile = null)
    {
        $logFile = storage_path('logs/laravel.log');
        if (!file_exists($logFile)) {
            return [
                'total_sms_sent' => 0,
                'successful_sends' => 0,
                'failed_sends' => 0,
                'last_sms_sent' => null
            ];
        }

        $logs = file_get_contents($logFile);
        $lines = explode("\n", $logs);
        
        $smsLines = array_filter($lines, function($line) {
            return str_contains($line, 'SMS sent successfully') || 
                   str_contains($line, 'SMS failed') ||
                   str_contains($line, 'batchid');
        });

        $totalSms = count($smsLines);
        $successfulSms = count(array_filter($smsLines, function($line) {
            return str_contains($line, 'SMS sent successfully');
        }));

        return [
            'total_sms_sent' => $totalSms,
            'successful_sends' => $successfulSms,
            'failed_sends' => $totalSms - $successfulSms,
            'last_sms_sent' => $this->getLastSmsTimestamp($lines),
            'mobile_filter' => $mobile
        ];
    }

    /**
     * Get timestamp of last SMS sent
     */
    protected function getLastSmsTimestamp($lines)
    {
        $smsLines = array_filter($lines, function($line) {
            return str_contains($line, 'SMS sent successfully');
        });

        if (empty($smsLines)) {
            return null;
        }

        $lastLine = end($smsLines);
        if (preg_match('/\[(.*?)\]/', $lastLine, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
