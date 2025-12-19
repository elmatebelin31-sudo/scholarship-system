<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>
<body>

<div class="auth-container">
    <div class="auth-box">
        <h2>Create Admin</h2>

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf

            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="middle_name" placeholder="Middle Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

            <button type="submit">Create Admin</button>
        </form>
    </div>
</div>

</body>
</html>
