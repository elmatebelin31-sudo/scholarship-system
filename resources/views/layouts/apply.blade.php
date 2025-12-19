@extends('layouts.admin')

@section('content')
<h2>Pending Applications</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($applications as $application)
    <tr>
        <td>{{ $application->student->first_name }} {{ $application->student->middle_name }} {{ $application->student->last_name }}</td>
        <td>{{ $application->student->email }}</td>
        <td>{{ $application->status }}</td>
        <td>
            <form method="POST" action="{{ route('admin.applications.approve', $application->id) }}" style="display:inline-block;">
                @csrf
                <button type="submit">Approve</button>
            </form>
            <form method="POST" action="{{ route('admin.applications.reject', $application->id) }}" style="display:inline-block;">
                @csrf
                <button type="submit">Reject</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
