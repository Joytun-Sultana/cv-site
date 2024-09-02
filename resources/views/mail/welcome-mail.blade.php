<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h3>{{ $subject }}</h3>
    <p>Dear {{ $name }} </p>
    <p>Thank you for signing up for CV-Site</p>
    <p>To complete your registration and start building your CV, please verify your email address by clicking the link below:</p>
    {{-- <a href="http://127.0.0.1:8000/confirm">Verify</a> --}}
    <a href="{{ url('http://127.0.0.1:8000/confirm?token=' . $token) }}">Click Here to Verify</a>

    
</body>
</html>