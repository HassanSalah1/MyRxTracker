<?php

namespace App\Http\Controllers;

use App\Settings\HomeSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(HomeSettings $homeSettings)
    {
        return view('home', compact('homeSettings'));
    }
}
