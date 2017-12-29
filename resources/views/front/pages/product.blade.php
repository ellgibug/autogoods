@extends('front.layouts.master')

@section('s-section')

<section class="m-0 pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
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
                        <img class="img-fluid p-3" src="{{ asset('public/images/product2.jpg') }}" height="100" alt="" />
                    </a>
                    <a class="thumbnail radius-0" href="{{ asset('public/images/product3.jpg') }}">
                        <img class="img-fluid p-3" src="{{ asset('public/images/product3.jpg') }}" height="100" alt="" />
                    </a>
                    <a class="thumbnail radius-0" href="{{ asset('public/images/product1.jpg') }}">
                        <img class="img-fluid p-3" src="{{ asset('public/images/product1.jpg') }}" height="100" alt="" />
                    </a>

                </div>
                <!-- /Thumbnails -->

            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p class="mb-10">Артикул товара: {{ $product->vendor_code }}</p>
                <p class="mb-10">Цена товара: {{ $product->price }} руб.</p>
                <hr>
                <label class="checkbox mb-30">
                    <input type="checkbox" value="1">
                    <i></i> Добавить в сравнение товаров
                </label>
                <div class="row">
                    <div class="col mb-20">
                        <a href="#" class="btn btn-hvr hvr-grow m-0 btn-block">Добавить в список желаний</a>
                    </div>
                    <div class="col m-0">
                        <a href="#" class="btn btn-hvr hvr-grow m-0 btn-block">Добавить в корзину</a>
                    </div>
                </div>

            </div>
        </div>
        <div class=" p-20">

            <ul class="nav nav-tabs nav-bottom-border nav-justified">
                <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Описание товара</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Характеристики товара</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at lacinia sem, id ultrices lectus. Suspendisse mattis leo iaculis, placerat nisl id, congue eros. In sed semper metus. Sed sodales ipsum id nunc rhoncus, vitae elementum velit mattis. Nullam aliquet, risus in hendrerit ultrices, sem tortor pharetra tellus, a posuere nulla turpis vel dolor. Mauris cursus mattis lacinia. Suspendisse potenti. </p>

                    <p class="text-justify">Maecenas sed efficitur nisl, id tempor dui. Nam ornare pharetra lectus. Aliquam accumsan nisi eget elementum varius. Sed viverra magna sit amet ligula euismod, id iaculis sapien venenatis. Nullam quis ipsum sed diam sodales dapibus vitae ut neque. Donec vitae ante purus. In dapibus enim vel neque pharetra, blandit sagittis massa varius. Vestibulum pellentesque rutrum lacus nec faucibus. In non dignissim neque. Donec dignissim quis nulla in malesuada.</p>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <table class="table table-sm">
                        <tbody>
                        @for($i=1; $i<6; $i++)
                            <tr>
                                <th scope="row">Характиристика {{ $i }}</th>
                                <td>Параметр {{ $i }}</td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</section>



@endsection