<?php

namespace App\Http\Controllers;

use App\Settings\DosingSettings;
use Illuminate\Http\Request;

class DosingController extends Controller
{
    public function index(DosingSettings $dosingSettings)
    {
        return view('dosing', compact('dosingSettings'));
    }
}
