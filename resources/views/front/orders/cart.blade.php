@extends('front.layouts.master')

@section('s-section')

<section class="m-0 pt-20 pb-20">
    <div class="container">
        <h1>Корзина</h1>
        @if(Cart::count())
            <div class="row">
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            @foreach($cartItems as $cartItem)
                            <tr>
                                <td>
                                    <img src="{{ asset('public/images/img.jpg') }}" alt="{{ $cartItem->name }}" width="100">
                                </td>
                                <td>
                                    <p class="mb-6 fs-12">brand {{ $cartItem->model->brand }}</p>
                                    <p class="mb-6 fs-12">sku {{ $cartItem->model->vendor_code }}</p>
                                    <p class="mb-6 fs-14">{{ $cartItem->model->name }}</p>
                                </td>
                                <td>
                                    {{--<input type="text">--}}
                                    <form action="{{ route('update-cart', $cartItem->rowId) }}" method="post" class="mb-10" id="update_product_qty_form{{ $cartItem->rowId }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <input type="hidden" value="{{ $cartItem->rowId }}" name="product_id">
                                        <input type="number"  value="{{ $cartItem->qty }}" name="qty" min="1"
                                               max="{{ $cartItem->model->qty }}" class="form-control">
                                        <p class="mb-10">
                                            <span id="product_total_price{{ $cartItem->rowId }}">{{ $cartItem->price * $cartItem->qty }}</span>
                                            руб.
                                        </p>
                                    </form>
                                    <p class="mb-6 fs-12" id="delete_item_from_cart_span{{ $cartItem->rowId }}" style="cursor: pointer">Удалить</p>
                                    <form action="{{ route('destroy-cart', $cartItem->rowId) }}" method="post" class="d-none" id="delete_item_from_cart_form{{ $cartItem->rowId }}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="background-color: #f2f2f2" class="p-20">
                        <p>Итого: <span id="total_order_price_before">{{ Cart::subtotal() }}</span> руб.</p>
                        <a href="{{ route('checkout') }}" class="btn btn-hvr hvr-float-shadow m-0 btn-block">Оформить заказ</a>
                    </div>
                </div>
            </div>
        @else
        <h2>Ваша корзина пуста</h2>
        @endif
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