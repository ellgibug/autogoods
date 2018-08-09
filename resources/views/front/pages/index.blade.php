@extends('front.layouts.master')

@section('styles')
    <link href="{{ asset('smarty/plugins/slider.layerslider/css/layerslider.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('s-section')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 slider">
                {{--<div class="layerslider ls-borderlesslight3d ls-container ls-responsive ls-device-is-desktop" style="height:400px;">--}}
                <div class="layerslider ls-container ls-responsive ls-device-is-desktop" style="height:350px;">
                    <div class="ls-slide" data-ls="slidedelay:4500;transition2d:all;transition3d:68,69,77,78;">
                        <img src="{{ asset('public/images/slider1.jpg') }}" class="ls-bg" alt="Slide background"/>
                    </div>
                    <div class="ls-slide" data-ls="slidedelay:4500;transition2d:all;transition3d:36;timeshift:-1000;">
                        <img src="{{ asset('public/images/slider2.jpg') }}" class="ls-bg" alt="Slide background"/>
                    </div>
                    <div class="ls-slide" data-ls="slidedelay:4500;transition2d:all;transition3d:68,69,77,78;">
                        <img src="{{ asset('public/images/slider3.jpg') }}" class="ls-bg" alt="Slide background"/>
                    </div>
                    <div class="ls-slide" data-ls="slidedelay:4500;transition2d:all;transition3d:36;timeshift:-1000;">
                        <img src="{{ asset('public/images/slider4.jpg') }}" class="ls-bg" alt="Slide background"/>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="three-main-links mb-15">
                    <img src="{{ asset('public/images/test-icon.png') }}" alt="">
                    <p class="three-main-links-header">О нас</p>
                    <ul>
                        <li><span>45 000 наименований автотоваров</span></li>
                        <li><span>Прямые поставки от производителя</span></li>
                    </ul>
                </div>
                <div class="three-main-links mb-15">
                    <img src="{{ asset('public/images/test-icon.png') }}" alt="">
                    <p class="three-main-links-header" style="color: red">Защита покупателей</p>
                    <ul>
                        <li><span>Заводская гарантия</span></li>
                        <li><span>Обмен и возврат в течение 60 дней</span></li>
                    </ul>
                </div>
                <div class="three-main-links">
                    <img src="{{ asset('public/images/test-icon.png') }}" alt="">
                    <p class="three-main-links-header">Оплата и доставка</p>
                    <ul>
                        <li><span>Оплата банковскими картами</span></li>
                        <li><span>Доставка курьером</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item"><a class="pr-5 pl-5 nav-link active" href="#tab1" data-toggle="tab">Хиты продаж</a></li>
            <li class="nav-item"><a class="pr-5 pl-5 nav-link" href="#tab2" data-toggle="tab">Успейте купить</a></li>
            <li class="nav-item"><a class="pr-5 pl-5 nav-link" href="#tab3" data-toggle="tab">Сезонные товары</a></li>
            <li class="nav-item"><a class="pr-5 pl-5 nav-link" href="#tab4" data-toggle="tab">Сюрприз</a></li>
        </ul>

        <div class="tab-content pt-25">
            <div class="tab-pane active" id="tab1">
                <div class="row no-gutters">
                    @for($i=0; $i<6; $i++)
                    <div class="col-md-2">
                        <div class="my-shop-item">
                            <img src="{{ asset('public/images/index1.jpg') }}" alt="" class="img-responsive img-fluid">
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
            <div class="tab-pane fade" id="tab2">
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
            <div class="tab-pane fade" id="tab3">
                <div class="row no-gutters">
                    @for($i=0; $i<6; $i++)
                        <div class="col-md-2">
                            <div class="my-shop-item">
                                <img src="{{ asset('public/images/index3.jpg') }}" alt="" class="img-responsive img-fluid">
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
            <div class="tab-pane fade" id="tab4">
                <div class="row no-gutters">
                    @for($i=0; $i<6; $i++)
                        <div class="col-md-2">
                            <div class="my-shop-item">
                                <img src="{{ asset('public/images/index1.jpg') }}" alt="" class="img-responsive img-fluid">
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
    </div>
</section>
@endsection

@section('scripts')
    <script type="text/javascript">
        var layer_options = {

            type: 				'responsive',
            hoverPrevNext: 		true,

            skin: 				'/borderlesslight3d',
            skinsPath: 			'{{ asset('public/smarty/plugins/slider.layerslider/skins') }}'
        }
    </script>

    <!-- LAYER SLIDER -->
    <script type="text/javascript" src="{{ asset('smarty/plugins/slider.layerslider/js/layerslider_pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('smarty/js/view/demo.layerslider_slider.js') }}"></script>
@endsection
