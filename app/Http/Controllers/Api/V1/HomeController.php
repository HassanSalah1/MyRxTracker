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

class HomeController extends Controller
{
    /**
     * Register a new user.
     */
    public function banners()
    {


        $data = [
            asset('images/1.png'),
            asset('images/2.png'),
            asset('images/3.png'),
        ];
        // Return the response with pagination metadata
        return $this->successResponse(null, $data);
    }


}