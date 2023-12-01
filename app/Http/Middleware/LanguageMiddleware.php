<?php

namespace App\Http\Middleware;

use Barryvdh\Debugbar\Facades\Debugbar;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->get('locale') && App::getLocale() != session()->get('locale')) {
            App::setLocale(session()->get('locale'));
        } else {
            $locale = $request->getPreferredLanguage([
                'en',
                'ru',
                'ua'
            ]);

            App::setLocale($locale);
        }

        return $next($request);
    }
}
