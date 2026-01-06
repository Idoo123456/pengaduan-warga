<header class="site-header">
    <div class="container header-wrap">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/images/logo-sipawa.png') }}" alt="SiPAWA">
            <span></span>
        </a>

        {{-- MENU --}}
        <nav class="nav-menu">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('pengaduan.index') }}">Pengaduan</a>
            <a href="{{ route('tentang') }}">Tentang</a>
            <a href="{{ route('kontak') }}">Kontak</a>
        </nav>

        {{-- USER --}}
        <div class="nav-user">
            @auth
                <div class="user-dropdown">
                    <button class="user-btn">
                        <span class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        <span class="name">{{ auth()->user()->name }}</span>

                    </button>

                    <div class="dropdown-menu">
                        <a href="{{ route('pengaduan.index') }}">Pengaduan Saya</a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-login">Login</a>
            @endauth
        </div>

    </div>
</header>
