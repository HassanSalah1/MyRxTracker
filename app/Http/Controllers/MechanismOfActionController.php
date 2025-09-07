<?php

namespace App\Http\Controllers;

use App\Settings\MechanismOfActionSettings;
use Illuminate\Http\Request;

class MechanismOfActionController extends Controller
{
    public function index(MechanismOfActionSettings $mechanismOfActionSettings)
    {
        return view('mechanism_of_action', compact('mechanismOfActionSettings'));
    }
}
