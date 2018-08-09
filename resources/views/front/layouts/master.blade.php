<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <title>Автотовары</title>

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />--}}

    <link href="{{ asset('smarty/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

    <link href="{{ asset('smarty/css/essentials.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('smarty/css/layout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('smarty/css/plugin-hover-buttons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('smarty/css/header-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('smarty/css/color_scheme/lightgrey.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />


    @yield('styles')
</head>

<body class="smoothscroll enable-animation enable-materialdesign boxed">

<!-- wrapper -->

    @include('front.partials.top-bar')

        <div id="header" class="navbar-toggleable-sm clearfix header-sm">


        <!-- TOP NAV -->
        <header id="topNav">
            <div class="container p-0">
                <!-- Mobile Menu Button -->
                <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                @include('front.partials.top-menu')
            </div>
        </header>
        <!-- /Top Nav -->

        </div>

<div id="wrapper">


    @yield('s-section')


</div>

@include('front.partials.footer')

<!-- /wrapper -->


<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>


<!-- PRELOADER -->
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div><!-- /PRELOADER -->


<!-- JAVASCRIPT FILES -->
<script type="text/javascript" src="{{ asset('smarty/plugins/jquery/jquery-3.2.1.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('smarty/js/scripts.js') }}"></script>

<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

@yield('scripts')

</body>
</html>