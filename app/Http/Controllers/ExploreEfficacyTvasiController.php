<?php

namespace App\Http\Controllers;

use App\Settings\ExploreEfficacyTvasiSettings;
use Illuminate\Http\Request;

class ExploreEfficacyTvasiController extends Controller
{
    public function index(ExploreEfficacyTvasiSettings $exploreEfficacyTvasiSettings)
    {
        return view('explore-lumirix-efficacy-t-vasi', compact('exploreEfficacyTvasiSettings'));
    }
}
