<section class="m-0 p-0">
    <div class="container mt-20">
        <a class="float-left d-none d-sm-block" href="{{ route('main') }}">
            <h1 class="m-0 letter-spacing-1 bold">АВТОТОВАРЫ</h1>
        </a>
        <a class="float-left d-block d-sm-none" href="{{ route('main') }}">
            <h4 class="bold mt-6">АВТОТОВАРЫ</h4>
        </a>
            @guest
            <ul class="list-inline float-right mt-6">
                <li><a href="{{ route('login') }}"><strong>Логин</strong></a></li>
                <li class="pr-10"><a href="{{ route('register') }}"><strong>Регистрация</strong></a></li>
            </ul>
            @endauth
            @auth
            <ul class="list-inline float-right mt-6">
                <li><a href="{{ route('home') }}"><strong><i class="glyphicon glyphicon-user"></i>{{ Auth::guard('web')->user()->name }}</strong></a></li>
                <li class="pr-10">
                    <strong>
                        <a tabindex="-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="glyphicon glyphicon-off"></i>
                            Выход
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </strong>
                </li>
            </ul>


            @endauth
    </div>
    <div class="clearfix"></div>
    <div class="container mt-20">
        <div class="row">
            <div class="col-md-3 mb-20 p-0 col-xs-4">
                {{--<form action="{{ route('products.search') }}" class="m-0 pt-0 pb-0 pl-10 pr-10">--}}
                <form action="" class="m-0 pt-0 pb-0 pl-10 pr-10">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" placeholder="Поиск" class="form-control required" name="search" value="{{request()->get('search')}}">
                        <span class="input-group-btn">
                            <button class="btn btn-info mdl-js-button mdl-js-ripple-effect p-6" type="submit">Поиск</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-5 col-xs-4 mb-20">
                <a href="#" class="btn btn-hvr hvr-float-shadow m-0" data-toggle="modal" data-target=".bs-example-modal-sm">Мой гараж</a>
                <a href="#" class="btn btn-hvr hvr-float-shadow m-0">Сравнение</a>
                <a href="{{ route('cart') }}" class="btn btn-hvr hvr-float-shadow m-0">Корзина <span class="badge badge-info fs-11">{{ Cart::instance('shopping')->count() }}</span></a>
                {{--<a href="{{ route('cart') }}" class="btn btn-hvr hvr-float-shadow m-0">Корзина</a>--}}
            </div>
            <div class="col-md-4 col-xs-4 mb-20">
                <a href="#" class="btn btn-hvr hvr-float-shadow m-0 btn-block">Оформить заказ</a>
            </div>
        </div>
    </div>
</section>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                @guest
                    <p>
                        Вы - неавторизованный пользователь.<br>
                        Ваш гараж будет открыт после <a href="{{ route('login') }}">авторизации</a>.
                    </p>
                @endauth
                @auth
                    <p>Ваш гараж доступен по <a href="{{ route('home') }}">ссылке</a>.</p>
                @endauth
            </div>
        </div>
    </div>
</div>





