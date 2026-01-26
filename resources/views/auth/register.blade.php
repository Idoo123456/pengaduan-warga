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
            .card {
                grid-template-columns: 1fr;
            }

            .left {
                display: none;
            }
        }
    </style>
</head>

<body>

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
              onsubmit="return confirmSubmit()"
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
    });

    function confirmSubmit() {
        return window.confirm('Apakah data sudah benar dan siap membuat akun?');
    }
});
</script>


</body>
</html>
