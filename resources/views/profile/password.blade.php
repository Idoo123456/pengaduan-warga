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
    font-size:15px;
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
.alert{
    padding:12px 14px;
    border-radius:12px;
    margin:16px 0;
    font-size:14px;
}
.alert.success{background:#dcfce7;color:#166534}
.alert.error{background:#fee2e2;color:#991b1b}
@media(max-width:640px){
    .pass-page{
        padding:24px 14px 34px;
    }
    .pass-card{
        padding:24px 18px;
        border-radius:20px;
    }
    input{
        min-height:46px;
        padding:11px 13px;
        border-radius:12px;
        font-size:16px;
    }
    .btn{
        min-height:48px;
        border-radius:12px;
    }
}
</style>

<div class="pass-page">
<div class="pass-card">

<h2>Ganti Password</h2>

@if ($errors->any())
    <div class="alert error">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('profile.password.update') }}" id="passwordForm">
    @csrf

    <div class="form-group">
        <label>Password Lama</label>
        <input type="password" name="current_password" required>
    </div>

    <div class="form-group">
        <label>Password Baru</label>
        <input type="password" name="password" required>
    </div>

    <div class="form-group">
        <label>Ulangi Password Baru</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn">Simpan Password</button>
</form>

<div class="link">
    <a href="{{ route('profile.index') }}">Kembali ke profil</a>
</div>

</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('passwordForm');
    if (!form) return;

    form.addEventListener('submit', (event) => {
        if (!form.checkValidity()) {
            event.preventDefault();
            form.reportValidity();
            return;
        }

        const pageLoading = document.getElementById('pageLoading');
        if (pageLoading) pageLoading.classList.add('show');
    });
});
</script>
@endsection
