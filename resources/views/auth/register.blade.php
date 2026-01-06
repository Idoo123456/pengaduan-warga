@extends('layouts.auth')

@section('title', 'Daftar Akun')

@section('content')
<div class="auth-box">
    <h2>Daftar Akun</h2>

    <form method="POST" action="{{ route('register.process') }}">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" placeholder="Nama Lengkap" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="contoh@email.com" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" name="password_confirmation" placeholder="Ulangi Password" required>
        </div>

        <button type="submit" class="btn-primary">Daftar</button>
    </form>

    <p class="auth-link">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
    </p>
</div>
@endsection
