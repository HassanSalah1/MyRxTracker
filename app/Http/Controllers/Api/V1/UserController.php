<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ApplicationMode;
use App\Enums\PacksStatus;
use App\Enums\Roles;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpService;
use App\Settings\AppSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    /**
     * Register a new user.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            // Allow re-attempts: don't hard-block here; handle uniqueness manually below
            'mobile' => ['required'],
            //'email' => ['required', 'unique:users', 'email', 'max:255'],
            'password' => ['required', 'string'],
            'device_name' => ['required', 'string'],
            // Allow re-attempts: don't hard-block here; handle uniqueness manually below
            'identity_number' => ['required', 'string','size:5'],
            //'doctor' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $data = $request->all();
        Log::info('User registration data:', $data);

        // Check if a user already exists with the same mobile or identity_number
        $existingUser = User::where('mobile', $data['mobile'])
            ->orWhere('identity_number', $data['identity_number'])
            ->first();

        if ($existingUser) {
            // If the same account already exists, do NOT create a duplicate. Resend OTP to continue verification/login.
            $result = $this->otpService->generateAndSendOtp($data['mobile'], 'mobile_verification');

            if ($result['success']) {
                return $this->successResponse(trans('messages.otp_sent_successfully'));
            } else {
                return $this->errorResponse($result['message'], 422);
            }
        }

        $user = User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'image' => $data['image'] ?? null,
            'mobile' => $data['mobile'],
            'fcm_token' => $data['fcm_token'],
            'email_verified_at' => Carbon::now(),
            //'email' => $data['email'],
            'identity_number' => $data['identity_number'],
            //'doctor' => $data['doctor'],
            'role' => Roles::USER,
            'status' => UserStatus::ACTIVE,
        ]);

        //$accessToken = $user->createToken($request->device_name)->plainTextToken;
        $result = $this->otpService->generateAndSendOtp($data['mobile'], 'mobile_verification');

        if ($result['success']) {
            return $this->successResponse(trans('messages.code_sent_to_email'));
        } else {
            return $this->errorResponse($result['message'], 422);
        }
    }

    /**
     * Login a user.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required', ],
            'password' => ['required', 'string', 'min:8'],
            'device_name' => ['required', 'string'],
            //'fcm_token' => [ 'string'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $credentials = $request->only('mobile', 'password');

        if (!Auth::attempt($credentials)) {
            return $this->errorResponse(trans('messages.phone_or_password_incorrect'), 422);
        }

        $user = $request->user();
        $user->update([
            'fcm_token' => $request->fcm_token ?? $user->fcm_token,
            'notification_permission' => $request->notification_permission ?? $user->notification_permission,
        ]);

        $accessToken = $user->createToken($request->device_name)->plainTextToken;

        return $this->successResponse(trans('messages.login_success'), $this->userData($user, $accessToken));
    }

    /**
     * Handle forgot password request.
     */
    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $user = User::where('mobile', $request->mobile)->first();

        if (!$user) {
            return $this->errorResponse(trans('messages.account_not_found'), 404);
        }

        // Generate and send OTP via SMS
        $result = $this->otpService->generateAndSendOtp($request->mobile, 'password_reset');

        if ($result['success']) {
            return $this->successResponse(trans('messages.code_sent_to_email'));
        } else {
            return $this->errorResponse($result['message'], 422);
        }
    }

    /**
     * Verify reset code.
     */
    public function checkCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required'],
            'code' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        // Verify OTP using the service
        $result = $this->otpService->verifyOtp($request->mobile, $request->code);

        if ($result['success']) {
            return $this->successResponse(trans('messages.correct_code_enter_new_password'));
        } else {
            $response = $this->errorResponse($result['message'], 422);
            
            // Add additional information if available
            if (isset($result['remaining_attempts'])) {
                $response->setData(array_merge($response->getData(true), [
                    'remaining_attempts' => $result['remaining_attempts']
                ]));
            }
            
            if (isset($result['locked_until'])) {
                $response->setData(array_merge($response->getData(true), [
                    'locked_until' => $result['locked_until']
                ]));
            }
            
            return $response;
        }
    }

    /**
     * Reset user password.
     */
    public function createPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required'],
            'code' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $user = User::where('mobile', $request->mobile)->first();


        if (!$user) {
            return $this->errorResponse(trans('messages.account_not_found'), 404);
        }
        // Verify OTP using the service
        $result = $this->otpService->verifyOtp($request->mobile, $request->code);
        
        if (!$result['success']) {
            $message = $result['message'];
            $response = $this->errorResponse($message, 422);
            
            if (isset($result['remaining_attempts'])) {
                $response->setData(array_merge($response->getData(true), [
                    'remaining_attempts' => $result['remaining_attempts']
                ]));
            }
            
            if (isset($result['locked_until'])) {
                $humanSeconds = (int) $result['locked_until'];
                $humanReadable = $humanSeconds >= 60
                    ? trans('messages.time_in_minutes', ['minutes' => ceil($humanSeconds / 60)])
                    : trans('messages.time_in_seconds', ['seconds' => $humanSeconds]);
                $message = trans('messages.locked_until_message', [
                    'base' => $result['message'],
                    'time' => $humanReadable,
                ]);
                $response->setData(array_merge($response->getData(true), [
                    'locked_until' => $result['locked_until']
                ]));
            }
            
            $response->setData(array_merge($response->getData(true), [
                'message' => $message,
            ]));
            return $response;
        }
        $user->update(['password' => Hash::make($request->password)]);
        $accessToken = $user->createToken($user->device_name ?? 'default')->plainTextToken;

        return $this->successResponse(trans('messages.password_updated_successfully'), $this->userData($user, $accessToken));
    }

    /**
     * Get user profile.
     */
    public function profile(Request $request)
    {
        $user = auth()->user();
        $token = $request->bearerToken();

        if (!$token) {
            $accessToken = $user->createToken($request->device_name ?? 'default')->plainTextToken;
        } else {
            $accessToken = $token;
        }

        return $this->successResponse(null, $this->userData($user, $accessToken));
    }

    /**
     * Update user profile.
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if ($request->has('old_password')) {
            $rules = [
                'old_password' => [
                    function ($attribute, $value, $fail) use ($user) {
                        if (!Hash::check($value, $user->password)) {
                            $fail(trans('messages.incorrect_password'));
                        }
                    }
                ],
                'password' => 'required|confirmed', // Simplified rule syntax
            ];

        } else {
            $rules = [
                'name' => 'string|max:255', // Simplified rule syntax
                'mobile' => Rule::unique('users')->ignore($user->id),
            ];
        }
        // Validate the data
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        // Hash the password AFTER validation succeeds
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->file('image')) {
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            $data['image'] = Storage::put('public/users', $request->file('image'));
        }

        $user->update($data);

        return $this->successResponse(trans('messages.account_info_updated_successfully'), $this->userData($user, $request->bearerToken()));
    }

    /**
     * Delete user account.
     */
    public function delete(Request $request)
    {


        $user = auth()->user();


        if (!$user) {
            return $this->errorResponse(trans('messages.login_first'), 422);
        }
        $user->delete();

        return $this->successResponse(trans('messages.account_deleted_successfully'));
    }

    /**
     * Logout user.
     */
    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            $user->tokens()->delete();
        }

        return $this->successResponse(trans('messages.logged_out_successfully'));
    }

    /**
     * Update FCM token.
     */
    public function updateFcmToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fcm_token' => ['required', 'string'],
            //'notification_permission' => [ 'boolean'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $request->user()->update([
            'fcm_token' => $request->fcm_token,
            //'notification_permission' => $request->notification_permission ?? ,
        ]);

        return $this->successResponse('FCM updated successfully');
    }

    /**
     * Resend OTP code.
     */
    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $result = $this->otpService->resendOtp($request->mobile);

        if ($result['success']) {
            return $this->successResponse(trans('messages.verification_code_resent'));
        } else {
            $message = $result['message'] ;
            $response = $this->errorResponse($message, 422);
            
            if (isset($result['retry_after'])) {
                $humanSeconds = (int) $result['retry_after'];
                $humanReadable = $humanSeconds >= 60
                    ? trans('messages.time_in_minutes', ['minutes' => ceil($humanSeconds / 60)])
                    : trans('messages.time_in_seconds', ['seconds' => $humanSeconds]);
                $message = trans('messages.retry_after_message', [
                    'base' => $result['message'],
                    'time' => $humanReadable,
                ]);
                $response->setData(array_merge($response->getData(true), [
                    'retry_after' => $result['retry_after']
                ]));

            }
            
            if (isset($result['locked_until'])) {
                $humanSeconds = (int) $result['locked_until'];
                $humanReadable = $humanSeconds >= 60
                    ? trans('messages.time_in_minutes', ['minutes' => ceil($humanSeconds / 60)])
                    : trans('messages.time_in_seconds', ['seconds' => $humanSeconds]);
                $message = trans('messages.locked_until_message', [
                    'base' => $result['message'],
                    'time' => $humanReadable,
                ]);
                $response->setData(array_merge($response->getData(true), [
                    'locked_until' => $result['locked_until']
                ]));
            }
            // Override the response message with the humanized/translated one
            $response->setData(array_merge($response->getData(true), [
                'message' => $message,
            ]));
            return $response;
        }
    }

    /**
     * Send OTP for mobile verification (for new registrations or profile updates).
     */
    public function sendMobileVerificationOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        // Check if mobile number already exists for another user
        $existingUser = User::where('mobile', $request->mobile)->first();
        if ($existingUser && $existingUser->id !== auth()->id()) {
            return $this->errorResponse('This mobile number is already registered with another account.', 422);
        }

        $result = $this->otpService->generateAndSendOtp($request->mobile, 'mobile_verification');

        if ($result['success']) {
            return $this->successResponse(trans('messages.otp_sent_successfully'));
        } else {
            return $this->errorResponse($result['message'], 422);
        }
    }

    /**
     * Verify mobile number with OTP.
     */
    public function verifyMobileNumber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required'],
            'code' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $result = $this->otpService->verifyOtp($request->mobile, $request->code);

        if ($result['success']) {
            // Update user's mobile verification status if needed
            $user = User::where('mobile', $request->mobile)->first();
            if ($user && $user->mobile === $request->mobile) {
                // You can add a mobile_verified_at field if needed
                 $user->update(['mobile_verified_at' => now()]);
            }
            $accessToken = $user->createToken($user->device_name ?? 'default')->plainTextToken;
            return $this->successResponse(trans('messages.mobile_verified_successfully'), $this->userData($user, $accessToken));
        } else {
            $message = $result['message'];
            $response = $this->errorResponse($message, 422);
            
            if (isset($result['remaining_attempts'])) {
                $response->setData(array_merge($response->getData(true), [
                    'remaining_attempts' => $result['remaining_attempts']
                ]));
            }
            
            if (isset($result['locked_until'])) {
                $humanSeconds = (int) $result['locked_until'];
                $humanReadable = $humanSeconds >= 60
                    ? trans('messages.time_in_minutes', ['minutes' => ceil($humanSeconds / 60)])
                    : trans('messages.time_in_seconds', ['seconds' => $humanSeconds]);
                $message = trans('messages.locked_until_message', [
                    'base' => $result['message'],
                    'time' => $humanReadable,
                ]);
                $response->setData(array_merge($response->getData(true), [
                    'locked_until' => $result['locked_until']
                ]));
            }
            
            $response->setData(array_merge($response->getData(true), [
                'message' => $message,
            ]));
            return $response;
        }
    }

    /**
     * Check SMS Gateway balance (Admin/Support function)
     */
    public function checkSmsBalance(Request $request)
    {
        // This endpoint should be protected by admin middleware in production
        // For now, we'll allow authenticated users to check balance
        
        try {
            $emmaService = new \App\Services\EmmaSmsService();
            $balanceResult = $emmaService->getBalance();

            if ($balanceResult['success']) {
                return $this->successResponse(trans('messages.sms_balance_retrieved'), [
                    'balance' => $balanceResult['balance'] ?? 'N/A',
                    'currency' => $balanceResult['currency'] ?? 'N/A',
                    'data' => $balanceResult['data'] ?? null
                ]);
            } else {
                return $this->errorResponse($balanceResult['message'], 422);
            }
        } catch (\Exception $e) {
            Log::error('Error checking SMS balance', [
                'error' => $e->getMessage()
            ]);

            return $this->errorResponse(trans('messages.sms_balance_check_failed'), 500);
        }
    }

    /**
     * Prepare user data for response.
     */
    private function userData($user, $token)
    {
        $image_url = $user->image ? (str_contains($user->image, 'http') ? $user->image : url(Storage::url($user->image))) : url('/images/avatar.png');
        $took_start_back = (bool) $user?->starterPacks()?->where('verification_status', PacksStatus::APPROVED)->count();

        $appSettings = app(AppSettings::class);
        //return  $appSettings;
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'qr_code' => $took_start_back ? url(Storage::url($user?->starterPacks?->certificate_path)) : NULL,
            'identity_number' => $user->identity_number,
            'photo' => $image_url,
            'request_starter_pack' => (bool) $user?->starterPacks,
            'took_starter_pack' => $took_start_back,
            'application_mode' => $appSettings->mode == ApplicationMode::STARTER_PACK->value,
            'fcm_token' => $user->fcm_token,
            'access_token' => $token,
        ];
    }


}