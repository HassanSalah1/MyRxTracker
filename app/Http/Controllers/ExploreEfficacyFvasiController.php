<?php

namespace App\Http\Controllers;

use App\Settings\ExploreEfficacyFvasiSettings;
use Illuminate\Http\Request;

class ExploreEfficacyFvasiController extends Controller
{
    public function index(ExploreEfficacyFvasiSettings $exploreEfficacyFvasiSettings)
    {
        return view('explore-lumirix-efficacy-f-vasi', compact('exploreEfficacyFvasiSettings'));
    }
}
