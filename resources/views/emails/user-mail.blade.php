<!doctype html>
<html>

<head>
    <title>User created</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <p>Hello {{ $user->name }},</p>
    <p>Your account has been created. Here are your details:</p>
    <ul>
        <li>Name: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Password: {{ $user->password }}</li>
        
        
    </ul>
</body>
</html>
