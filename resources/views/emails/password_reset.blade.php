<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    <p>You have requested a password reset. Please click the following link to reset your password:</p>
    <a href="{{ url('reset-password/' . $resetToken) }}">Reset Password</a>
    <p>If you did not request a password reset, you can ignore this email.</p>
</body>
</html>
