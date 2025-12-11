<?php
namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FirebaseService
{
    protected $messaging;

    public function __construct()
    {
        $firebase = (new Factory)->withServiceAccount(config('firebase.projects.app.credentials'));
        $this->messaging = $firebase->createMessaging();
    }

    public function sendNotification($title, $body, $token, $data = [])
    {
        $notification = Notification::create($title, $body);
        $message = CloudMessage::withTarget('token', $token)
            ->withNotification($notification)
            ->withData($data);

        return $this->messaging->send($message);
    }

    /**
     * Send notification to multiple tokens.
     */
    public function sendToMultipleTokens(array $tokens, string $title, string $body, array $data = []): array
    {
        $notification = Notification::create($title, $body);
        $results = [
            'success' => 0,
            'failed' => 0,
            'errors' => [],
        ];

        foreach ($tokens as $token) {
            try {
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification($notification)
                    ->withData($data);
                $this->messaging->send($message);
                $results['success']++;
            } catch (\Exception $e) {
                $results['failed']++;
                $results['errors'][] = [
                    'token' => $token,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return $results;
    }

    /**
     * Send notification to a topic (for broadcast).
     */
    public function sendToTopic(string $topic, string $title, string $body, array $data = []): void
    {
        $notification = Notification::create($title, $body);
        $message = CloudMessage::withTarget('topic', $topic)
            ->withNotification($notification)
            ->withData($data);

        $this->messaging->send($message);
    }
}
