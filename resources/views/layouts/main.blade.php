<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SiPAWA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>

    {{-- HEADER --}}
    @include('partials.header')

    {{-- CONTENT --}}
    <main class="page">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- ================= LOADING GLOBAL ================= --}}
    <div id="pageLoading" class="page-loading">
        <div class="loader"></div>
        <p>Memproses...</p>
    </div>

    {{-- ================= CONFIRM MODAL ================= --}}
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

    {{-- ================= NOTIFY MODAL ================= --}}
    <div id="notifyModal" class="confirm-overlay">
        <div class="confirm-box">
            <h3>Pemberitahuan</h3>
            <p id="notifyText"></p>
            <div class="confirm-actions">
                <button class="btn-confirm" onclick="closeNotify()">OK</button>
            </div>
        </div>
    </div>

    {{-- ================= STYLE (TIDAK DIUBAH) ================= --}}
    <style>
        .confirm-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 99999;
        }

        .confirm-box {
            background: #fff;
            padding: 28px;
            border-radius: 20px;
            width: 90%;
            max-width: 360px;
            text-align: center;
            animation: pop .25s ease;
        }

        .confirm-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-cancel {
            flex: 1;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            background: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-confirm {
            flex: 1;
            padding: 12px;
            border-radius: 12px;
            border: none;
            background: #6366f1;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
        }

        .page-loading {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, .95);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 999999;
            opacity: 0;
            pointer-events: none;
            transition: .3s;
        }

        .page-loading.show {
            opacity: 1;
            pointer-events: auto;
        }

        .loader {
            width: 48px;
            height: 48px;
            border: 4px solid #e5e7eb;
            border-top-color: #6366f1;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 12px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg)
            }
        }

        @keyframes pop {
            from {
                opacity: 0;
                transform: scale(.9)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }
    </style>

    {{-- ================= SCRIPT GLOBAL ================= --}}
    <script>
        let confirmCallback = null;

        function openConfirm(text, callback) {
            document.getElementById('confirmText').innerText = text;
            document.getElementById('confirmModal').style.display = 'flex';
            confirmCallback = callback;
        }

        function closeConfirm() {
            document.getElementById('confirmModal').style.display = 'none';
            confirmCallback = null;
        }

        document.getElementById('confirmYes').onclick = () => {
            if (confirmCallback) confirmCallback();
            closeConfirm();
        }

        function openNotify(text) {
            document.getElementById('notifyText').innerText = text;
            document.getElementById('notifyModal').style.display = 'flex';
        }

        function closeNotify() {
            document.getElementById('notifyModal').style.display = 'none';
        }

        function showLoading() {
            document.getElementById('pageLoading').classList.add('show');
        }

        window.addEventListener('load', () => {
            document.getElementById('pageLoading').classList.remove('show');
        });
    </script>

    {{-- ================= GLOBAL LOADING (HANYA TAMBAH IF) ================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            document.querySelectorAll('a[href]').forEach(link => {
                link.addEventListener('click', () => {
                    showLoading();
                });
            });

            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', () => {

                    // 🔥 INI SAJA YANG DITAMBAHKAN
                    if (form.id === 'pengaduanForm') return;

                    showLoading();
                });
            });

        });
    </script>

</body>

</html>
