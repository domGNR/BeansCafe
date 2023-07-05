<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/dashboard/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>BeansCafe Admin Dashboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/dashboard/css/animate.min.css') }}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('assets/dashboard/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/dashboard/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href={{ asset('assets/store/css/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/store/css/owl.theme.default.min.css') }}>

    <style>
        tr.clickable-row:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <x-dashboard.sidebar />
        <div class="main-panel">
            <x-dashboard.navbar />
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{ $slot }}
            </div>
            <x-dashboard.footer />
        </div>
    </div>


</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets/dashboard/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/dashboard/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src={{ asset('assets/store/js/owl.carousel.min.js') }}></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/dashboard/js/bootstrap-notify.js') }}"></script>


<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('assets/dashboard/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>



<script type="text/javascript">
    $(document).ready(function() {
        // $.notify({
        //     icon: 'pe-7s-gift',
        //     message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

        // }, {
        //     type: 'info',
        //     timer: 4000
        // });
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>

</html>
