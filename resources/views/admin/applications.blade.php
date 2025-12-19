@extends('layouts.admin')

@section('content')
<div class="admin-card" style="padding: 24px; background: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius:none;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #111;">Applications</h2>

    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #e5e7eb; text-align: left; }
        th { background: #f3f4f6; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; color: #6b7280; }
        td { vertical-align: middle; }

        /* Actions styling */
        .actions-cell { text-align: center; }
        .actions-cell form,
        .actions-cell a {
            display: inline-block;
            margin: 10px 2px;
            background: none;   /* remove form background */
            border: none;       /* remove form border */
            padding: 8px 0;         /* remove form padding */
            
        }

        .actions-cell .btn {
            display: inline-block;
            width: 80px;
            padding: 8px 0;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            background: none;   /* remove button background */
            border: none;
        }

        /* Individual colors */
        .actions-cell .view-btn { color: #3b82f6; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); height: 27px;}
        .actions-cell .approve-btn { color: #16a34a;}
        .actions-cell .reject-btn { color: #dc2626; }
        .actions-cell .delete-btn { color: #6b7280; }

        /* Hover effect */
        .actions-cell .btn:hover { opacity: 0.7; }

        /* Status colors */
        .status-pending { color: #ca8a04; font-weight: 600; }
        .status-approved { color: #16a34a; font-weight: 600; }
        .status-rejected { color: #dc2626; font-weight: 600; }
    </style>

    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Scholarship</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->student->name ?? $application->student_id }}</td>
                    <td>{{ $application->scholarship->title ?? $application->scholarship_id }}</td>
                    <td>
                        @if($application->status == "pending")
                            <span class="status-pending">Pending</span>
                        @elseif($application->status == 1)
                            <span class="status-approved">Approved</span>
                        @else
                            <span class="status-rejected">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $application->created_at->format('M d, Y H:i') }}</td>
                    <td>{{ $application->updated_at->format('M d, Y H:i') }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('applications.show', $application->id) }}" class="btn view-btn">View</a>

                        @if($application->status == 'pending')
                        <form action="{{ route('admin.applications.approve', $application->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn approve-btn">Approve</button>
                        </form>
                        <form action="{{ route('admin.applications.reject', $application->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn reject-btn">Reject</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
