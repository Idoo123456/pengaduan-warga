@extends('layouts.main')
@section('title','Reset Password')

@section('content')
<style>
.reset-box{
    padding:80px 24px;
}
.card{
    max-width:480px;
    margin:auto;
    background:#fff;
    padding:40px;
    border-radius:28px;
    box-shadow:0 30px 80px rgba(0,0,0,.15);
}
input,button{
    width:100%;
    padding:16px;
    border-radius:14px;
}
input{border:1px solid #e5e7eb;margin-bottom:16px}
button{
    background:#6366f1;
    color:#fff;
    border:none;
    font-weight:700;
}
</style>

<div class="reset-box">
<div class="card">

<h2>Reset Password</h2>
<p>Masukkan email untuk mendapatkan kode verifikasi</p>

<form action="#">
    <input type="email" placeholder="Email terdaftar" required>
    <button>Kirim Kode</button>
</form>

</div>
</div>
@endsection
    