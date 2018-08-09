@extends('front.layouts.master')

@section('s-section')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="thumbnail mb-8 radius-0">
                    <!--
                        IMAGE ZOOM

                        data-mode="mouseover|grab|click|toggle"
                    -->
                    <figure id="zoom-primary" class="zoom" data-mode="mouseover">
                        <!--
                            zoom buttton

                            positions available:
                                .bottom-right
                                .bottom-left
                                .top-right
                                .top-left
                        -->
                        <a class="lightbox bottom-right" href="{{ asset('public/images/product1.jpg') }}" data-plugin-options='{"type":"image"}'>
                            <i class="fa fa-search"></i>
                        </a>

                        <!--
                            image

                            Extra: add .image-bw class to force black and white!
                        -->
                        <img class="img-fluid" src="{{ asset('public/images/product1.jpg') }}" width="568" alt="" />
                    </figure>

                </div>

                <!--
                    Thumbnails (required height:100px)

                    data-for = figure image id match

                    NOTE: 	loop wil cause an issue to zoom plugin!
                            DO NOT use loop!
                -->
                <div data-for="zoom-primary" class="owl-carousel-2 zoom-more" data-plugin-options='{
	"responsiveBaseElement":	"#wrapper",
	"loop":						false,
	"margin":					8,

	"nav":						true,
	"dots":						false,

	"center":					false,
	"slideBy":					"1",
	"autoplay":					false,
	"autoplayTimeout":			4500,
	"autoWidth":				false,
	"merge":					true,
	"rtl":						false,

	"animateIn":				"",
	"animateOut":				"",

	"responsive": {
		"0":	{"items":3},
		"960":	{"items":5}
	}

}'>

                    <a class="thumbnail radius-0" href="{{ asset('public/images/product2.jpg') }}">
                        <img class="img-fluid p-0" src="{{ asset('public/images/product2.jpg') }}" height="100" alt="" />
                    </a>
                    <a class="thumbnail radius-0" href="{{ asset('public/images/product3.jpg') }}">
                        <img class="img-fluid p-0" src="{{ asset('public/images/product3.jpg') }}" height="100" alt="" />
                    </a>
                    <a class="thumbnail radius-0" href="{{ asset('public/images/product1.jpg') }}">
                        <img class="img-fluid p-0" src="{{ asset('public/images/product1.jpg') }}" height="100" alt="" />
                    </a>

                </div>
                <!-- /Thumbnails -->

                <div class="all-brand-products">
                    <img src="https://im0-tub-ru.yandex.net/i?id=7a07f659f65a26510ca73bc9468a8308-l&n=13" alt="">
                    <a href="#">Все товары бренда</a>
                </div>

            </div>
            <div class="col-lg-6">
                <h1 class="product-title">{{ $product->name }}</h1>
                <p class="mb-10">Артикул: {{ $product->vendor_code }}</p>

                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Описание</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Характеристики</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at lacinia sem, id ultrices lectus. Suspendisse mattis leo iaculis, placerat nisl id, congue eros. In sed semper metus. Sed sodales ipsum id nunc rhoncus, vitae elementum velit mattis. Nullam aliquet, risus in hendrerit ultrices, sem tortor pharetra tellus, a posuere nulla turpis vel dolor. Mauris cursus mattis lacinia. Suspendisse potenti. </p>

                        <p class="mb-0">Maecenas sed efficitur nisl, id tempor dui. Nam ornare pharetra lectus. Aliquam accumsan nisi eget elementum varius. Sed viverra magna sit amet ligula euismod, id iaculis sapien venenatis. Nullam quis ipsum sed diam sodales dapibus vitae ut neque. Donec vitae ante purus. In dapibus enim vel neque pharetra, blandit sagittis massa varius. Vestibulum pellentesque rutrum lacus nec faucibus. In non dignissim neque. Donec dignissim quis nulla in malesuada.</p>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at lacinia sem, id ultrices lectus. Suspendisse mattis leo iaculis, placerat nisl id, congue eros. In sed semper metus. Sed sodales ipsum id nunc rhoncus, vitae elementum velit mattis. Nullam aliquet, risus in hendrerit ultrices, sem tortor pharetra tellus, a posuere nulla turpis vel dolor. Mauris cursus mattis lacinia. Suspendisse potenti. </p>

                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="product-buttons">
                    <p>{{ $product->price }} &#8381;</p>
                    <div class="row no-gutters">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="input-group plus-minus mb-20">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button">-</button>
                                    </span>
                                <input type="text" name="qty" min="1"
                                       max="{{ $product->qty }}" class="form-control">
                                <span class="input-group-btn">
                                        <button class="btn" type="button">+</button>
                                    </span>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    {{--<div class="input-group mb-20">--}}
                        {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-count" type="button">-</button>--}}
                        {{--</span>--}}
                        {{--<input type="text" class="form-control product-count" name="">--}}
                        {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-count" type="button">+</button>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                    <a href="{{ route('add-product-to-cart', $product->id) }}" class="btn btn-success btn-block uppercase fw-600 mb-20"><i class="fa fa-shopping-cart" aria-hidden="true"></i> В корзину</a>
                    <button type="button" class="btn btn-secondary btn-block mb-20"><i class="fa fa-list" aria-hidden="true"></i> К сравнению</button>
                    <button type="button" class="btn btn-secondary btn-block"><i class="fa fa-star" aria-hidden="true"></i> Отложить впрок!</button>
                </div>
            </div>
        </div>
        <div class="mt-30">
            <h2 class="buy-with">С этим товаром также покупают</h2>
            <div class="row no-gutters">
                @for($i=0; $i<6; $i++)
                    <div class="col-md-2">
                        <div class="my-shop-item">
                            <img src="{{ asset('public/images/index2.jpg') }}" alt="" class="img-responsive img-fluid">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="my-shop-item-bottom">
                                <span>1 000 &#8381;</span>
                                <div class="float-right">
                                    <button class="btn p-10 btn-search" type="button"><i class="fa fa-star pl-3 pr-3" aria-hidden="true"></i></button>
                                    <button class="btn p-10 btn-search" type="button"><i class="fa fa-shopping-cart pl-3 pr-3" aria-hidden="true"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>



    </div>
</section>



@endsection