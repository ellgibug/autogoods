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
                                <div class="col-sm-8">
                                    <label class="radio">
                                        <input type="radio" name="delivery" value="1" checked required>
                                        <i></i> Самовывоз
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="delivery" value="2" disabled>
                                        <i></i> Курьерская доставка
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="delivery" value="3" disabled>
                                        <i></i> Доставка почтой
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <div class="col-form-label bold">Оплата</div>
                                </div>
                                <div class="col-sm-8">
                                    <label class="radio">
                                        <input type="radio" name="payment" value="1" checked required>
                                        <i></i> Наличными
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="payment" value="2" disabled>
                                        <i></i> Банковской картой
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
    </section>



@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
            $('#order_btn').click(function(){
                $('#order_form').submit()
            })
        })
    </script>

@endsection