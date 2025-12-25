@extends('layouts.auth')

@section('content')
<div class="login-wrapper">
    <div class="login-split-card">

        <!-- KIRI : BRANDING -->
        <div class="login-brand">
            <div class="brand-content">
                <img src="{{ asset('assets/images/logo-sipawa.png') }}" class="brand-logo" alt="SiPAWA">

                <h1>Sistem Pengaduan Warga</h1>
                <p>
                    SiPAWA membantu warga menyampaikan aspirasi dan
                    memantau tindak lanjut pengaduan secara transparan,
                    cepat, dan aman.
                </p>
            </div>
        </div>

        <!-- KANAN : FORM LOGIN -->
        <div class="login-form">
            <h2>Selamat Datang 👋</h2>
            <span>Silakan login untuk melanjutkan</span>

            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Login</button>
            </form>

            <small>© 2025 SiPAWA</small>
        </div>

    </div>
</div>
@endsection
