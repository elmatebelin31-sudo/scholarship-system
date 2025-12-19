<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Display list of pending applications
    public function index()
    {
    $applications = Application::with(['student', 'scholarship'])
        ->get(); // Fetch all applications

    return view('admin.applications', compact('applications'));
}
    // Approve an application
    public function approve(Application $application)
    {
        $application->update(['status' => 'approved']);
        return back()->with('success', 'Application approved');
    }

    // Reject an application
    public function reject(Application $application)
    {
        $application->update(['status' => 'rejected']);
        return back()->with('success', 'Application rejected');
    }

    // Show create admin form
    public function create()
    {
        return view('admin.create');
    }

    // Handle admin creation
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 1,
        ]);

        return redirect()->route('admin.create')->with('success', 'Admin created successfully!');
    }
    public function applications()
    {
        $users = User::all(); // Get all users
        return view('layouts.admin', compact('users'));
    }
    
}
