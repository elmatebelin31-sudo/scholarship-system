<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();
        return view('scholarships.index', compact('scholarships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'amount'      => 'required|numeric',
        ]);

        Scholarship::create([
            'title'       => $request->title,
            'description' => $request->description,
            'amount'      => $request->amount,
        ]);

        return redirect()->route('scholarships.index')
                         ->with('success', 'Scholarship added successfully!');
    }
}
