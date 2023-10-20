<x-mail::message>
# Bawaabat Aleafia

Dear {{$email}} 
Click in Link Below to Reset Your Password.

<x-mail::button :url="''">
Reset Password
</x-mail::button>

<a href="{{route('reset.password.get', $token)}}">Click</a>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
