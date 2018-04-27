@extends('front.layouts.master')

@section('s-section')

<section class="m-0 pt-20 pb-20">
    <div class="container">
    <h1>Оформление заказа</h1>


    @if(Cart::count())
        <div class="row">
                <div class="col-md-9">
                    <form method="post" action="{{ route('create-order') }}" id="order_form">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">ФИО</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                       @auth value="{{ Auth::user()->name }}" @endauth
                                       @guest value="Иванов Иван Иванович"@endauth
                                required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email"
                                       @auth value="{{ Auth::user()->email }}" @endauth
                                       @guest value="guest@gmail.com"@endauth
                                required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control masked" data-format="(999) 999-99-99" data-placeholder="_" name="phone" id="phone" value="4951234567" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <div class="col-form-label bold">Доставка</div>
                            </div>
                            <div class="col-sm-10">
                                <label class="radio">
                                    <input type="radio" name="delivery" value="1">
                                    <i></i> Доставка собственным курьером
                                    <br>
                                    <small>доставляется в течение 1-2х дней после подтверждения заказа</small>
                                </label>
                                <br>
                                <label class="radio">
                                    <input type="radio" name="delivery" value="2" checked required>
                                    <i></i> Самовывоз со склада
                                    <br>
                                    <small>0 рублей</small>
                                </label>
                                <br>
                                <label class="radio">
                                    <input type="radio" name="delivery" value="3">
                                    <i></i> Доставка курьером
                                    <br>
                                    <small><a href="https://i-courier.ru/">курьерской службой доставки</a></small>
                                </label>
                                <br>
                                <div style="background-color: #f2f2f2" class="d-none p-20 mb-20" id="courier_delivery">

                                        <div class="row">
                                            <div class="col-sm">
                                                <label for="region">Регион</label>
                                                <input list="region" class="form-control" name="region" autocomplete="off">
                                                <datalist id="region"></datalist>
                                            </div>
                                            <div class="col-sm">
                                                <label for="city">Город</label>
                                                <input list="city" class="form-control" name="city" autocomplete="off" disabled>
                                                <datalist id="city"></datalist>
                                            </div>
                                            <div class="col-sm">
                                                <label for="street">Улица</label>
                                                <input list="street" class="form-control" name="street" autocomplete="off" disabled>
                                                <datalist id="street"></datalist>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label for="address">Адрес (номер дома, квартира)</label>
                                                <input type="text" class="form-control" id="address" name="address" disabled>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="zipcode">Почтовый индекс</label>
                                                <input type="text" class="form-control masked" data-format="999999" data-placeholder="_"  name="zipcode">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <label for="date">Желаемая дата доставки</label>
                                                <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="ru" data-RTL="false" name="date">
                                            </div>
                                            <div class="col-sm">
                                                <label for="mintime">Желаемое время доставки (от)</label>
                                                <input type="text" class="form-control masked" data-format="99:99" data-placeholder="_" name="mintime">
                                            </div>
                                            <div class="col-sm">
                                                <label for="maxtime">Желаемое время доставки (до)</label>
                                                <input type="text" class="form-control masked" data-format="99:99" data-placeholder="_" name="maxtime">
                                            </div>
                                        </div>

                                </div>
                                <label class="radio">
                                    <input type="radio" name="delivery" value="4">
                                    <i></i> Доставка через пункт выдачи
                                    <br>
                                    <small><a href="https://i-courier.ru/">курьерской службой доставки</a></small>
                                </label>
                                <div style="background-color: #f2f2f2;" class="d-none p-20 mb-20" id="pvz_delivery">

                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="pvz_city">Город</label>
                                            <input list="pvz_city" class="form-control" name="pvz_city" autocomplete="off">
                                            <datalist id="pvz_city"></datalist>
                                        </div>
                                    </div>

                                    <div id="pvzs" class="p-20 pvz_container">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <div class="col-form-label bold">Оплата</div>
                            </div>
                            <div class="col-sm-10">
                                <label class="radio">
                                    <input type="radio" name="payment" value="1">
                                    <i></i> Получение наличных денежных средств или по карте при доставке собственным курьером
                                </label>
                                <br>
                                <label class="radio">
                                    <input type="radio" name="payment" value="2" checked required>
                                    <i></i> Получение денежных средств через агентский договор
                                </label>
                                <br>
                                <label class="radio">
                                    <input type="radio" name="payment" value="3">
                                    <i></i> Онлайн Эквайринг Альфабанка
                                </label>
                                <br>
                                <label class="radio">
                                    <input type="radio" name="payment" value="4">
                                    <i></i> Робокасса
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="comment" class="col-sm-2 col-form-label">Комментарий</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="comment" name="comment" required value="Очень важный комментарий к заказу.">
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-md-3">
                    <div style="background-color: #f2f2f2" class="p-20">
                        <p class="mb-10 fs-13">Сумма заказа: {{ Cart::subtotal() }} руб.</p>
                        <p class="mb-10 fs-13">Доставка: Самовывоз</p>
                        <p class="mb-10 fs-13">Оплата: Наличными</p>
                        <hr>
                        <p class="fs-15">Итого к оплате: {{ Cart::subtotal() }} руб.</p>
                        <button type="button" class="btn btn-hvr hvr-float-shadow m-0 btn-block" id="order_btn">Подтвердить заказ</button>
                    </div>
                </div>
            </div>
    @endif
    </div>


    {{--<div>--}}
        {{--<input type="text" id="to-paste">--}}
        {{--<ul class="d-none" id="ul-container" style="width: 200px">--}}
            {{--<li class="item-4-input">one</li>--}}
            {{--<li class="item-4-input">two</li>--}}
            {{--<li class="item-4-input">three</li>--}}
            {{--<li class="item-4-input">four</li>--}}
            {{--<li class="item-4-input">five</li>--}}
        {{--</ul>--}}
    {{--</div>--}}


</section>



@endsection

@section('scripts')

<script>
    $(document).ready(function(){

        // $('#to-paste').keyup(function () {
        //
        //     if($(this).val() > 1){
        //         $('#ul-container').removeClass('d-none').addClass('d-block');
        //     } else {
        //         $('#ul-container').removeClass('d-block').addClass('d-none');
        //     }
        //
        // });
        //
        // $('.item-4-input').click(function () {
        //     $('#to-paste').val($(this).html());
        // });



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#order_btn').click(function(){
            $('#order_form').submit()
        });

        var delivery_type = $('#order_form').find('input[name=delivery]');

        delivery_type.change(function () {

            if($(this).val() == 3){
                $('#courier_delivery').removeClass('d-none').addClass('d-block');
            } else {
                $('#courier_delivery').removeClass('d-block').addClass('d-none');
            }

            if($(this).val() == 4){
                $('#pvz_delivery').removeClass('d-none').addClass('d-block');
            } else {
                $('#pvz_delivery').removeClass('d-block').addClass('d-none');
            }

        });

        var region = $('#order_form').find('input[name=region]');
        var city = $('#order_form').find('input[name=city]');
        var street = $('#order_form').find('input[name=street]');
        var address = $('#order_form').find('input[name=address]');

        region.keyup(function () {
            if($(this).val().length > 1){
                $.ajax({
                    type: "post",
                    url: "{{ route('checkout') }}",
                    data:{
                        'region':$(this).val()
                    },
                    success: function(data)
                    {
                        $('#region').children().remove();
                        data.forEach(function(item) {
                            $('#region').append('<option>'+item[0]+'</option>');
                        });
                    }
                });
                city.removeAttr('disabled');
            } else {
                city.attr('disabled', 'disabled');
                street.attr('disabled', 'disabled');
                address.attr('disabled', 'disabled');
            }
        });

        region.change(function () {
            city.val('');
            street.val('');
        });

        city.change(function () {
            street.val('');
        });


        city.keyup(function () {
            if($(this).val().length > 1){
                $.ajax({
                    type: "post",
                    url: "{{ route('checkout') }}",
                    data:{
                        'city':$(this).val()
                    },
                    success: function(data)
                    {
                        $('#city').children().remove();
                        data.forEach(function(item) {
                            $('#city').append('<option>'+item[0]+'</option>');
                        });
                    }
                });
                street.removeAttr('disabled');
            } else {
                street.attr('disabled', 'disabled');
                address.attr('disabled', 'disabled');
            }
        });


        street.keyup(function () {
            if($(this).val().length > 1 && city.val().length > 2){
                $.ajax({
                    type: "post",
                    url: "{{ route('checkout') }}",
                    data:{
                        'street':$(this).val(),
                        'city':city.val()
                    },
                    success: function(data)
                    {
                        $('#street').children().remove();
                        data.forEach(function(item) {
                            $('#street').append('<option>'+item[0]+'</option>');
                        });
                    }
                });
                address.removeAttr('disabled');
            } else {
                address.attr('disabled', 'disabled');
            }
        });


        /********pvz*********/


        var pvz_city = $('#order_form').find('input[name=pvz_city]');

        pvz_city.change(function () {
            if($(this).val().length > 4){
                $.ajax({
                    type: "post",
                    url: "{{ route('checkout') }}",
                    data:{
                        'pvz_city':$(this).val()
                    },
                    success: function(data)
                    {
                        $('#pvzs').empty();

                        data.forEach(function(item) {
                            if(item.address[0] && item.phone[0] && item.comment[0]){
                                $('#pvzs').append(
                                    '<div class="pvz_delivery" data-value="' + item.code[0] +'">' +
                                    '<p class="mb-10 fs-16">' + item.name[0] + '</p>' +
                                    '<p class="mb-10 fs-13">Адрес: <span>' + item.address[0] + '</span></p>' +
                                    '<p class="mb-10 fs-13">Телефон: <span>' + item.phone[0] + '</span></p>' +
                                    '<p class="mb-30 fs-13">Комментарий: <span>' + item.comment[0] + '</span></p></div>'
                                );
                            }
                        });
                    }
                });
            }
        });


        $( document ).on( "click", ".pvz_container .pvz_delivery", function() {
            $(this).parents().find('.pvz_delivery').removeClass('selected');
            $(this).addClass('selected');
            console.log($(this).attr('data-value'));
        });



        {{--$('.radio-group-addr .radio-addr').click(function(){--}}
            {{--$(this).parents().find('.radio-addr').removeClass('selected');--}}
            {{--$(this).addClass('selected');--}}
            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: '{{route("set-order-options")}}',--}}
                {{--data:{--}}
                    {{--'address':$(this).attr('data-value')--}}
                {{--},--}}
                {{--success: function(data)--}}
                {{--{--}}
                    {{--$('#place_for_address').empty().append(--}}
                        {{--'<p class="mb-3">'+data[0].name+'</p>'+--}}
                        {{--'<p class="mb-3">'+data[0].state+', '+data[0].city+'</p>'+--}}
                        {{--'<p class="mb-3">'+data[0].address+', '+data[0].zip+'</p>'--}}
                    {{--);--}}

                    {{--window.user_address = data[0];--}}
                    {{--console.log(window.user_address);--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}




    })
</script>

@endsection