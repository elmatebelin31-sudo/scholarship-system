@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Scholarships</h1>

    <div class="scholarship-list">
        @foreach($scholarships as $scholarship)
            <div class="scholarship-card">
                <h2>{{ $scholarship->title }}</h2>
                <p>{{ $scholarship->description }}</p>
                <p class="amount">Amount: ₱{{ number_format($scholarship->amount, 2) }}</p>

                @auth
                    <a href="/applications/create?scholarship_id={{ $scholarship->id }}" class="apply-btn">Apply Now</a>
                @else
                    <a href="{{ route('login') }}" class="apply-btn login-btn">Login to Apply</a>
                @endauth
            </div>
        @endforeach
    </div>
</div>
@endsection
