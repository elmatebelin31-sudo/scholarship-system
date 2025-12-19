<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin == 0) {
            // User is student, allow access
            return $next($request);
        }

        // Not a student, redirect to admin login or home
        return redirect('/admin/login')->with('error', 'Access denied. Students only.');
    }
}
