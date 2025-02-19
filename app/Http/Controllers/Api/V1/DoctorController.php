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

class DoctorController extends Controller
{
    /**
     * Register a new user.
     */
    public function getDoctors(Request $request)
    {
        // Get the search term from the request
        $searchTerm = $request->input('search');

        // Start building the query
        $query = Doctor::query();
        $locale = app()->getLocale(); // Get the current application locale

        // Apply search filter if a search term is provided
        if ($searchTerm) {
            $query->where("name_{$locale}", 'like', '%' . $searchTerm . '%');
        }

        // Paginate the results
        $doctors = $query->paginate(10); // Adjust the number per page as needed

        // Transform the results
        $transformedDoctors = $doctors->map(function ($doctor) {
            return [
                'id' => $doctor->id,
                'name' => $doctor->name
            ];
        });

        $data = [
            'doctors' => $transformedDoctors,
            'pagination' => [
                'total' => $doctors->total(),
                'per_page' => $doctors->perPage(),
                'current_page' => $doctors->currentPage(),
                'last_page' => $doctors->lastPage(),
                'from' => $doctors->firstItem(),
                'to' => $doctors->lastItem(),
            ]
        ];
        // Return the response with pagination metadata
        return $this->successResponse(null, $data);
    }

}