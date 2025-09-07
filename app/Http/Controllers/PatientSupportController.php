<?php

namespace App\Http\Controllers;

use App\Settings\PatientSupportSettings;
use Illuminate\Http\Request;

class PatientSupportController extends Controller
{
    public function index(PatientSupportSettings $patientSupportSettings)
    {
        return view('patient-support', compact('patientSupportSettings'));
    }
}
