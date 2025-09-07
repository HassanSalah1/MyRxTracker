<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // First check if user has manually selected a language in session
        $sessionLocale = Session::get('locale');
        
        if ($sessionLocale && in_array($sessionLocale, ['en', 'zh'])) {
            App::setLocale($sessionLocale);
        } else {
            // Fallback to header-based detection
            $lang = $request->header('accept-language', 'en-US');
            $langArray = [
                'zh-CN' => 'zh',
                'zh' => 'zh',
                'en-US' => 'en',
                'en' => 'en'
            ];
            
            App::setLocale($langArray[$lang] ?? 'en');
        }
        
        return $next($request);
    }
}
