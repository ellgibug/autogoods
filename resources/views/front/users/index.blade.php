@extends('front.layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ Auth::guard('web')->user()->name }}'s</strong> Dashboard</div>
                <div class="panel-body">
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button id="btn-add" name="btn-add" class="btn btn-primary btn-block">Добавить автомобиль</button>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Марка</th>
                            <th>Модель</th>
                            <th>Модификация</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody id="cars-list" name="cars-list">
                        @foreach ($cars as $car)
                            <tr id="car{{$car->id}}">
                                <td>{{$car->filter}}</td>
                                <td>{{$car->manufacturer_name}}</td>
                                <td>{{$car->model_name}}</td>
                                <td>{{$car->modification_name}}</td>
                                <td>
                                    <button class="btn btn-info open-modal" value="{{$car->id}}">Изменить</button>
                                    <button class="btn btn-danger delete-car" value="{{$car->id}}">Удалить</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <strong>Мои заказы</strong>
                </div>
                <div class="panel-body">
                    @foreach(Auth::guard('web')->user()->orders->sortByDesc('created_at') as $k => $order)
                        <h1>Заказ № {{ $order->number }}!</h1>
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
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="carEditorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="carEditorModalLabel">Автомобиль</h4>
            </div>
            <div class="modal-body">
                <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">
                    <div class="form-group">
                        <label for="manufacturer" class="col-sm-3 control-label">Марка</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="manufacturer" id="manufacturer">
                                @foreach($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                @endforeach
                            </select>
                            <p id="manufacturer_db" class="hide"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="model" class="col-sm-3 control-label">Модель</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="model" id="model">
                                {{--data by ajax from api--}}
                            </select>
                            <p id="model_db" class="hide"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modification" class="col-sm-3 control-label">Модификация</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="modification" id="modification">
                                {{--data by ajax from api--}}
                            </select>
                            <p id="modification_db" class="hide"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="filter" id="filter" value="1"> Применить как фильтр
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Сохранить</button>
                <input type="hidden" id="car_id" name="car_id" value="0">
            </div>
        </div>
    </div>
</div>
@endsection

