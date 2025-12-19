<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'middle_name'=> 'nullable|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8|confirmed',
            'phone'      => 'required|digits:11',
            'address'    => 'required',
            'school'     => 'required',
            'course'     => 'required',
            'dob'        => 'required|date',
            'disability' => 'nullable|max:255',
            'profile_picture' => 'required|image|max:2048',
        ]);

        DB::transaction(function () use ($validated, $request) {

            // 1️⃣ Create USER
            $user = User::create([
                'first_name'     => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'last_name' => $validated['last_name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
                'is_admin' => true,
            ]);

            // 2️⃣ Upload profile picture
            $fileName = null;
            if ($request->hasFile('profile_picture')) {
                $fileName = time().'_'.$request->profile_picture->getClientOriginalName();
                $request->profile_picture->move(public_path('uploads'), $fileName);
            }

            // 3️⃣ Create STUDENT
            $student = Student::create([
                'user_id'     => $user->id,
                'first_name'  => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'last_name'   => $validated['last_name'],
                'email'       => $validated['email'],
                'phone'       => $validated['phone'],
                'address'     => $validated['address'],
                'school'      => $validated['school'],
                'course'      => $validated['course'],
                'dob'         => $validated['dob'],
                'disability'  => $validated['disability'],
                'profile_picture' => $fileName,
            ]);

            // 4️⃣ Enroll to scholarship
            Application::create([
                'student_id'     => $student->id,
                'scholarship_id' => 1,
                'status'         => 'pending',
            ]);
            

            // 5️⃣ Auto-login
            Auth::login($user);
        });

        return redirect('/')->with('success', 'Application submitted successfully!');

    }

    public function show(Application $application)
    {
        // load related student & scholarship
        $application->load(['student', 'scholarship']);

        return view('admin.show', compact('application'));
    }
    
}
