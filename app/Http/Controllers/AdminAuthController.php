<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            // ❌ Block non-admin users
            if (!auth()->user()->is_admin) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Access denied. Admins only.'
                ]);
            }

            // ✅ Redirect to welcome.blade.php (homepage)
            return redirect('/')
                ->with('success', 'Welcome Admin!');
        }

        return back()->withErrors([
            'email' => 'Invalid login credentials.'
        ]);
    }
    
}
