<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->lang) {
            session()->put('locale', $request->lang);
        }

        if (session('locale')) {
            app()->setLocale(session('locale'));
        }

        return $next($request);
    }
}
