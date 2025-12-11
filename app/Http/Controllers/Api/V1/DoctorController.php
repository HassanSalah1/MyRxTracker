<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

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
        $doctors = $query->get(); // Adjust the number per page as needed

        // Transform the results
        $transformedDoctors = $doctors->map(function ($doctor) {
            return [
                'id' => $doctor->id,
                'name' => $doctor->name_en . ' - ' . $doctor->name_zh
            ];
        });

        $data = [
            'doctors' => $transformedDoctors,
//            'pagination' => [
//                'total' => $doctors->total(),
//                'per_page' => $doctors->perPage(),
//                'current_page' => $doctors->currentPage(),
//                'last_page' => $doctors->lastPage(),
//                'from' => $doctors->firstItem(),
//                'to' => $doctors->lastItem(),
//            ]
        ];
        // Return the response with pagination metadata
        return $this->successResponse(null, $data);
    }

}