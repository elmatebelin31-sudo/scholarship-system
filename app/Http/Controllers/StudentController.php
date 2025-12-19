<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'school' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'disability' => 'nullable|string|max:255',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Handle the profile picture upload
        if ($request->hasFile('profile_picture')) {
            $fileName = time().'_'.$request->profile_picture->getClientOriginalName();
            $request->profile_picture->move(public_path('uploads'), $fileName);
        } else {
            $fileName = null;
        }

        // Create a new student record
        Student::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'school' => $request->school,
            'course' => $request->course,
            'disability' => $request->disability,
            'profile_picture' => $fileName
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}
