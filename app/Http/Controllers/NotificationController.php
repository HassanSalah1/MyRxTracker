<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected FirebaseService $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'token' => 'required|string',
        ]);

        $this->firebaseService->sendNotification(
            "Notification Title",
            "notification Body",
            $request->token,
            ['type' => 'starter_pack']
        );

        return response()->json(['message' => 'Notification sent successfully']);
    }
}
