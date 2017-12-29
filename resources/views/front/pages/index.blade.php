@extends('front.layouts.master')

@section('styles')
    <link href="{{ asset('smarty/plugins/slider.layerslider/css/layerslider.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('s-section')
<section class="alternate-2">
    <div class="container">
        <div class="row">
            <div class="col-md-9 slider">
                <div class="layerslider ls-borderlesslight3d ls-container ls-responsive ls-device-is-desktop" style="height:500px;">
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
                <a href="#" class="btn btn-3d btn-xlg btn-info btn-block">
                    О нас
                </a>
                <a href="#" class="btn btn-3d btn-xlg btn-info btn-block">
                    Защита покупателей
                </a>
                <a href="#" class="btn btn-3d btn-xlg btn-info btn-block">
                    Оплата и доставка
                </a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <ul class="nav nav-tabs nav-button-tabs nav-justified">
            <li class="nav-item"><a class="pr-5 pl-5 nav-link active" href="#tab1" data-toggle="tab">Популярные товары</a></li>
            <li class="nav-item"><a class="pr-5 pl-5 nav-link" href="#tab2" data-toggle="tab">Сезонные товары</a></li>
            <li class="nav-item"><a class="pr-5 pl-5 nav-link" href="#tab3" data-toggle="tab">Недавно купили</a></li>

        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="row">
                    @for($i=0; $i<4; $i++)
                    <div class="col-md-3">
                        <div class="demo-card-square mdl-card mdl-shadow--2dp h-300 fw-300 text-center">
                            <div class="mdl-card__title mdl-card--expand h-300" style="background: url('{{ asset('public/images/index1.jpg') }}') center no-repeat; background-size: contain;"></div>
                            <div class="mdl-card__supporting-text">
                                <a href="#" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                                    <h4>Популярный товар</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            <div class="tab-pane fade" id="tab2">
                <div class="row">
                    @for($i=0; $i<4; $i++)
                        <div class="col-md-3">
                            <div class="demo-card-square mdl-card mdl-shadow--2dp h-300 fw-300 text-center">
                                <div class="mdl-card__title mdl-card--expand h-300" style="background: url('{{ asset('public/images/index2.jpg') }}') center no-repeat; background-size: contain;"></div>
                                <div class="mdl-card__supporting-text">
                                    <a href="#" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                                        <h4>Сезонный товар</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="tab-pane fade" id="tab3">
                <div class="row">
                    @for($i=0; $i<4; $i++)
                        <div class="col-md-3">
                            <div class="demo-card-square mdl-card mdl-shadow--2dp h-300 fw-300 text-center">
                                <div class="mdl-card__title mdl-card--expand h-300" style="background: url('{{ asset('public/images/index3.jpg') }}') center no-repeat; background-size: contain;"></div>
                                <div class="mdl-card__supporting-text">
                                    <a href="#" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                                        <h4>Особый товар</h4>
                                    </a>
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
