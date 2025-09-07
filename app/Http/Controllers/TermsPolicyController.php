<?php

namespace App\Http\Controllers;

use App\Settings\TermsPolicySettings;

class TermsPolicyController extends Controller
{
    public function index(TermsPolicySettings $termsPolicySettings)
    {
        return view('terms-policy', compact('termsPolicySettings'));
    }
}


