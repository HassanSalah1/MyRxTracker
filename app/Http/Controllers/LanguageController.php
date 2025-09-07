<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        // Validate the locale
        if (!in_array($locale, ['en', 'zh'])) {
            abort(404);
        }

        // Set the locale
        App::setLocale($locale);
        
        // Store the locale in session
        Session::put('locale', $locale);
        
        // Redirect back to the previous page or home
        return Redirect::back();
    }
}
