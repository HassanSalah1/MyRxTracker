<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\Roles;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\StarterPack;
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

class NotificationController extends Controller
{
    /**
     * Register a new user.
     */
    public function index()
    {
        $data = [
                [
                 'body' => 'Your Lumirix® Starter Pack application has been approved. Please visit any participating clinic to redeem your pack.',
                 'date' => Carbon::now()->format('h:i A, j F Y')
                ],
            [
                'body' => 'Reminder: Upload your invoice for Lumirix® cream to continue tracking your progress.',
                'date' => Carbon::now()->subDays(2)->format('h:i A, j F Y')
            ],
            [
                'body' => 'Your refill request for Lumirix® cream is being processed. We’ll notify you when it’s ready.',
                'date' => Carbon::now()->subDays(3)->format('h:i A, j F Y')
            ],
            [
                'body' => 'Your Lumirix® Starter Pack application has been approved. Please visit any participating clinic to redeem your pack.',
                'date' => Carbon::now()->subDays(5)->format('h:i A, j F Y')
            ]
            ];
        // Return the response with pagination metadata
        return $this->successResponse(null, $data);
    }

}