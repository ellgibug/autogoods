@extends('front.layouts.master')


@section('s-section')
    <section class="m-0">
        <div class="container">
            <ul class="shop-item-list row list-inline m-0">
            @forelse($products->chunk(4) as $chunk)
                @foreach($chunk as $product)
                    <!-- ITEM -->
                        <li class="col-sm-6 col-md-3 mb-100">
                            <!-- SQUARE CARD -->
                            <div class="demo-card-square mdl-card mdl-shadow--2dp h-300 fw-300 text-center">
                                <!--
                                    fw-50, fw-100, fw-150, fw-200, fw-250, etc
                                    h-50, h-100, h-150, h-200, heitgh-250, etc
                                    -->
                                <div class="mdl-card__title mdl-card--expand h-300"
                                     style="background: url({{ asset('public/images/img.jpg') }}) center no-repeat; background-size: contain;">
                                    <!-- text-white, text-black, text-yellow, etc (see essentials.css)-->

                                </div>
                                <div class="mdl-card__supporting-text">
                                    <a href="{{ route('product.single', $product->id) }}"
                                       class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                </div>
                                <div class="mdl-card__actions mdl-card--border mt-10">
                                    <a href="#"
                                       class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                                        ${{ $product->price }}
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!-- /ITEM -->
                    @endforeach
                @empty
                    <p class="lead text-center" style="margin-top: 20px">Продукты не найдены</p>
                @endforelse
            </ul>
        </div>
    </section>
@endsection