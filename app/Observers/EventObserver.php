<?php

namespace App\Observers;

use App\Models\Event;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Log;

class EventObserver
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        // Check if notification should be sent (default: true)
        $sendNotification = request()->input('send_notification', true);

        if ($sendNotification) {
            try {
                $locale = app()->getLocale();
                $title = trans('messages.new_event_created', [], $locale);
                $body = $event->title;

                $data = [
                    'type' => 'event',
                    'event_id' => $event->id,
                ];

                $this->notificationService->sendToAllUsers($title, $body, $data);
            } catch (\Exception $e) {
                Log::error('Failed to send event notification', [
                    'event_id' => $event->id,
                    'error' => $e->getMessage()
                ]);
            }
        }
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        //
    }
}
