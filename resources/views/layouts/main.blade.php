<!DOCTYPE html>
<html lang="id">

<head>
    <style>
        main {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
    </style>

    <meta charset="UTF-8">
    <title>@yield('title', 'SiPAWA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- BOOTSTRAP CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- CSS GLOBAL --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header-fix.css') }}">

    {{-- HOME ONLY --}}
    @if (request()->routeIs('home'))
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    @endif

    {{-- PENGADUAN ONLY --}}
    @if (Request::is('pengaduan*'))
        <link rel="stylesheet" href="{{ asset('assets/css/pengaduan.css') }}">
    @endif

    @stack('css')
</head>

<body class="@yield('body-class')">

    {{-- HEADER --}}
    @include('partials.header')

    {{-- FLASH MESSAGE (SATU-SATUNYA TEMPAT) --}}
    @include('partials.flash')

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER OPTIONAL --}}
    @includeWhen(View::exists('partials.footer'), 'partials.footer')

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- FLASH MESSAGE SCRIPT --}}
    <script>
        function closeFlash() {
            const el = document.getElementById('flashMessage');
            if (el) {
                el.classList.add('flash-hide');
                setTimeout(() => el.remove(), 700);
            }
        }

        // ⏱️ ATUR DURASI DI SINI
        // 8000 = 8 DETIK (LEBIH NYAMAN)
        setTimeout(() => {
            closeFlash();
        }, 5000);
    </script>
    <script>
        document.querySelectorAll('a[href]').forEach(link => {
            if (link.hostname === window.location.hostname) {
                link.addEventListener('click', function(e) {
                    const target = this.getAttribute('href');
                    if (target.startsWith('#')) return;

                    e.preventDefault();
                    document.body.style.opacity = 0;
                    document.body.style.transition = 'opacity 0.3s ease';

                    setTimeout(() => {
                        window.location.href = target;
                    }, 300);
                });
            }
        });
    </script>
    @stack('js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.body.classList.add("page-transition");
            requestAnimationFrame(() => {
                document.body.classList.add("show");
            });
        });
    </script>

</body>

</html>
