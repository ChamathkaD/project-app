<x-mail::message>
# Hello {{ $user->name }}, 
Your account has been created. Here are your details:<br>

Name:{{ $user->name }}<br>
Email:{{ $user->email }}


 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>