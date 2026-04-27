<header class="site-header">
    <style>
        /* ================= HEADER ================= */
        .site-header {
            background: #ffffff;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .08);
            position: sticky;
            top: 0;
            z-index: 9999;
        }

        .header-wrap {
            max-width: 1200px;
            margin: auto;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* ================= LOGO ================= */
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo img {
            height: 70px;
        }

        /* ================= MENU ================= */
        .nav-menu {
            display: flex;
            gap: 28px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #1f2937;
            font-weight: 600;
            font-size: 15px;
            position: relative;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0;
            height: 3px;
            background: #6366f1;
            border-radius: 10px;
            transition: .3s;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        /* ================= USER ================= */
        .nav-user {
            position: relative;
        }

        .user-btn {
            background: none;
            border: none;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 999px;
        }

        .user-btn:hover {
            background: #f1f5f9;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #6366f1;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .name {
            font-weight: 600;
            font-size: 14px;
            color: #111827;
            max-width: 120px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ================= DROPDOWN ================= */
        .dropdown-menu {
            position: absolute;
            right: 0;
            top: 60px;
            width: 240px;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, .18);
            padding: 14px;
            display: none;
            z-index: 99999;
            animation: fadeUp .25s ease;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-menu a,
        .dropdown-menu button {
            width: 100%;
            display: block;
            padding: 12px;
            border-radius: 12px;
            text-decoration: none;
            color: #1f2937;
            font-weight: 600;
            background: none;
            border: none;
            text-align: left;
            cursor: pointer;
        }

        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background: #f1f5f9;
        }

        .logout-btn {
            color: #dc2626;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media(max-width:900px) {
            .site-header {
                position: sticky;
            }

            .header-wrap {
                padding: 8px 14px 10px;
                align-items: center;
                gap: 10px;
                flex-wrap: wrap;
            }

            .logo img {
                height: 46px;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 6px;
                padding-top: 2px;
            }

            .nav-menu a {
                min-height: 38px;
                padding: 9px 6px;
                border-radius: 12px;
                background: #f8fafc;
                text-align: center;
                font-size: 12px;
            }

            .nav-menu a::after {
                display: none;
            }

            .user-btn {
                padding: 4px;
            }

            .avatar {
                width: 38px;
                height: 38px;
            }

            .name {
                display: none;
            }

            .dropdown-menu {
                position: fixed;
                top: 68px;
                left: 16px;
                right: 16px;
                width: auto;
                border-radius: 18px;
            }

            .modal-content {
                width: calc(100% - 32px);
                padding: 24px 18px;
                border-radius: 18px;
            }

            .modal-actions {
                flex-direction: column;
            }
        }

        /* ============= MODAL LOGOUT KEEN ============= */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            animation: modalFade .3s ease;
        }

        .modal-content {
            background: #fff;
            border-radius: 24px;
            padding: 32px;
            width: 90%;
            max-width: 420px;
            text-align: center;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .15);
            animation: modalSlide .4s cubic-bezier(.34, 1.56, .64, 1);
        }

        .modal-icon {
            font-size: 48px;
            margin-bottom: 16px;
            animation: bounceIn .6s ease;
        }

        .modal-content h3 {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .modal-content p {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .modal-actions button {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all .2s ease;
            border: none;
        }

        .btn-cancel {
            background: #f3f4f6;
            color: #6b7280;
        }

        .btn-cancel:hover {
            background: #e5e7eb;
            transform: translateY(-1px);
        }

        .btn-logout {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: #fff;
            box-shadow: 0 4px 12px rgba(220, 38, 38, .3);
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #b91c1c, #991b1b);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(220, 38, 38, .4);
        }

        @keyframes modalFade {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes modalSlide {
            from {
                opacity: 0;
                transform: scale(.9) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>

    <div class="header-wrap">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/images/logo-sipawa.png') }}" alt="SiPAWA">
        </a>

        {{-- MENU --}}
        <nav class="nav-menu">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('pengaduan.index') }}">Pengaduan</a>
            <a href="{{ route('tentang') }}">Tentang</a>
        </nav>

        {{-- USER --}}
        @auth
            <div class="nav-user">

                <button type="button" class="user-btn" id="userBtn">
                    <span class="avatar">
                        @if (auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </span>
                    <span class="name">{{ auth()->user()->name }}</span>
                </button>

                <div class="dropdown-menu" id="userMenu">
                    <a href="{{ route('pengaduan.index') }}">📄 Pengaduan Saya</a>
                    <a href="{{ route('profile.index') }}">👤 Profil Saya</a>
                    <a href="{{ route('profile.password') }}">🔐 Ganti Password</a>

                    {{-- LOGOUT (SATU-SATUNYA) --}}
                    <form method="POST" action="{{ route('logout') }}" id="logoutForm" class="no-loading">
                        @csrf
                        <button type="button"
                            onclick="confirmLogout(event)"
                            style="
            width:100%;
            padding:12px;
            border:none;
            background:none;
            text-align:left;
            font-weight:600;
            color:#dc2626;
            cursor:pointer;
        ">
                            🚪 Logout
                        </button>
                    </form>

                </div>
            </div>
        @endauth

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('userBtn');
            const menu = document.getElementById('userMenu');

            if (!btn || !menu) return;

            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                menu.classList.toggle('show');
            });

            document.addEventListener('click', (e) => {
                if (!e.target.closest('.nav-user')) {
                    menu.classList.remove('show');
                }
            });
        });
    </script>
</header>

<!-- MODAL LOGOUT KEEN -->
<div id="logoutModal" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-icon">👋</div>
        <h3>Yakin ingin keluar?</h3>
        <p>Anda akan kembali ke halaman login dan perlu login lagi untuk melanjutkan.</p>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeLogoutModal()">Batal</button>
            <button class="btn-logout" onclick="proceedLogout()">Ya, Logout</button>
        </div>
    </div>
</div>

<script>
    function confirmLogout(e) {
        e.preventDefault();
        document.getElementById('logoutModal').style.display = 'flex';
        return false;
    }

    function closeLogoutModal() {
        document.getElementById('logoutModal').style.display = 'none';
    }

    function proceedLogout() {
        closeLogoutModal();
        showLoading();
        const form = document.getElementById('logoutForm');
        if (form) form.submit();
    }

    function showLoading() {
        document.getElementById('pageLoading').classList.add('show');
    }
</script>
