<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Smarty Admin</title>
    <meta name="description" content="" />
    <meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <!-- WEB FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="{{ asset('smarty_admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="{{ asset('smarty_admin/css/essentials.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('smarty_admin/css/layout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('smarty_admin/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />

    @yield('styles')

</head>
<!--
    .boxed = boxed version
-->
<body>


<!-- WRAPPER -->
<div id="wrapper" class="clearfix">

    @include('admin.partials.aside')
    @include('admin.partials.header')
    <!--
        MIDDLE
    -->
    <section id="middle">
        <div id="content" class="dashboard padding-20">
            @yield('content')
        </div>
    </section>
    <!-- /MIDDLE -->

</div>




<!-- JAVASCRIPT FILES -->
{{--<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>--}}
<script type="text/javascript" src="{{ asset('smarty_admin/plugins/jquery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('smarty_admin/js/app.js') }}"></script>

@yield('scripts')

</body>
</html>