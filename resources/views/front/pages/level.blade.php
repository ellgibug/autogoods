@extends('front.layouts.master')


@section('s-section')

    <section class="parallax parallax-2 section-xlg mb-0 h-150" style="background-image: url('http://images.caricos.com/m/mercedes-benz/2016_mercedes-benz_g-class/images/1600x1200/2016_mercedes-benz_g-class_5_1600x1200.jpg');">
        <div class="overlay dark-4"><!-- dark overlay [1 to 9 opacity] --></div>
        <div class="container text-center">
            <h1 class="fs-60">{{ $level->name }}</h1>
        </div>
    </section>



    <section>
        <div class="container">
            <ul class="shop-item-list row list-inline m-0">
            @forelse($products->chunk(4) as $chunk)
                @foreach($chunk as $product)
                    <!-- ITEM -->
                        <li class="col-sm-6 col-md-3 mb-100">
                            <!-- SQUARE CARD -->
                            <div class="demo-card-square mdl-card mdl-shadow--2dp h-300 fw-300 text-center">
                                <div class="mdl-card__title mdl-card--expand h-300" style="background: url({{ asset('public/images/img.jpg') }}) center no-repeat; background-size: contain;"></div>
                                <div class="mdl-card__supporting-text">
                                    <a href="{{ route('product.single', $product->id) }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                </div>
                                <div class="mdl-card__actions mdl-card--border mt-10">
                                    <a href="#" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
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