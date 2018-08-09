<section class="m-0 p-0 b-0 bg-white">

    <div class="green-main">
        <div class="container">
            <div class="float-left">
                <i class="fa fa-phone" aria-hidden="true"></i> <span>+7 (499) <strong>788-73-70</strong></span>
            </div>
            <div class="float-right">
                <i class="fa fa-truck fs-12" aria-hidden="true"></i>
                <a href="#" class="fs-12">Узнать статус заказа</a>
                <a href="#" class="link-to-sign fs-12">Вход/Регистрация</a>
            </div>
        </div>
    </div>

    <div class="container mt-40 p-0">
        <div class="row pb-30">
            <div class="col-lg-3">
                <a class="float-left d-none d-sm-block" href="{{ route('main') }}">
                    <h1 class="m-0 bold">АВТОТОВАРЫ</h1>
                </a>
                <a class="float-left d-block d-sm-none" href="{{ route('main') }}">
                    <h4 class="bold mt-6">АВТОТОВАРЫ</h4>
                </a>
            </div>
            <div class="col-lg-5">
                <form action="" class="mt-10 mb-0">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" placeholder="Название, артикул или бренд" class="form-control required" name="search" value="{{request()->get('search')}}">
                        <span class="input-group-btn">
                            <button class="btn p-10 btn-search" type="submit"><i class="fa fa-search pl-6 pr-6 fs-16" aria-hidden="true"></i></button>
                        </span>
                    </div>
                    <small>Например, <a href="#" class="classic-link">аккумулятор для Opel Astra</a>, <a href="#" class="classic-link">масла полусинтетические</a></small>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="four-main-links-container">
                    <div class="four-main-links ml-0">
                        <img src="{{ asset('public/images/test-icon.png') }}" alt="">
                        <p>Гараж</p>
                    </div>
                    <div class="four-main-links">
                        <img src="{{ asset('public/images/test-icon.png') }}" alt="">
                        <p>Сравнение</p>
                    </div>
                    <div class="four-main-links">
                        <img src="{{ asset('public/images/test-icon.png') }}" alt="">
                        <p> Впрок!</p>
                    </div>
                    <div class="four-main-links mr-0">
                        <a href="{{ route('cart') }}">
                            <img src="{{ asset('public/images/test-icon.png') }}" alt="">
                            <p>Корзина</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--@guest--}}
{{--<ul class="list-inline float-right mt-6">--}}
    {{--<li><a href="{{ route('login') }}"><strong>Логин</strong></a></li>--}}
    {{--<li class="pr-10"><a href="{{ route('register') }}"><strong>Регистрация</strong></a></li>--}}
{{--</ul>--}}
{{--@endauth--}}
{{--@auth--}}
{{--<ul class="list-inline float-right mt-6">--}}
    {{--<li><a href="{{ route('home') }}"><strong><i class="glyphicon glyphicon-user"></i>{{ Auth::guard('web')->user()->name }}</strong></a></li>--}}
    {{--<li class="pr-10">--}}
        {{--<strong>--}}
            {{--<a tabindex="-1" href="{{ route('logout') }}"--}}
               {{--onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                {{--<i class="glyphicon glyphicon-off"></i>--}}
                {{--Выход--}}
            {{--</a>--}}
            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                {{--{{ csrf_field() }}--}}
            {{--</form>--}}
        {{--</strong>--}}
    {{--</li>--}}
{{--</ul>--}}
{{--@endauth--}}









