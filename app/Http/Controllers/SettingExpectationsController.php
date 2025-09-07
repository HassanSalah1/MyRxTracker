<?php

namespace App\Http\Controllers;

use App\Settings\SettingExpectationsSettings;
use Illuminate\Http\Request;

class SettingExpectationsController extends Controller
{
    public function index(SettingExpectationsSettings $settingExpectationsSettings)
    {
        return view('setting-expectations', compact('settingExpectationsSettings'));
    }
}
