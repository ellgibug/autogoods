@extends('front.layouts.master')


@section('s-section')
    <section class="m-0">
        <div class="container">
            <ul class="shop-item-list row list-inline m-0">
            @forelse($products->chunk(4) as $chunk)
                @foreach($chunk as $product)
                    <!-- ITEM -->
                        <li class="col-sm-6 col-md-3 mb-100 mt-0">
                            <!-- SQUARE CARD -->
                            <div class="demo-card-square mdl-card mdl-shadow--2dp text-center">
                                <a href="{{ route('product.single', $product->id) }}">
                                    <div class="mdl-card__title mdl-card--expand h-250"
                                         style="background: url({{ asset('public/images/img.jpg') }}) center no-repeat; background-size: contain;">
                                    </div>
                                </a>
                                <div class="mdl-card__supporting-text mt-10">
                                    <a href="{{ route('product.single', $product->id) }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                                        <h5 class="m-0">{{ $product->name }}</h5>
                                    </a>
                                </div>
                                <div class="mt-10">
                                    <label class="checkbox">
                                        <input type="checkbox" value="1">
                                        <i></i> Сравнить
                                    </label>
                                    <a href="#" class="btn btn-hvr hvr-grow btn-block m-0">В корзину {{ $product->price }} руб.</a>
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