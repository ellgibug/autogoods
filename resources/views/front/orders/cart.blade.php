@extends('front.layouts.master')

@section('s-section')

<section class="m-0 pt-20 pb-20">
    <div class="container">
        <h1 class="cart-title">Моя корзина</h1>
        @if(Cart::count())
            <div class="row">
                <div class="col-md-9">
                    @foreach($cartItems as  $k => $cartItem)
                    <div class="row mb-20 cart-item">
                        <div class="col-md-2">
                            <img src="{{ asset('public/images/img.jpg') }}" alt="{{ $cartItem->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-5">
                            <p class="product-name-in-cart">{{ $cartItem->model->name }}</p>
                            <p class="product-vendor-in-cart">Артикул: {{ $cartItem->model->vendor_code }}</p>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('update-cart', $cartItem->rowId) }}" method="post" class="mb-10" id="update_product_qty_form{{ $cartItem->rowId }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" value="{{ $cartItem->rowId }}" name="product_id">

                                <div class="input-group plus-minus mb-10">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button">-</button>
                                    </span>
                                    <input type="text" value="{{ $cartItem->qty }}" name="qty" min="1"
                                           max="{{ $cartItem->model->qty }}" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button">+</button>
                                    </span>
                                </div>
                            </form>
                            <button type="button" class="btn btn-sm btn-secondary btn-block"><i class="fa fa-star" aria-hidden="true"></i> Впрок!</button>
                        </div>
                        <div class="col-md-2">
                            <p class="price-in-cart"><span id="product_total_price{{ $cartItem->rowId }}">{{ $cartItem->price * $cartItem->qty }}</span>  &#8381;</p>
                        </div>
                        <div class="col-md-1">
                            <p class="m-0 p-0 fs-18 pointer" id="delete_item_from_cart_span{{ $cartItem->rowId }}"><i class="fa fa-times" aria-hidden="true"></i></p>
                            <form action="{{ route('destroy-cart', $cartItem->rowId) }}" method="post" class="d-none" id="delete_item_from_cart_form{{ $cartItem->rowId }}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <div class="right-order-info">
                        <p class="right-order-info-header">Мой заказ</p>
                        <p><span class="float-left">Товаров на сумму: </span><span class="float-right"><span id="total_order_price_before">{{ Cart::subtotal() }}</span> &#8381;</span></p>
                        <br>
                        <p><span class="float-left">Скидка: </span><span class="float-right blue">- 100 &#8381;</span></p>
                        <br>
                        <p><span class="float-left">Промо код: </span><span class="float-right blue">-50 &#8381;</span></p>
                        <br>
                        <hr>
                        <p class="mb-30"><span class="float-left">Итого к оплате: </span><span class="float-right"><span id="total_order_price_after">{{ Cart::subtotal() }}</span> &#8381;</span></p>
                        <br>
                        <div class="row mb-20">
                            <div class="col">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить</button>
                            </div>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn order-btn">Оформить</a>
                    </div>
                </div>
            </div>
        @else
        <h2 class="cart-title">Ваша корзина пуста</h2>
        @endif
        <h2 class="cart-title">Товары, отложенные впрок</h2>
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
</section>



@endsection

@section('scripts')


<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        @foreach($cartItems as $k => $v)

            $('#delete_item_from_cart_span{{ $v->rowId }}').click(function () {
                $('#delete_item_from_cart_form{{ $v->rowId }}').submit();
            });

            var form_{{ $v->rowId }} = $('#update_product_qty_form{{ $v->rowId }}');
            var qty_{{ $k }} = form_{{ $v->rowId }}.find('input[name="qty"]');
            var product_{{ $k }} = form_{{ $v->rowId }}.find('input[name="product_id"]');

            qty_{{ $k }}.change(function () {
                console.log($(this).val());
                console.log(product_{{ $k }}.val());

                if($(this).val() == 0){
                    $(this).val(1)
                }

                if($(this).val() <= {{ $v->model->qty }}){
                    $.ajax({
                        type: "POST",
                        url: '{{ route('update-cart', $v->rowId) }}',
                        data:{
                            '_method': 'PATCH',
                            'qty':$(this).val()
                        },
                        success: function(data)
                        {
                            $('#product_total_price{{ $v->rowId }}').html(data.data.qty * data.data.price);
                            $('#total_order_price_before').html(data.total);
                            $('#total_order_price_after').html(data.total);
                        }
                    });
                } else {
                    alert ('Такого количества продуктов нет на складе');
                    $(this).val({{ $v->model->qty }});
                    $.ajax({
                        type: "POST",
                        url: '{{ route('update-cart', $v->rowId) }}',
                        data:{
                            '_method': 'PATCH',
                            'qty':$(this).val()
                        },
                        success: function(data)
                        {
                            $('#product_total_price{{ $v->rowId }}').html(data.data.qty * data.data.price);
                            $('#total_order_price_before').html(data.total);
                            $('#total_order_price_after').html(data.total);

                        }
                    });
                }
            });
        @endforeach
    });

</script>
@endsection