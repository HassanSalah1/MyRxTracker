<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    protected $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    /**
     * Send notification to all active users.
     */
    public function sendToAllUsers(string $title, string $body, array $data = []): array
    {
        $users = User::whereNotNull('fcm_token')
            ->where('status', \App\Enums\UserStatus::ACTIVE)
            ->get();

        $successCount = 0;
        $failureCount = 0;

        foreach ($users as $user) {
            try {
                $this->firebaseService->sendNotification($title, $body, $user->fcm_token, $data);
                $successCount++;
            } catch (\Exception $e) {
                Log::error('Failed to send notification to user', [
                    'user_id' => $user->id,
                    'error' => $e->getMessage()
                ]);
                $failureCount++;
            }
        }

        return [
            'success' => true,
            'sent' => $successCount,
            'failed' => $failureCount,
            'total' => $users->count(),
        ];
    }

    /**
     * Send notification to a single user.
     */
    public function sendToUser(int $userId, string $title, string $body, array $data = []): bool
    {
        $user = User::find($userId);

        if (!$user || !$user->fcm_token) {
            Log::warning('User not found or has no FCM token', ['user_id' => $userId]);
            return false;
        }

        try {
            $this->firebaseService->sendNotification($title, $body, $user->fcm_token, $data);
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send notification to user', [
                'user_id' => $userId,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    /**
     * Send notification to multiple users.
     */
    public function sendToUsers(array $userIds, string $title, string $body, array $data = []): array
    {
        $users = User::whereIn('id', $userIds)
            ->whereNotNull('fcm_token')
            ->get();

        $successCount = 0;
        $failureCount = 0;

        foreach ($users as $user) {
            try {
                $this->firebaseService->sendNotification($title, $body, $user->fcm_token, $data);
                $successCount++;
            } catch (\Exception $e) {
                Log::error('Failed to send notification to user', [
                    'user_id' => $user->id,
                    'error' => $e->getMessage()
                ]);
                $failureCount++;
            }
        }

        return [
            'success' => true,
            'sent' => $successCount,
            'failed' => $failureCount,
            'total' => $users->count(),
        ];
    }
}

