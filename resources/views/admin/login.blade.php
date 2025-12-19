<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>
<body>

<div class="auth-container">
    <div class="auth-box">
        <h2>Admin Login</h2>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <ul style="color:red; margin-bottom:15px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div style="color:green; margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            <input type="email" name="email" placeholder="Admin Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>

        <p style="margin-top:15px; font-size:13px;">
            Only authorized admins can access this page
        </p>
        <a class="btn btn-outline" href="{{ route('student.login') }}">Student Login</a>
    </div>
</div>

</body>
</html>
