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
            .nav-menu {
                display: none;
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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
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
<script>
    function confirmLogout(e) {
        e.preventDefault(); // hentikan submit dulu

        openConfirm(
            'Apakah Anda yakin ingin logout?',
            () => {
                document.getElementById('logoutForm').submit();
            }
        );

        return false;
    }
</script>
<!-- LOADING OVERLAY -->
<div id="pageLoading" class="page-loading">
    <div class="loader"></div>
    <p>Logging out...</p>
</div>

<script>
    function confirmLogout(e) {
        e.preventDefault();

        openConfirm(
            'Apakah Anda yakin ingin logout?',
            () => {
                showLoading();
                document.getElementById('logoutForm').submit();
            }
        );

        return false;
    }

    function showLoading() {
        document.getElementById('pageLoading').classList.add('show');
    }
</script>
