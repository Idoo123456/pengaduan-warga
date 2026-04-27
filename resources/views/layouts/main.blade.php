<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SiPAWA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>

    @include('partials.flash-toast')

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
        <div class="loading-container">
            <div class="loader-pulse"></div>
            <p class="loading-text">Memproses...</p>
        </div>
    </div>

    {{-- ================= MINI LOADING (untuk ajax/form tanpa page reload) ================= --}}
    <div id="miniLoading" class="mini-loading">
        <div class="loader-dots"></div>
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
            padding: 14px 14px;
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

        @media(max-width:640px) {
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

        .page-loading {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, .98) 0%, rgba(249, 250, 251, .98) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 999999;
            opacity: 0;
            pointer-events: none;
            transition: opacity .3s cubic-bezier(.4, 0, .2, 1);
            backdrop-filter: blur(2px);
        }

        .page-loading.show {
            opacity: 1;
            pointer-events: auto;
        }

        .loading-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
        }

        /* ============= LOADER PULSE (untuk page transitions) ============= */
        .loader-pulse {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: conic-gradient(
                from 0deg,
                #6366f1 0deg,
                #a78bfa 90deg,
                #e5e7eb 360deg
            );
            animation: rotateLoader 2s linear infinite, pulseLoader 2s ease-in-out infinite;
            box-shadow: 0 0 30px rgba(99, 102, 241, .3);
        }

        @keyframes rotateLoader {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes pulseLoader {
            0%, 100% {
                box-shadow: 0 0 20px rgba(99, 102, 241, .2);
            }
            50% {
                box-shadow: 0 0 40px rgba(99, 102, 241, .4);
            }
        }

        .loading-text {
            color: #475569;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.5px;
            animation: textFade 1.5s ease-in-out infinite;
        }

        @keyframes textFade {
            0%, 100% {
                opacity: 0.6;
            }
            50% {
                opacity: 1;
            }
        }

        /* ============= MINI LOADING (untuk ajax requests) ============= */
        .mini-loading {
            position: fixed;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999998;
            opacity: 0;
            pointer-events: none;
            transition: opacity .2s ease;
        }

        .mini-loading.show {
            opacity: 1;
        }

        .loader-dots {
            display: flex;
            gap: 6px;
            padding: 12px 16px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 999px;
            box-shadow: 0 8px 24px rgba(99, 102, 241, .3);
        }

        .loader-dots::before,
        .loader-dots::after {
            content: '';
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #fff;
            animation: dotsBounce 1.4s ease-in-out infinite;
        }

        .loader-dots::before {
            animation-delay: -0.32s;
        }

        .loader-dots::after {
            animation-delay: -0.16s;
        }

        @keyframes dotsBounce {
            0%, 80%, 100% {
                opacity: 0.5;
                transform: translateY(0);
            }
            40% {
                opacity: 1;
                transform: translateY(-8px);
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

    {{-- ================= SCRIPT GLOBAL LOADING ================= --}}
    <script>
        // Enhanced loading system dengan berbagai tipe
        const LoadingManager = {
            showPage() {
                const pageLoading = document.getElementById('pageLoading');
                if (pageLoading) pageLoading.classList.add('show');
            },
            hidePage() {
                const pageLoading = document.getElementById('pageLoading');
                if (pageLoading) pageLoading.classList.remove('show');
            },
            showMini() {
                const miniLoading = document.getElementById('miniLoading');
                if (miniLoading) miniLoading.classList.add('show');
            },
            hideMini() {
                const miniLoading = document.getElementById('miniLoading');
                if (miniLoading) miniLoading.classList.remove('show');
            }
        };

        // Shortcut functions
        function showLoading() {
            LoadingManager.showPage();
        }
        function hideLoading() {
            LoadingManager.hidePage();
        }

        let confirmCallback = null;

        function openConfirm(message, callback) {
            confirmCallback = typeof callback === 'function' ? callback : null;

            const modal = document.getElementById('confirmModal');
            const text = document.getElementById('confirmText');
            const yes = document.getElementById('confirmYes');

            if (text) text.textContent = message || 'Apakah Anda yakin?';
            if (modal) modal.style.display = 'flex';
            if (yes) {
                yes.onclick = () => {
                    const callback = confirmCallback;
                    closeConfirm();
                    if (callback) callback();
                };
            }
        }

        function closeConfirm() {
            const modal = document.getElementById('confirmModal');
            if (modal) modal.style.display = 'none';
            confirmCallback = null;
        }

        function openNotify(message) {
            const modal = document.getElementById('notifyModal');
            const text = document.getElementById('notifyText');

            if (text) text.textContent = message || '';
            if (modal) modal.style.display = 'flex';
        }

        function closeNotify() {
            const modal = document.getElementById('notifyModal');
            if (modal) modal.style.display = 'none';
        }

        // Hide loading when page fully loads
        window.addEventListener('load', () => {
            setTimeout(() => {
                LoadingManager.hidePage();
            }, 300);
        });

        // Auto hide loading untuk AJAX requests (jika menggunakan fetch/axios)
        document.addEventListener('DOMContentLoaded', () => {
            // Tangkap semua link kecuali yang membuka di tab baru atau memiliki data-no-loading
            document.querySelectorAll('a[href]:not([target="_blank"])[data-no-loading!=true]').forEach(link => {
                link.addEventListener('click', (e) => {
                    // Jangan tampilkan loading jika link adalah hash atau eksternal
                    const href = link.getAttribute('href');
                    if (href && !href.startsWith('#') && !href.startsWith('http')) {
                        LoadingManager.showPage();
                    }
                });
            });

            // Form submission - show loading untuk form biasa, mini-loading untuk AJAX
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', (e) => {
                    // Skip jika form punya class no-loading atau data-async
                    if (!form.classList.contains('no-loading') && !form.dataset.async) {
                        LoadingManager.showPage();
                    }
                });
            });
        });
    </script>

</body>

</html>
