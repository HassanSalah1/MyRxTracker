<?php

namespace App\Http\Controllers;

use App\Settings\PrivacyPolicySettings;

class PrivacyPolicyController extends Controller
{
    public function index(PrivacyPolicySettings $privacyPolicySettings)
    {
        return view('privacy-policy', compact('privacyPolicySettings'));
    }
}


