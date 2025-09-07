<?php

namespace App\Http\Controllers;

use App\Settings\DownloadSettings;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(DownloadSettings $downloadSettings)
    {
        return view('download', compact('downloadSettings'));
    }
}
