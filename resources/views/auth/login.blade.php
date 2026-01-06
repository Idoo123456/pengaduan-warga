<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login | SiPAWA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/auth-login.css') }}">
</head>

<body>

<div class="auth-wrapper">
    <div class="auth-card">

        {{-- LEFT --}}
        <div class="auth-left">
            <img src="{{ asset('assets/images/logo-sipawa.png') }}" class="logo">

            <h1>Selamat Datang 👋</h1>
            <p>
                Silakan login untuk mengakses layanan pengaduan
                dan aspirasi warga desa secara online dengan mudah
                dan transparan.
            </p>

            <img src="{{ asset('assets/images/login-illustration.png') }}"
                 class="illustration" alt="Ilustrasi Login">
        </div>

        {{-- RIGHT --}}
        <div class="auth-right">

            <h2>Login</h2>
            <p class="subtitle">Masuk ke akun Anda</p>

            {{-- FLASH MESSAGE --}}
            @if (session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert error">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login.process') }}" autocomplete="off">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                           placeholder="contoh@email.com" required>
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <div class="password-wrapper">
                        <input type="password" name="password" id="password"
                               placeholder="Masukkan password" required>

                        <button type="button" class="toggle-password"
                                onclick="togglePassword()">👁</button>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    Login
                </button>
            </form>

        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>

</body>
</html>
