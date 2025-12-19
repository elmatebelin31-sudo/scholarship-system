@extends('layouts.admin')

@section('content')
<div style="padding:24px; background:#fff; box-shadow:0 4px 8px rgba(0,0,0,.1);">

    <h2>Student Application Details</h2>

    <hr>

    <h3>Student Information</h3>
    <p><strong>Name:</strong> {{ $application->student->name ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $application->student->email ?? 'N/A' }}</p>
    <p><strong>Student ID:</strong> {{ $application->student->id ?? 'N/A' }}</p>

    <hr>

    <h3>Scholarship</h3>
    <p><strong>Title:</strong> {{ $application->scholarship->title ?? 'N/A' }}</p>
    <p><strong>Status:</strong> {{ $application->status }}</p>

    <a href="{{ url()->previous() }}">← Back to Previous Page</a>

</div>
@endsection
