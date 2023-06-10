<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isAuthenticated()) {

            app()->setLocale(getAuthenticatedUser()->local);

            return $next($request);
        }
 
        if ($request->has('locale')) {

            app()->setLocale($request->locale);
        }

        return $next($request);
    }
}
