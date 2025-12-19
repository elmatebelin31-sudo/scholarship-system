<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.student-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Prevent admins from logging in as students
            if ($user->is_admin) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Admin users cannot log in as students.',
                ]);
            }

            $name = $user->first_name;
            return redirect('/')->with('success', "Welcome, $name!");
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    // --- ADD THESE METHODS ---
    public function showRegisterForm()
    {
        return view('auth.student-register'); // your register blade
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name'     => 'required|string|max:255',
            'middle_name'     => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name'     => $request->first_name,
            'middle_name'     => $request->middle_name,
            'last_name'     => $request->last_name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 0,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', "Welcome, {$user->name}!");
    }
}
