<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use Auth;
use Measoft\Courier\Measoft;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cartItems = Cart::instance('shopping')->content();

        foreach ($cartItems as $cartItem){
            if (($cartItem->model->qty > 0) & ($cartItem->model->qty < $cartItem->qty)){
                Cart::instance('shopping')->update($cartItem->rowId, $cartItem->model->qty);
            } elseif ($cartItem->model->qty == 0){
                Cart::instance('shopping')->remove($cartItem->rowId);
            }
        }

//        $measoft = new Measoft('test', 'testm', 8);
//        $towns = [];
//        $response = $measoft->orderRequest4Cities("Моск");
//        foreach ($response->town as $town){
//            array_push($towns, $town->name);
//        }
//        dd($response);
//        $pvzs = [];
////
//
//
//        foreach ($response->pvz as $pvz) {
//            $pvzs[] = [
//                'code'=> $pvz->code,//Название товара
//                'name'=> $pvz->name,//Количество мест
//                'address'=> $pvz->address,//Масса единицы товара
//                'phone'=> $pvz->phone,//Цена единицы товара
//                'comment'=> $pvz->comment,//Цена единицы товара
//            ];
//        }
//
//
//        dd($pvzs);


        if($request->post()){

            $measoft = new Measoft('test', 'testm', 8);

            if($request->has('city') && $request->has('street') && strlen($request->street) > 2 && strlen($request->city) > 2){
                $streets = [];
                $response = $measoft->orderRequest4Streets($request->street, $request->city);
                foreach ($response->street as $street){
                    array_push($streets, $street->name);
                }
                return response()->json($streets);
            }

            if($request->only('city') && strlen($request->city) > 2){
                $towns = [];
                $response = $measoft->orderRequest4Cities($request->city);
                foreach ($response->town as $town){
                    array_push($towns, $town->name);
                }
                return response()->json($towns);
            }

            if($request->only('pvz_city') && strlen($request->pvz_city) > 4){

                $response = $measoft->orderRequest4PVZ($request->pvz_city);
                $pvzs = [];

                foreach ($response->pvz as $pvz) {
                    $pvzs[] = [
                        'code'=> $pvz->code,//Название товара
                        'name'=> $pvz->name,//Количество мест
                        'address'=> $pvz->address,//Масса единицы товара
                        'phone'=> $pvz->phone,//Цена единицы товара
                        'comment'=> $pvz->comment,//Цена единицы товара
                    ];
                }
                return response()->json($pvzs);
            }

            if($request->only('region') && strlen($request->region) > 1){
                $cities = [];
                $response = $measoft->orderRequest4Regions($request->region);
                foreach ($response->city as $city){
                    array_push($cities, $city->name);
                }
                return response()->json($cities);
            }

        }

        return view('front.orders.checkout', compact('cartItems'));
    }

    public function createOrder(Request $request)
    {

        if($request->post()){
            $this->validate($request, [
                'name' => 'max:100',
                'email' => 'string|email|max:50',
                'phone' => 'max:20',
                'delivery' => 'integer',
                'payment' => 'integer',
                'comment' => 'max:255'
            ]);

            $amount = floatval(preg_replace('/[^\d.]/', '', Cart::instance('shopping')->subtotal()));

            $order = array(
                'orderno'=> \rand(10000,99999),//Номер заказа
                'barcode'=>'1673943081',//Штрих-код
                'company'=>'АВТОТОВАРЫCNS',//Компания-получатель. Должно быть заполнено company ИЛИ person!
                'person'=>'Иванов Иван Иванович',//Контактное лицо. Должно быть заполнено company ИЛИ person!
                'phone'=>'89123456789',//Телефон. Можно указывать несколько телефонов
                'town'=>'Москва',//Город
                'address'=>'ул. Уральская, 1-2',//Адрес
                'date'=>'2018-04-30',//Дата доставки в формате "YYYY-MM-DD"
                'time_min'=>'12:00',//Желаемое время доставки в формате "HH:MM"
                'time_max'=>'20:00',//Желаемое время доставки в формате "HH:MM"
                'weight'=>5,//Общий вес заказа
                'quantity'=>1,//Количество мест
                'price'=>$amount,//Сумма заказа
                'inshprice'=>$amount+200,//Объявленная стоимость
                'enclosure'=>'Это ТЕСТОВЫЙ заказ',//Наименование
                'instruction'=>'Комментарий',//Поручение
            );

            $cartItems = Cart::instance('shopping')->content();

            $items = [];

            foreach ($cartItems as $cartItem) {
                $items[] = [
                    'name'=> $cartItem->name,//Название товара
                    'quantity'=> $cartItem->qty,//Количество мест
                    'mass'=> 1,//Масса единицы товара
                    'retprice'=> $cartItem->price,//Цена единицы товара
                ];
            }

//            //Создаем экзепляр класса Меасофт
            $measoft = new Measoft('test', 'testm', 8);
//
//            $a = $measoft->orderRequest4Regions('Моск');
//
//            foreach ($a->city as $item){
//
//                echo 'code '. $item->code . '<br>';
//                echo 'name '. $item->name . '<br>';
//                echo 'ShortName2 '. $item->country->ShortName2 . '<br>';
//
//
//                var_dump($item);
//            }
//
//            die();
//
//            dd($a);

//            $orderNumber = $measoft->orderRequest($order, $items);

//            if($orderNumber){
//                dd($orderNumber);
//            } else {
//                dd($measoft->errors);
//            }


//            dd($status = $measoft->statusRequest(59160)); // новый
//die();


            //Пытаемся отправить заказ
            if ($orderNumber = $measoft->orderRequest($order, $items)) {
                print 'Заказ '.$orderNumber.' успешно создан<br>';

                if ($status = $measoft->statusRequest($orderNumber)) {
                    print 'Заказ '.$orderNumber.' сейчас: '.$status;
                } else {
                    print 'При получении статуса произошли ошибки:<br>';
                    print_r($measoft->errors);
                }
            } else {
                print 'При отправке заказа произошли ошибки:<br>';
                print_r($measoft->errors);
            }




            $order = new Order();
            $order->number =  \str_random();
            $order->content =  \serialize(Cart::instance('shopping')->content());
            if(Auth::check()){
                $order->person =  Auth::user()->id;
            }
            $order->amount =  Cart::instance('shopping')->subtotal();
            $order->name =  $request->name;
            $order->email =  $request->email;
            $order->phone =  $request->phone;
            $order->comment =  $request->comment;
            $order->delivery =  $request->delivery;
            $order->payment =  $request->payment;
            $order->status =  1;
            $result = $order->save();

            if ($result){
                Cart::instance('shopping')->destroy();
                return view('front.orders.order', compact('order'));
            } else {
                return back();
            }
        } else {
            return back();
        }

        // отнять кол-во товаров из ПРОДУКТА
    }


}
