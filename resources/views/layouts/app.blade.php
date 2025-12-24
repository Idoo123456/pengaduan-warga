<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SiPAWA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
<body>

@include('partials.header')

<main style="padding-top:100px;">
    @yield('content')
</main>

@include('partials.footer')

</body>

</html>
