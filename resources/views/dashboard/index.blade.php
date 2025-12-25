@extends('layouts.main')

@section('title','Dashboard')

@section('content')
<div class="container py-5">
    <h3>Dashboard</h3>
    <p>Selamat datang, <strong>{{ session('user')->nama ?? 'User' }}</strong></p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
