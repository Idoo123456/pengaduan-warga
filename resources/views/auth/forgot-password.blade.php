@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
<h2>Lupa Password</h2>

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Email terdaftar" required>
    <button type="submit">Kirim Link Reset</button>
</form>

<a href="{{ route('login') }}">Kembali ke login</a>
@endsection
