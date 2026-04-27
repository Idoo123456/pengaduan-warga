<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login | SiPAWA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            background: #f4f7fb;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .auth-card {
            width: 100%;
            max-width: 1100px;
            background: #fff;
            border-radius: 28px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            box-shadow: 0 40px 90px rgba(79, 70, 229, .25);
        }

        .auth-left {
            background: linear-gradient(160deg, #6366f1, #818cf8);
            padding: 50px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-left .logo {
            width: 130px;
            margin-bottom: 40px;
        }

        .auth-left h1 {
            font-size: 34px;
            margin-bottom: 16px;
        }

        .auth-left p {
            font-size: 15px;
            line-height: 1.6;
            opacity: .95;
        }

        .auth-left .illustration {
            max-width: 320px;
            margin-top: 40px;
        }

        .auth-right {
            padding: 60px 50px;
        }

        .auth-right h2 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            background: #f1f5f9;
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            border-radius: 16px;
            background: #6366f1;
            color: #fff;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .register-link {
            margin-top: 24px;
            text-align: center;
            font-size: 14px;
        }

        .register-link a {
            color: #6366f1;
            text-decoration: none;
            font-weight: 600;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert.success {
            background: #dcfce7;
            color: #166534;
        }

        .alert.error {
            background: #fee2e2;
            color: #991b1b;
        }

        .flash-toast {
            position: fixed;
            top: 18px;
            right: 18px;
            width: min(420px, calc(100% - 36px));
            z-index: 1000000;
            display: grid;
            grid-template-columns: 34px 1fr 30px;
            align-items: center;
            gap: 12px;
            padding: 14px;
            border-radius: 16px;
            color: #fff;
            box-shadow: 0 22px 50px rgba(15, 23, 42, .22);
            animation: flashToastIn .28s ease;
        }

        .flash-toast.success {
            background: linear-gradient(135deg, #16a34a, #22c55e);
        }

        .flash-toast.error {
            background: linear-gradient(135deg, #dc2626, #ef4444);
        }

        .flash-toast.hide {
            opacity: 0;
            transform: translateY(-10px);
            transition: .25s ease;
        }

        .flash-toast-icon {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            display: grid;
            place-items: center;
            background: rgba(255, 255, 255, .2);
            font-weight: 800;
        }

        .flash-toast-message {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.45;
        }

        .flash-toast-close {
            width: 30px;
            height: 30px;
            border: none;
            border-radius: 999px;
            background: rgba(255, 255, 255, .18);
            color: #fff;
            font-size: 20px;
            line-height: 1;
            cursor: pointer;
        }

        @keyframes flashToastIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* MODAL */
        .confirm-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .confirm-box {
            background: #fff;
            padding: 32px;
            border-radius: 24px;
            width: 90%;
            max-width: 420px;
            text-align: center;
        }

        .confirm-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-cancel,
        .btn-confirm {
            flex: 1;
            padding: 12px;
            border-radius: 999px;
            border: none;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-cancel {
            background: #e5e7eb;
        }

        .btn-confirm {
            background: #6366f1;
            color: #fff;
        }

        /* ============= LOADING LOGIN ============= */
        .global-loading {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, .98) 0%, rgba(249, 250, 251, .98) 100%);
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;\n            z-index: 99999;
            backdrop-filter: blur(3px);
        }

        .global-loading.active {
            display: flex;
        }

        .spinner {
            width: 70px;
            height: 70px;
            position: relative;
            margin-bottom: 20px;
        }

        .spinner::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: conic-gradient(
                from 0deg,
                #6366f1 0deg,
                #8b5cf6 120deg,
                #ec4899 240deg,
                #6366f1 360deg
            );
            animation: spinGradient 2.5s linear infinite;
        }

        .spinner::after {
            content: '';
            position: absolute;
            inset: 4px;
            border-radius: 50%;
            background: #fff;
            z-index: 1;
        }

        @keyframes spinGradient {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .global-loading p {
            color: #475569;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.6px;
            animation: loadingText 1.5s ease-in-out infinite;
        }

        @keyframes loadingText {
            0%, 100% {
                opacity: 0.7;
            }
            50% {
                opacity: 1;
            }
        }

        @media(max-width:900px) {
            .auth-wrapper {
                align-items: flex-start;
                padding: 18px 14px;
            }

            .auth-card {
                grid-template-columns: 1fr;
                border-radius: 20px;
                box-shadow: 0 18px 45px rgba(79, 70, 229, .16);
            }

            .auth-left {
                display: none;
            }

            .auth-right {
                padding: 28px 20px;
            }

            .auth-right h2 {
                font-size: 24px;
                line-height: 1.2;
            }

            .subtitle {
                margin-bottom: 22px;
            }

            .form-group {
                margin-bottom: 16px;
            }

            .form-group input {
                min-height: 46px;
                padding: 11px 42px 11px 13px;
                border-radius: 12px;
                font-size: 16px;
            }

            .btn-login {
                min-height: 48px;
                padding: 13px;
                border-radius: 12px;
            }

            .register-link {
                margin-top: 18px;
            }

            .flash-toast {
                top: 12px;
                left: 12px;
                right: 12px;
                width: auto;
                grid-template-columns: 30px 1fr 28px;
                padding: 12px;
                border-radius: 14px;
            }

            .flash-toast-icon {
                width: 30px;
                height: 30px;
            }
        }

        /* ================= PAGE ANIMATION ================= */
        .auth-wrapper {
            opacity: 0;
            transform: translateY(30px);
            animation: pageEnter .6s ease forwards;
        }

        @keyframes pageEnter {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    @include('partials.flash-toast')

    <body class="page-enter">
        <style>
            .page-enter {
                animation: fadeIn .5s ease;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px)
                }

                to {
                    opacity: 1;
                    transform: none
                }
            }
        </style>

        <div class="auth-wrapper">
            <div class="auth-card">

                <div class="auth-left">
                    <img src="{{ asset('assets/images/logo-sipawa.png') }}" class="logo">
                    <h1>Selamat Datang 👋</h1>
                    <p>Silakan login untuk mengakses layanan pengaduan warga.</p>
                    <img src="{{ asset('assets/images/login-illustration.png') }}" class="illustration">
                </div>

                <div class="auth-right">

                    <h2>Login</h2>
                    <p class="subtitle">Masuk ke akun Anda</p>

                    @if ($errors->any())
                        <div class="alert error" id="flashMsg">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.process') }}" id="loginForm" onsubmit="handleLoginSubmit(event)">
                        @csrf

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="password-wrapper">
                                <input type="password" id="password" name="password" required>
                                <button type="button" class="toggle-password" onclick="togglePassword()">👁</button>
                            </div>
                        </div>

                        <button type="submit" class="btn-login">
                            Login
                        </button>

                        <p class="register-link">
                            Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>

        {{-- MODAL --}}
        <div id="confirmModal" class="confirm-overlay">
            <div class="confirm-box">
                <h3>Konfirmasi</h3>
                <p id="confirmText">Apakah Anda yakin?</p>
                <div class="confirm-actions">
                    <button class="btn-cancel" onclick="closeConfirm()">Batal</button>
                    <button class="btn-confirm" id="confirmYes">Ya</button>
                </div>
            </div>
        </div>

        {{-- LOADING --}}
        <div id="globalLoading" class="global-loading">
            <div class="spinner"></div>
            <p>Memproses...</p>
        </div>

        <script>
            function togglePassword() {
                const p = document.getElementById('password');
                p.type = p.type === 'password' ? 'text' : 'password';
            }

            let confirmCallback = null;

            function openConfirm(msg, cb) {
                document.getElementById('confirmText').innerText = msg;
                document.getElementById('confirmModal').style.display = 'flex';
                confirmCallback = cb;
            }

            function closeConfirm() {
                document.getElementById('confirmModal').style.display = 'none';
                confirmCallback = null;
            }

            document.getElementById('confirmYes').onclick = () => {
                if (confirmCallback) confirmCallback();
                closeConfirm();
            }

            setTimeout(() => {
                const flash = document.getElementById('flashMsg');
                if (flash) flash.remove();
            }, 3000);
        </script>
        <script>
            function handleLoginSubmit(e) {
                const form = e.target;
                if (!form.checkValidity()) {
                    e.preventDefault();
                    form.reportValidity();
                    return false;
                }

                // Show loading
                const loading = document.getElementById('globalLoading');
                if (loading) {
                    loading.classList.add('active');
                }

                return true;
            }

            window.addEventListener('load', () => {
                document.body.classList.add('loaded');
            });
        </script>

    </body>

</html>
