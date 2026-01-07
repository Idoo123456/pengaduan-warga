@extends('layouts.main')
@section('title','Ganti Password')

@section('content')
<style>
.pass-page{
    padding:80px 24px;
    background:#f4f7fb;
}
.pass-card{
    max-width:520px;
    margin:auto;
    background:#fff;
    border-radius:28px;
    padding:40px;
    box-shadow:0 30px 80px rgba(0,0,0,.15);
}
.form-group{margin-bottom:18px}
label{font-weight:600}
input{
    width:100%;
    padding:14px;
    border-radius:14px;
    border:1px solid #e5e7eb;
}
.btn{
    width:100%;
    padding:16px;
    border:none;
    border-radius:16px;
    background:#6366f1;
    color:#fff;
    font-weight:700;
    margin-top:10px;
}
.link{text-align:center;margin-top:18px}
.link a{color:#6366f1;text-decoration:none;font-weight:600}
</style>

<div class="pass-page">
<div class="pass-card">

<h2>Ganti Password</h2>

<form method="POST" action="#">
    @csrf

    <div class="form-group">
        <label>Password Lama</label>
        <input type="password" required>
    </div>

    <div class="form-group">
        <label>Password Baru</label>
        <input type="password" required>
    </div>

    <div class="form-group">
        <label>Ulangi Password Baru</label>
        <input type="password" required>
    </div>

    <button class="btn">Simpan Password</button>
</form>

<div class="link">
    <a href="{{ route('profile.reset') }}">Lupa password?</a>
</div>

</div>
</div>
@endsection
