<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Register a new user.
     */
    public function index()
    {

        $user = Auth::user();

        $notifications = $user->notifications()
            ->select(['id', 'data', 'created_at', 'read_at'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'body' => $notification->data['data'] ?? '',
                    'date' => $notification->created_at->format('h:i A, j F Y'),
                    'read' => !is_null($notification->read_at)
                ];
            });

        return $this->successResponse(null, $notifications);
    }

    /**
     * Mark a notification as read
     */
    public function markAsRead($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);
        $notification->markAsRead();

        return $this->successResponse('Notification marked as read');
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return $this->successResponse('All notifications marked as read');
    }
}