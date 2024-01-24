<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguagePrefixMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $language = $request->segment(1);
    
        if (in_array($language, config('app.locales'))) {
            app()->setLocale($language);
        } else {
            return redirect('/lv');
        }

        return $next($request);
    }
}
