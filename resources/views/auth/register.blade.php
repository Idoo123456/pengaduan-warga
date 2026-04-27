<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar | SiPAWA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ================= CSS ASLI (TIDAK DIUBAH) ================= */
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            background: #f4f7fb;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
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

        .card {
            width: 100%;
            max-width: 1150px;
            background: #fff;
            border-radius: 34px;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            overflow: hidden;
            box-shadow: 0 50px 120px rgba(79, 70, 229, .25);
        }

        .left {
            background: linear-gradient(160deg, #4f46e5, #6366f1, #818cf8);
            color: #fff;
            padding: 70px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .left::after {
            content: '';
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 260px;
            height: 260px;
            background: rgba(255, 255, 255, .08);
            border-radius: 50%;
        }

        .left h1 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .left p {
            font-size: 15px;
            line-height: 1.7;
            opacity: .95;
            margin-bottom: 26px;
        }

        .left ul {
            list-style: none;
            padding: 0;
            margin: 0 0 30px;
        }

        .left ul li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
            font-size: 14px;
            line-height: 1.6;
        }

        .left ul li span {
            font-size: 18px;
        }

        .left .quote {
            margin-top: 30px;
            padding-left: 18px;
            border-left: 4px solid rgba(255, 255, 255, .6);
            font-size: 14px;
            opacity: .9;
        }

        .right {
            padding: 70px 60px;
        }

        .right h2 {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .right p {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            font-weight: 600;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 15px 16px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            margin-top: 6px;
            font-size: 14px;
            background: #f8fafc;
        }

        input:focus {
            outline: none;
            background: #fff;
            border-color: #6366f1;
        }

        .btn {
            width: 100%;
            padding: 16px;
            background: #6366f1;
            color: #fff;
            border: none;
            border-radius: 18px;
            font-weight: 700;
            font-size: 15px;
            margin-top: 10px;
            cursor: pointer;
            transition: .3s;
        }

        .btn:hover {
            background: #4f46e5;
        }

        .alert {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px 16px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-size: 14px;
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

        .link {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
        }

        .link a {
            color: #6366f1;
            font-weight: 600;
            text-decoration: none;
        }

        @media(max-width:900px) {
            body {
                align-items: flex-start;
                padding: 18px 14px;
            }

            .card {
                grid-template-columns: 1fr;
                border-radius: 20px;
                box-shadow: 0 18px 45px rgba(79, 70, 229, .16);
            }

            .left {
                display: none;
            }

            .right {
                padding: 28px 20px;
            }

            .right h2 {
                font-size: 24px;
                line-height: 1.2;
            }

            .right p {
                margin-bottom: 22px;
            }

            .form-group {
                margin-bottom: 14px;
            }

            input {
                min-height: 46px;
                padding: 11px 13px;
                border-radius: 12px;
                font-size: 16px;
            }

            .btn {
                min-height: 48px;
                padding: 13px;
                border-radius: 12px;
            }

            .link {
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

        /* ============= LOADING REGISTER ============= */
        .global-loading {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, .98) 0%, rgba(249, 250, 251, .98) 100%);
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            z-index: 99999;
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
    </style>
</head>

<body>
@include('partials.flash-toast')

<div class="card">

    <!-- LEFT -->
    <div class="left">
        <h1>Bergabung Bersama SiPAWA</h1>
        <p>
            SiPAWA adalah sistem pengaduan warga desa yang dirancang untuk
            menciptakan lingkungan yang lebih aman, tertata, dan transparan.
        </p>
        <ul>
            <li><span>✔️</span> Laporkan masalah desa dengan mudah</li>
            <li><span>✔️</span> Pantau status secara transparan</li>
            <li><span>✔️</span> Data aman & terlindungi</li>
            <li><span>✔️</span> Solusi digital modern</li>
        </ul>
        <div class="quote">
            “Daftar hari ini dan jadilah bagian dari solusi desa.”
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <h2>Registrasi Akun</h2>
        <p>Lengkapi data diri Anda untuk mulai menggunakan layanan</p>

        @if ($errors->any())
            <div class="alert">
                @foreach ($errors->all() as $e)
                    <div>{{ $e }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST"
              action="{{ route('register.process') }}"
              id="registerForm"
              autocomplete="off">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" maxlength="16" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn">
                Daftar Sekarang
            </button>
        </form>

        <div class="link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

</div>

<!-- LOADING -->
<div id="globalLoading" class="global-loading">
    <div class="spinner"></div>
    <p>Membuat akun...</p>
</div>

<!-- SCRIPT AMAN -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registerForm');
    const button = form.querySelector('button[type="submit"]');
    let submitted = false;

    form.addEventListener('submit', function (e) {

        if (submitted) {
            e.preventDefault();
            return;
        }

        const name = form.querySelector('[name="name"]').value.trim();
        const nik = form.querySelector('[name="nik"]').value.trim();
        const email = form.querySelector('[name="email"]').value.trim();
        const password = form.querySelector('[name="password"]').value;
        const confirm = form.querySelector('[name="password_confirmation"]').value;

        // VALIDASI DASAR
        if (!name || !nik || !email || !password || !confirm) {
            alert('Semua field wajib diisi');
            e.preventDefault();
            return;
        }

        if (nik.length !== 16 || isNaN(nik)) {
            alert('NIK harus 16 digit angka');
            e.preventDefault();
            return;
        }

        if (password !== confirm) {
            alert('Password dan konfirmasi tidak sama');
            e.preventDefault();
            return;
        }

        // KONFIRMASI
        if (!confirmSubmit()) {
            e.preventDefault();
            return;
        }

        // Cegah double submit
        submitted = true;
        button.disabled = true;
        button.innerText = 'Memproses...';
        document.getElementById('globalLoading').classList.add('active');
    });

    function confirmSubmit() {
        return window.confirm('Apakah data sudah benar dan siap membuat akun?');
    }
});
</script>


</body>
</html>
