<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SiPAWA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    @if (request()->is('pengaduan/create'))
        <link rel="stylesheet" href="{{ asset('assets/css/pengaduan-create.css') }}">
    @endif


</head>

<body>

    @include('partials.header')

    <main class="page">
        @yield('content')
    </main>

    @include('partials.footer')

    @if (auth()->check())
        <div class="dropdown">
            <button class="btn-user">
                {{ auth()->user()->name }}
            </button>
            <div class="dropdown-menu">
                <p>{{ auth()->user()->email }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="btn-login">Login</a>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropdown = document.querySelector('.user-dropdown');
            const btn = document.querySelector('.user-btn');

            if (!dropdown || !btn) return;

            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdown.classList.toggle('active');
            });

            document.addEventListener('click', () => {
                dropdown.classList.remove('active');
            });
        });
    </script>

    <script>
        document.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.user-dropdown');
            const button = document.querySelector('.user-btn');

            if (!dropdown) return;

            if (button.contains(e.target)) {
                dropdown.classList.toggle('active');
            } else {
                dropdown.classList.remove('active');
            }
        });
    </script>

</body>

</html>
