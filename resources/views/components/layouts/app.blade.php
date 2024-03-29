<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href={{ asset('assets/store/css/open-iconic-bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/store/css/animate.css') }}>

    <link rel="stylesheet" href={{ asset('assets/store/css/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/store/css/owl.theme.default.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/store/css/magnific-popup.css') }}>

    <link rel="stylesheet" href={{ asset('assets/store/css/aos.css') }}>

    <link rel="stylesheet" href={{ asset('assets/store/css/ionicons.min.css') }}>

    <link rel="stylesheet" href={{ asset('assets/store/css/bootstrap-datepicker.css') }}>
    <link rel="stylesheet" href={{ asset('assets/store/css/jquery.timepicker.css') }}>


    <link rel="stylesheet" href={{ asset('assets/store/css/flaticon.css') }}>
    <link rel="stylesheet" href={{ asset('assets/store/css/icomoon.css') }}>
    <link rel="stylesheet" href={{ asset('assets/store/css/style.css') }}>
</head>

<body>
    <div id="app">
        <x-store.header />

        <main class="pb-4">
            {{ $slot }}
        </main>
        <x-store.footer />
    </div>
    <script src={{ asset('assets/store/js/jquery.min.js') }}></script>
    <script src={{ asset('assets/store/js/jquery-migrate-3.0.1.min.js') }}></script>
    <script src={{ asset('assets/store/js/popper.min.js') }}></script>
    <script src={{ asset('assets/store/js/bootstrap.min.js') }}></script>
    <script src={{ asset('assets/store/js/jquery.easing.1.3.js') }}></script>
    <script src={{ asset('assets/store/js/jquery.waypoints.min.js') }}></script>
    <script src={{ asset('assets/store/js/jquery.stellar.min.js') }}></script>
    <script src={{ asset('assets/store/js/owl.carousel.min.js') }}></script>
    <script src={{ asset('assets/store/js/cart.js') }}></script>
    <script src={{ asset('assets/store/js/jquery.magnific-popup.min.js') }}></script>
    <script src={{ asset('assets/store/js/aos.js') }}></script>
    <script src={{ asset('assets/store/js/jquery.animateNumber.min.js') }}></script>
    <script src={{ asset('assets/store/js/bootstrap-datepicker.js') }}></script>
    <script src={{ asset('assets/store/js/jquery.timepicker.min.js') }}></script>
    <script src={{ asset('assets/store/js/scrollax.min.js') }}></script>
    <script src={{ asset('assets/store/js/main.js') }}></script>

</body>

</html>
