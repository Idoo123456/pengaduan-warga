<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SiPAWA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- BOOTSTRAP CSS (WAJIB, PALING ATAS) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- CSS GLOBAL --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header-fix.css') }}">

    {{-- HOME ONLY --}}
    @if (request()->routeIs('home') || request()->is('/'))
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    @endif

    {{-- PENGADUAN ONLY (PALING AKHIR BIAR MENANG) --}}
    @if (Request::is('pengaduan*'))
        <link rel="stylesheet" href="{{ asset('assets/css/pengaduan.css') }}">
    @endif
</head>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.querySelector('#pengaduanSlider');
        if (slider) {
            new bootstrap.Carousel(slider, {
                interval: 4500,
                ride: 'carousel',
                pause: false,
                wrap: true
            });
        }
    });
</script>

<body class="@yield('body-class')">

    {{-- HEADER --}}
    @include('partials.header')

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
