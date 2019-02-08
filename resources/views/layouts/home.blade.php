<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="kelompok 4">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/assets/images/favicon.png') }}">
    
    @yield('meta')
    
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ url('/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @yield('style')
</head>

<!--  -->

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">
        @include('sidebar.header')

        @include('sidebar.menu')

        <div class="page-wrapper">
            @yield('content')
            <footer class="footer">
                © 2018 - Kelompok 4 MATDIS 
            </footer>

        </div>

    </div>

    <script src="{{ url('/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('/assets/plugins/bootstrap/js/tether.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ url('/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ url('/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('/js/custom.min.js') }}"></script>
    @yield('script')
</body>
</html>

