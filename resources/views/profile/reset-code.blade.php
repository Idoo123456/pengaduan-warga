@extends('layouts.main')
@section('title','Verifikasi Kode')

@section('content')
<style>
.box{
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
    background:#22c55e;
    color:#fff;
    border:none;
    font-weight:700;
}
</style>

<div class="box">
<div class="card">

<h2>Masukkan Kode</h2>
<p>Kode telah dikirim ke email Anda (simulasi)</p>

<form>
    <input type="text" placeholder="Kode Verifikasi">
    <input type="password" placeholder="Password Baru">
    <input type="password" placeholder="Ulangi Password">
    <button>Reset Password</button>
</form>

</div>
</div>
@endsection
