<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin == 1) {
            // User is admin, allow access
            return $next($request);
        }

        // Not an admin, redirect to student login or home
        return redirect('/student/login')->with('error', 'Access denied. Admins only.');
    }
}
