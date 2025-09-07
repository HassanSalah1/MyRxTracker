<?php

namespace App\Http\Controllers;

use App\Settings\SafetyProfileSettings;
use Illuminate\Http\Request;

class SafetyProfileController extends Controller
{
    public function index(SafetyProfileSettings $safetyProfileSettings)
    {
        return view('safety-profile', compact('safetyProfileSettings'));
    }
}
