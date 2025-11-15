<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
    <!-- loader-->
    <link href="{{ asset('assetsbackend/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assetsbackend/js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assetsbackend/images/favicon.ico"') }} type="image/x-icon">
    <!-- Vector CSS -->
    <link href="{{ asset('assetsbackend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="{{ asset('assetsbackend/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assetsbackend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('assetsbackend/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('assetsbackend/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('assetsbackend/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('assetsbackend/css/app-style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        html,
        body {
            height: 100%;
        }

        #wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
        }
    </style>
</head>

<body class="bg-theme bg-theme1">
    <div id="wrapper">
        @include('layout.backend.sidebar')

        @include('layout.backend.navbar')

        <div class="content-wrapper">

            @yield('content')


        </div><!--End content-wrapper-->
        @include('layout.backend.color')
        @include('layout.backend.footer')
    </div><!--End wrapper-->


    @include('layout.backend.js')
</body>



</html>
