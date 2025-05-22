<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

        $lang = $request->header('accept-language', 'en-US'); // string
        $langArray =[
            'zh-CN' => 'zh' ,
            'en-US' => 'en'
        ];

        App::setLocale($langArray[$lang] ?? 'en');
        return $next($request);
    }
}
