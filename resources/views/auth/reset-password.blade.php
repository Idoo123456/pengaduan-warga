@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<h2>Reset Password</h2>

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password baru" required>
    <input type="password" name="password_confirmation" placeholder="Ulangi password" required>

    <button type="submit">Reset Password</button>
</form>
@endsection
