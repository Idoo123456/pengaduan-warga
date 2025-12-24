<header class="header-area">
    <div class="nav-container">

       <a href="{{ url('/') }}" class="logo">
    <img src="{{ asset('assets/images/logo-sipawa.png') }}"
         alt="SiPAWA"
         class="logo-img">
</a>


        <nav class="nav-menu">
            <a href="{{ url('/') }}"
               class="{{ request()->is('/') ? 'active' : '' }}">
               Beranda
            </a>

            <a href="{{ url('/pengaduan') }}"
               class="{{ request()->is('pengaduan*') ? 'active' : '' }}">
               Pengaduan
            </a>

            <a href="{{ url('/tentang') }}"
               class="{{ request()->is('tentang') ? 'active' : '' }}">
               Tentang
            </a>
        </nav>

        <a href="{{ url('/login') }}" class="btn-login">Login</a>

    </div>
</header>
