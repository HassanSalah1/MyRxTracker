<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\PacksStatus;
use App\Enums\Roles;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
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
    /**
     * Register a new user.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'unique:users', ],
            //'email' => ['required', 'unique:users', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', Rules\Password::defaults()],
            'device_name' => ['required', 'string'],
            'identity_number' => ['required', 'string'],
            //'doctor' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $data = $request->all();
        Log::info('User registration data:', $data);

        $user = User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'image' => $data['image'] ?? null,
            'mobile' => $data['mobile'],
            'email_verified_at' => Carbon::now(),
            //'email' => $data['email'],
            'identity_number' => $data['identity_number'],
            //'doctor' => $data['doctor'],
            'role' => Roles::USER,
            'status' => UserStatus::ACTIVE,
        ]);

        $accessToken = $user->createToken($request->device_name)->plainTextToken;

        return $this->successResponse(trans('messages.register_success'), $this->userData($user, $accessToken));
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

        // Send reset code to email (mock code for now)
        $code = 123456; // Replace with actual code generation and email sending logic

        return $this->successResponse(trans('messages.code_sent_to_email'));
    }

    /**
     * Verify reset code.
     */
    public function checkCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'code' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        if ($request->code != 123456) { // Replace with actual code verification logic
            return $this->errorResponse(trans('messages.incorrect_code'), 422);
        }

        return $this->successResponse(trans('messages.correct_code_enter_new_password'));
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
        if ($request->code != "0000") { // Replace with actual code verification logic
            return $this->errorResponse(trans('messages.incorrect_code'), 422);
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

        $rules = [
            'name' => ['string', 'max:255'],
            'gender' => ['string', 'in:male,female,other'],
            'mobile' => [ Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', Rules\Password::defaults()],
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
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
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $user = auth()->user();

        if (!Hash::check($request->password, $user->password)) {
            return $this->errorResponse(trans('messages.incorrect_password'), 422);
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
            'notification_permission' => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $request->user()->update([
            'fcm_token' => $request->fcm_token,
            'notification_permission' => $request->notification_permission,
        ]);

        return $this->successResponse('FCM updated successfully');
    }

    /**
     * Prepare user data for response.
     */
    private function userData($user, $token)
    {
        $image_url = $user->image ? (str_contains($user->image, 'http') ? $user->image : url(Storage::url($user->image))) : url('/images/avatar.png');

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'photo' => $image_url,
            'request_starter_pack' => (bool) $user?->starterPacks,
            'took_starter_pack' => (bool) $user?->starterPacks?->where('verification_status', PacksStatus::APPROVED),
            'access_token' => $token,
        ];
    }


}