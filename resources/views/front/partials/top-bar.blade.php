<div id="topBar">
    <div class="container">

        <!-- right -->
        <ul class="top-links list-inline float-right">
            @guest
                <li><a href="{{ route('login') }}"><strong>Логин</strong></a></li>
                <li class="pr-10"><a href="{{ route('register') }}"><strong>Регистрация</strong></a></li>
            @endauth
            @auth
                <li class="pr-10">
                    <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><i
                                class="fa fa-user hidden-xs-down"></i> {{ Auth::guard('web')->user()->name }}</a>
                    <ul class="dropdown-menu float-right">
                        <li><a tabindex="-1" href="{{ route('home') }}"><i class="fa fa-cog"></i> Профиль</a></li>
                        <li class="divider"></li>
                        <li>
                            <a tabindex="-1" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="glyphicon glyphicon-off"></i> Выход</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
</div>