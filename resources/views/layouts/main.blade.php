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

    {{-- ================= STYLE ================= --}}
    <style>
        /* OVERLAY */
        .confirm-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 99999;
        }

        /* BOX */
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

        /* LOADING */
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

        /* FLOATING WHATSAPP */
        .wa-float {
            position: fixed;
            right: 24px;
            bottom: 24px;
            width: 58px;
            height: 58px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .25);
            z-index: 99999;
            transition: transform .25s, box-shadow .25s;
        }

        .wa-float svg {
            width: 30px;
            height: 30px;
            fill: #fff;
        }

        .wa-float:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow: 0 30px 60px rgba(0, 0, 0, .35);
        }

        /* MOBILE SAFE */
        @media(max-width:600px) {
            .wa-float {
                right: 18px;
                bottom: 18px;
                width: 52px;
                height: 52px;
            }
        }
    </style>

    {{-- ================= SCRIPT GLOBAL ================= --}}
    <script>
        let confirmCallback = null;

        /* CONFIRM */
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

        /* NOTIFY */
        function openNotify(text) {
            document.getElementById('notifyText').innerText = text;
            document.getElementById('notifyModal').style.display = 'flex';
        }

        function closeNotify() {
            document.getElementById('notifyModal').style.display = 'none';
        }

        /* LOADING */
        function showLoading() {
            document.getElementById('pageLoading').classList.add('show');
        }

        /* AUTO HIDE LOADING SAAT PAGE READY */
        window.addEventListener('load', () => {
            const l = document.getElementById('pageLoading');
            l.classList.remove('show');
        });

        /* POPUP DARI SESSION */
        @if (session('success'))
            document.addEventListener('DOMContentLoaded', () => {
                openNotify("{{ session('success') }}");
            });
        @endif
    </script>
    <script>
        /* ================= GLOBAL LOADING ================= */
        document.addEventListener('DOMContentLoaded', () => {

            /* 1. SEMUA LINK (<a>) */
            document.querySelectorAll('a[href]').forEach(link => {
                link.addEventListener('click', e => {
                    const href = link.getAttribute('href');

                    // abaikan anchor, javascript, atau kosong
                    if (!href || href.startsWith('#') || href.startsWith('javascript')) return;

                    showLoading();
                });
            });

            /* 2. SEMUA FORM SUBMIT */
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', () => {
                    showLoading();
                });
            });

        });
    </script>
    <!-- FLOATING WHATSAPP -->
    <a href="https://wa.me/6283862327274?text=Halo%20Admin%20SiPAWA,%20saya%20butuh%20bantuan" class="wa-float"
        target="_blank" aria-label="Hubungi via WhatsApp">
        <svg viewBox="0 0 32 32">
            <path
                d="M16 0C7.164 0 0 7.164 0 16c0 2.82.734 5.578 2.125 8.016L0 32l8.164-2.102A15.93 15.93 0 0 0 16 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29.332c-2.53 0-5.008-.676-7.168-1.953l-.512-.301-4.844 1.25 1.293-4.719-.332-.539A13.29 13.29 0 0 1 2.668 16C2.668 8.64 8.64 2.668 16 2.668S29.332 8.64 29.332 16 23.36 29.332 16 29.332zm7.07-9.875c-.387-.195-2.29-1.133-2.645-1.262-.355-.129-.613-.195-.87.195-.258.387-1 1.262-1.227 1.52-.227.258-.453.289-.84.098-.387-.195-1.633-.602-3.109-1.918-1.148-1.023-1.922-2.285-2.148-2.672-.227-.387-.023-.598.172-.793.176-.176.387-.453.582-.68.195-.227.258-.387.387-.645.129-.258.066-.484-.031-.68-.098-.195-.87-2.098-1.195-2.871-.316-.758-.637-.656-.87-.668l-.742-.012c-.258 0-.68.098-1.035.484-.355.387-1.355 1.324-1.355 3.227 0 1.902 1.387 3.742 1.582 4 .195.258 2.73 4.176 6.613 5.855.926.398 1.648.637 2.211.816.93.297 1.777.254 2.445.156.746-.109 2.29-.938 2.613-1.844.324-.906.324-1.684.227-1.844-.098-.16-.355-.258-.742-.453z" />
        </svg>
    </a>

</body>

</html>
