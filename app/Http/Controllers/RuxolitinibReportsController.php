<?php

namespace App\Http\Controllers;

use App\Settings\RuxolitinibReportsSettings;
use Illuminate\Http\Request;

class RuxolitinibReportsController extends Controller
{
    public function index(RuxolitinibReportsSettings $ruxolitinibReportsSettings)
    {
        return view('ruxolitinib-reports', compact('ruxolitinibReportsSettings'));
    }
}
