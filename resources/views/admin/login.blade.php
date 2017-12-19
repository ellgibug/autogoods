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
</head>
<!--
    .boxed = boxed version
-->
<body>


<div class="padding-15">

    <div class="login-box">

        <!-- login form -->
        <form action="{{ route('admin.login.submit') }}" method="post" class="sky-form boxed">
            {{ csrf_field() }}
            <header><i class="fa fa-users"></i> ADMIN panel</header>

            <!--
            <div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
                Invalid Email or Password!
            </div>

            <div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
                Account Inactive!
            </div>

            <div class="alert alert-default noborder text-center weight-400 nomargin noradius">
                <strong>Too many failures!</strong> <br />
                Please wait: <span class="inlineCountdown" data-seconds="180"></span>
            </div>
            -->

            <fieldset>

                <section>
                    <label class="label">E-mail</label>
                    <label class="input">
                        <i class="icon-append fa fa-envelope"></i>
                        <input type="email" name="email">
                        <span class="tooltip tooltip-top-right">Email Address</span>
                    </label>
                </section>

                <section>
                    <label class="label">Password</label>
                    <label class="input">
                        <i class="icon-append fa fa-lock"></i>
                        <input type="password" name="password">
                        <b class="tooltip tooltip-top-right">Type your Password</b>
                    </label>
                    {{--<label class="checkbox"><input type="checkbox" name="checkbox-inline" checked><i></i>Keep me logged in</label>--}}
                </section>

            </fieldset>

            <footer>
                <button type="submit" class="btn btn-primary pull-right">Sign In</button>
            </footer>
        </form>
        <!-- /login form -->



    </div>

    @include('errors.errors')

    @if(session()->has('mError'))
        <div style="padding: 30px; background: #ccc;">{{ session()->get('mError') }}  </div>
    @endif

</div>

<!-- JAVASCRIPT FILES -->
{{--<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>--}}
<script type="text/javascript" src="{{ asset('admin/plugins/jquery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/app.js') }}"></script>
</body>
</html>