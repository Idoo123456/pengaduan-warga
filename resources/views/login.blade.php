@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container" style="margin-top:150px; max-width:400px">
    <h2>Login</h2>

    <form>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control">
        </div>

        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
