<h2>{{ $scholarship->title }}</h2>
<p>{{ $scholarship->description }}</p>
<p>Amount: ₱{{ $scholarship->amount }}</p>

<a href="/applications/create?scholarship_id={{ $scholarship->id }}">Apply Now</a>
        