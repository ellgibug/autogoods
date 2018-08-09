@extends('front.layouts.master')


@section('s-section')

    <section>
        <div class="container">
            <h1 class="level3-title">{{ $level->name }}</h1>

            <div class="row no-gutters mb-20">
                <div class="col-lg-auto">
                    <p class="pt-6 m-0">Сортировать: по популярности по цене</p>
                </div>
                <div class="col-lg-auto ml-auto mr-10">
                    <span class="pr-6">Показывать:</span>
                    <select>
                        <option value="">20</option>
                        <option value="">60</option>
                        <option value="">90</option>
                    </select>
                </div>
                <div class="col-lg-auto">
                    {{ $products->links() }}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">

                    <div class="toggle product-option">

                        <div class="toggle active b-bottom">
                            <label>Бренды</label>
                            <div class="toggle-content">
                                <div class="brand-container">
                                    @for($i=1; $i<12; $i++)
                                        <label class="checkbox mt-3 mb-0">
                                            <input type="checkbox" value="1">
                                            <i></i> Бренд {{ $i }}
                                        </label>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="toggle active b-bottom">
                            <label>Состав масла</label>
                            <div class="toggle-content">
                                @for($i=1; $i<5; $i++)
                                <label class="checkbox mt-3 mb-0">
                                    <input type="checkbox" value="1">
                                    <i></i> Состав {{ $i }}
                                </label>
                                @endfor
                            </div>
                        </div>

                        <div class="toggle active b-bottom">
                            <label>Объем, л</label>
                            <div class="toggle-content">
                                <div class="row no-gutters">
                                    <div class="col pr-3">
                                        <input type="text" class="form-control input-small" placeholder="от">
                                    </div>
                                    <div class="col pl-3">
                                        <input type="text" class="form-control input-small" placeholder="до">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="toggle active b-bottom">
                            <label>Цена, &#8381;</label>
                            <div class="toggle-content">
                                <div class="row no-gutters">
                                    <div class="col pr-3">
                                        <input type="text" class="form-control input-small" placeholder="от">
                                    </div>
                                    <div class="col pl-3">
                                        <input type="text" class="form-control input-small" placeholder="до">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="toggle active b-bottom">
                            <label>Рекомендуем</label>
                            <div class="toggle-content">
                                <label class="checkbox mt-3 mb-0">
                                    <input type="checkbox" value="1" checked>
                                    <i></i> Хит продаж
                                </label>
                                <label class="checkbox mt-3 mb-0">
                                    <input type="checkbox" value="1">
                                    <i></i> Товары со скидкой
                                </label>
                                <label class="checkbox mt-3 mb-0">
                                    <input type="checkbox" value="1" checked>
                                    <i></i> Новинка
                                </label>
                                <label class="checkbox mt-3 mb-0">
                                    <input type="checkbox" value="1">
                                    <i></i> Подарок к покупке
                                </label>
                            </div>
                        </div>

                    </div>

                    <button type="button" class="btn-sm btn btn-default btn-block mt-20"><i class="fa fa-times" aria-hidden="true"></i> Очистить фильтр</button>

                </div>
                <div class="col-lg-10">
                    <div class="row no-gutters">
                @forelse($products->chunk(4) as $chunk)
                    @foreach($chunk as $product)
                            <div class="col-lg-5th">
                            <div class="my-shop-item">
                                <div class="float-right">
                                    <label class="checkbox m-0">
                                        <input type="checkbox" value="1">
                                        <i></i> Сравнить
                                    </label>
                                </div>
                                <div class="clearfix"></div>
                                <a href="{{ route('product.single', $product->id) }}">
                                <img src="{{ asset('public/images/img.jpg') }}" alt="" class="img-responsive img-fluid">
                                </a>
                                <p class="list-product-title">{{ $product->name }}</p>
                                <div class="my-shop-item-bottom">
                                    <span class="float-left">{{ $product->price }} &#8381;</span>
                                    <div class="float-right">

                                        <button class="btn p-10 btn-search" type="button"><i class="fa fa-star pl-3 pr-3" aria-hidden="true"></i></button>
                                        <a href="{{ route('add-product-to-cart', $product->id) }}" class="btn p-10 btn-search"><i class="fa fa-shopping-cart pl-3 pr-3" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            </div>
                        @endforeach
                    @empty
                        <p class="lead text-center" style="margin-top: 20px">Продукты не найдены</p>
                    @endforelse
                </div>
                </div>
            </div>

            <div class="row no-gutters mt-20">
                <div class="col-lg-auto ml-auto">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </section>

@endsection