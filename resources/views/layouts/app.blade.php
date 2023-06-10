<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="antialiased">
<div id="app" class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <header id="header" class="p-6 position-fixed">
        <div class="header-dots bg-dots-lighter"></div>
        <div class="logo">
            <a href="https://slava.agency/digital" class="logo-link">
                <img src="{{ asset('images/logo_slava.svg') }}" alt="SLAVA">
            </a>
        </div>
    </header>
    <main class="">
        @yield('content')
    </main>
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
    <!-- ✅ load jQuery ✅ -->
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
    ></script>

    <!-- ✅ load DataTables ✅ -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
</div>
</body>
</html>
