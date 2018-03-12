@extends('front.layouts.master')

@section('s-section')

<section class="m-0 pt-20 pb-20">
    <div class="container">
        <h1>Спасибо за Ваш заказ № {{ $order->number }}!</h1>
        <div class="card card-default">
            <div class="card-block">
                <p class="mb-10 fs-14">Покупатель: {{ $order->name }}</p>
                <p class="mb-10 fs-14">E-mail: {{ $order->email }}</p>
                <p class="mb-10 fs-14">Телефон: {{ $order->phone }}</p>
                <p class="mb-10 fs-14">Стоимость заказа: {{ $order->amount }} руб.</p>
                <p class="mb-10 fs-14">Комментарий: {{ $order->comment }}</p>
                <p class="mb-10 fs-14">Доставка: самовывоз</p>
                <p class="mb-10 fs-14">Оплата: наличными</p>
                <p class="mb-10 fs-14">Статус: в сборке</p>
                <p class="fs-14">Дата заказа: {{ $order->created_at }}</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        @foreach( \unserialize($order->content) as $cartItem)
                            <tr>
                                <td>
                                    <img src="{{ asset('public/images/img.jpg') }}" alt="{{ $cartItem->name }}" width="100px">
                                </td>
                                <td>
                                    <p class="mb-6 fs-12">brand {{ $cartItem->model->brand }}</p>
                                    <p class="mb-6 fs-12">sku {{ $cartItem->model->vendor_code }}</p>
                                    <p class="mb-6 fs-14">{{ $cartItem->model->name }}</p>
                                </td>
                                <td>
                                    <p class="mb-6 fs-12">{{ $cartItem->qty }} шт.</p>
                                    <p class="mb-6 fs-12">{{ $cartItem->price * $cartItem->qty }} руб.</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

