<?php
namespace App\Notifications;

use App\Enums\NotificationStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Services\FirebaseService;

class VerificationApprovedNotification extends Notification
{
    use Queueable;

    protected string $title;
    protected string $body;
    protected array $data;

    public function __construct(string $title, string $body, array $data )
    {
        $this->title = $title;
        $this->body = $body;
        $this->data = $data;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        $this->toFirebase($notifiable);
        return [
            'data' => $this->title . $this->body,
        ];
    }


    public function toFirebase($notifiable): void
    {
        if ($notifiable->fcm_token) {
            $firebaseService = new FirebaseService();
            $firebaseService->sendNotification(
                $this->title,
                $this->body,
                $notifiable->fcm_token,
                $this->data
            );
        }
    }
}
