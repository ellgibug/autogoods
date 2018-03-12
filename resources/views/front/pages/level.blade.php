@extends('front.layouts.master')


@section('s-section')

    <section class="section-xs alternate-2 m-0 pt-40 pb-0">
        <div class="container text-center">
            <h1>{{ $level->name }}</h1>
        </div>
    </section>



    <section class="m-0 pt-20 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-2 pt-20">

                    @if(count($level->levels))
                        <h4>Вы выбрали</h4>
                        <ul class="list-unstyled">
                            @foreach($level->levels as $level2)
                                <li>
                                    <a href="{{ route('products.list', $level2->id) }}" class="bold">{{ $level2->name }}</a>
                                    @if(count($level2->levels))
                                        <ul class="list-unstyled ml-10">
                                            @foreach($level2->levels as $level3)
                                                <li>
                                                    <a href="{{ route('products.list', $level3->id) }}">{{ $level3->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
                <div class="col-md-10">
                    {{ $products->links() }}
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
                                            <a href="{{ route('add-product-to-cart', $product->id) }}" class="btn btn-hvr hvr-grow btn-block m-0">В корзину {{ $product->price }} руб.</a>
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

            </div>

        </div>

    </section>



@endsection