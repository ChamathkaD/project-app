<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Created</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Add any additional stylesheets or scripts here -->
</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-4 mt-8 bg-white shadow-md max-w-md rounded-md">

        <div class="text-center">
            <h2 class="text-2xl font-bold">User Created</h2>
        </div>

        <div class="mt-4">
            <p>Hello {{ $user->name }},</p>
            <p>Your account has been created. Here are your details:</p>
            <ul class="list-disc pl-6 mt-2">
                <li><strong>Name:</strong> {{ $user->name }}</li>
                <li><strong>Email:</strong> {{ $user->email }}</li>
                {{-- <li><strong>Password:</strong> {{ $user->password }}</li> --}}
            </ul>
        </div>

        <div class="mt-6 text-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{ route('dashboard') }}">Visit Your Profile</a>
            </button>
        </div>

        <div class="mt-8 text-center text-gray-500">
            Thanks,<br>
            {{ config('app.name') }}
        </div>

    </div>

</body>

</html>
