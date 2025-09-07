<?php

namespace App\Http\Controllers;

use App\Settings\EfficacyProfileSettings;
use Illuminate\Http\Request;

class EfficacyProfileController extends Controller
{
    public function index(EfficacyProfileSettings $efficacyProfileSettings)
    {
        return view('efficacy-profile', compact('efficacyProfileSettings'));
    }
}
