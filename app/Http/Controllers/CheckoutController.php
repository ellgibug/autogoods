<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use Auth;
use Measoft\Courier\Measoft;
use Session;

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

        $measoft = new Measoft('test', 'testm', 8);
        $towns = [];
        $response = $measoft->createXML4Cities('Моск');
        $response = $measoft->orderRequest4Cities('Моск');
        dd($response);
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

    public function createOrderP1(Request $request)
    {
        if ($request->post()) {

            $this->validate($request, [
                'name' => 'max:100',
                'email' => 'string|email|max:50',
                'phone' => 'max:20',
                'delivery' => 'integer',
                'payment' => 'integer',
                'comment' => 'max:255'
            ]);

            $request->session()->put('name', $request->name);
            $request->session()->put('email', $request->email);
            $request->session()->put('phone', $request->phone);
            $request->session()->put('delivery', $request->delivery);
            $request->session()->put('payment', $request->payment);

            // если робокасса, то отправка на робокассу
            switch ($request->payment) {
                case 1:
                    // проверка на тип доставки
                    // если курьер, то отправка в меасофт
                    // если не курьер, то создаем заказ

                    // measoft
                    if($request->delivery == 3 || $request->delivery == 4){
                        $amount = floatval(preg_replace('/[^\d.]/', '', Cart::instance('shopping')->subtotal()));

                        $order = array(
                                                'orderno'=> \rand(10000,99999),//Номер заказа
                                                'barcode'=>'1673943081',//Штрих-код
                            'company' => 'AvtoProk',//Компания-получатель. Должно быть заполнено company ИЛИ person!
                            'person' => 'Иванов Иван Иванович',//Контактное лицо. Должно быть заполнено company ИЛИ person!
                            'phone' => '89123456789',//Телефон. Можно указывать несколько телефонов
                            'town' => 'Москва',//Город
                            'address' => 'ул. Уральская, 1-2',//Адрес
                            'date' => '2018-06-11',//'2018-04-30',//Дата доставки в формате "YYYY-MM-DD"
                            'time_min' => '12:00',//Желаемое время доставки в формате "HH:MM"
                            'time_max' => '20:00',//Желаемое время доставки в формате "HH:MM"
                            'weight' => 5,//Общий вес заказа
                            'quantity' => 1,//Количество мест
                            'price' => $amount,//Сумма заказа
                            'inshprice' => $amount + 200,//Объявленная стоимость
                            'enclosure' => 'Это ТЕСТОВЫЙ заказ',//Наименование
                            'instruction' => 'Комментарий',//Поручение
                        );

                        $cartItems = Cart::instance('shopping')->content();

                        $items = [];

                        foreach ($cartItems as $cartItem) {
                            $items[] = [
                                'name' => $cartItem->name,//Название товара
                                'quantity' => $cartItem->qty,//Количество мест
                                'mass' => 1,//Масса единицы товара
                                'retprice' => $cartItem->price,//Цена единицы товара
                            ];
                        }

                        //Создаем экзепляр класса Меасофт
                        $measoft = new Measoft('test', 'testm', 8);

                        //Пытаемся отправить заказ
                        if ($orderNumber = $measoft->orderRequest($order, $items)) {
                            print 'Заказ ' . $orderNumber . ' успешно создан<br>';


                            if ($status = $measoft->statusRequest($orderNumber)) {
                                print 'Заказ ' . $orderNumber . ' сейчас: ' . $status;

                            } else {
                                print 'При получении статуса произошли ошибки:<br>';
                                print_r($measoft->errors);

                            }
                        } else {
                            print 'При отправке заказа произошли ошибки:<br>';
                            print_r($measoft->errors);

                        }


                    } else {
                        $order = Order::createOrder();
                        if ($order) {
                            Cart::instance('shopping')->destroy();
                            return view('front.orders.order', compact('order'));
                        } else {
                            dd('При создании произошла ошибка. Пожалуйста, свяжитесь со специалистом компании.');
                        }
                    }
                    break;
                case 2:
                    return back()->with('paymentMsg', 'Данный способ оплаты будет доступен позже. Пожалуйста, выберите Робокассу или Оплату наличными при получении.');
                    break;
                case 3:
                    return back()->with('paymentMsg', 'Данный способ оплаты будет доступен позже. Пожалуйста, выберите Робокассу или Оплату наличными при получении.');
                    break;
                case 4: //робокасса
                    $mrh_login = "AvtoProk";
                    $mrh_pass1 = "AvtoProkT_11_";
                    $inv_id = 0;
                    $inv_desc = "тестовая оплата " . date('Y-m-d H:i:s');
                    $out_summ = Cart::instance('shopping')->subtotal();
                    $IsTest = 1;
                    $crc = hash('sha256', "$mrh_login:$out_summ:$inv_id:$mrh_pass1");
                    print "<html><script language=JavaScript " .
                        "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?" .
                        "MerchantLogin=$mrh_login&OutSum=$out_summ&InvoiceID=$inv_id" .
                        "&Description=$inv_desc&SignatureValue=$crc&IsTest=$IsTest'></script></html>";
                    die();
                    break;
                default:
                    return back()->with('paymentMsg', 'Данный способ оплаты не определен. Пожалуйста, выберите Робокассу или Оплату наличными при получении.');
                    break;
            }
        }
    }

    public function success(Request $request)
    {
        // если оплата прошла успешно, то проверяем тип доставки и отправляем заказ туда

        // получение информации об оплате заказа
        if($request->has(['OutSum', 'InvId', 'SignatureValue'])) {

            $mrh_pass1 = "AvtoProkT_11_";

            $tm = getdate(time() + 9 * 3600);
            $date = "$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

            $out_summ = $request->OutSum;
            $inv_id = $request->InvId;
            $shp_item = $request->Shp_item;
            $crc = $request->SignatureValue;

            $crc = strtoupper($crc);

            $my_crc = strtoupper(hash('sha256', "$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

            // не успешно
            if ($my_crc != $crc) {
//            if (0) {
                return redirect()->to(route('checkout'))->with('paymentMsg', 'При оплате заказа произошла ошибка получения корректности подписи. Пожалуйста, свяжитесь со специалистом компании.');
            } else {
                // успешно
                $delivery = Session::get('delivery');

                $robokassa_info = "order_num :$inv_id;Summ :$out_summ;Date :$date";

                $request->session()->put('robokassa_info', $robokassa_info);

                switch ($delivery) {
                    case 1:
                        // сохранение заказа
                        $order = Order::createOrder();
                        if ($order) {
                            Cart::instance('shopping')->destroy();
                            return view('front.orders.order', compact('order'));
                        } else {
                            dd('При создании произошла ошибка. Пожалуйста, свяжитесь со специалистом компании.');
                        }
                        break;
                    case 2:
                        // сохранение заказа
                        $order = Order::createOrder();
                        if ($order) {
                            Cart::instance('shopping')->destroy();
                            return view('front.orders.order', compact('order'));
                        } else {
                            dd('При создании произошла ошибка. Пожалуйста, свяжитесь со специалистом компании.');
                        }
                        break;
                    case 3:
                        // отправка в меасофт курьером

                        $amount = floatval(preg_replace('/[^\d.]/', '', Cart::instance('shopping')->subtotal()));

                        $order = array(
                        'orderno'=> \rand(10000,99999),//Номер заказа
                        'barcode'=>'1673943081',//Штрих-код
                            'company' => 'AvtoProk',//Компания-получатель. Должно быть заполнено company ИЛИ person!
                            'person' => 'Иванов Иван Иванович',//Контактное лицо. Должно быть заполнено company ИЛИ person!
                            'phone' => '89123456789',//Телефон. Можно указывать несколько телефонов
                            'town' => 'Москва',//Город
                            'address' => 'ул. Уральская, 1-2',//Адрес
                            'date' => '2018-06-11',//'2018-04-30',//Дата доставки в формате "YYYY-MM-DD"
                            'time_min' => '12:00',//Желаемое время доставки в формате "HH:MM"
                            'time_max' => '20:00',//Желаемое время доставки в формате "HH:MM"
                            'weight' => 5,//Общий вес заказа
                            'quantity' => 1,//Количество мест
                            'price' => $amount,//Сумма заказа
                            'inshprice' => $amount + 200,//Объявленная стоимость
                            'enclosure' => 'Это ТЕСТОВЫЙ заказ',//Наименование
                            'instruction' => 'Комментарий',//Поручение
                        );

                        $cartItems = Cart::instance('shopping')->content();

                        $items = [];

                        foreach ($cartItems as $cartItem) {
                            $items[] = [
                                'name' => $cartItem->name,//Название товара
                                'quantity' => $cartItem->qty,//Количество мест
                                'mass' => 1,//Масса единицы товара
                                'retprice' => $cartItem->price,//Цена единицы товара
                            ];
                        }

                        //Создаем экзепляр класса Меасофт
                        $measoft = new Measoft('test', 'testm', 8);

                        //Пытаемся отправить заказ
                        if ($orderNumber = $measoft->orderRequest($order, $items)) {
                            print 'Заказ ' . $orderNumber . ' успешно создан<br>';


                            if ($status = $measoft->statusRequest($orderNumber)) {
                                print 'Заказ ' . $orderNumber . ' сейчас: ' . $status;

                            } else {
                                print 'При получении статуса произошли ошибки:<br>';
                                print_r($measoft->errors);

                            }
                        } else {
                            print 'При отправке заказа произошли ошибки:<br>';
                            print_r($measoft->errors);

                        }
                        $order = Order::createOrder();
                        if ($order) {
                            Cart::instance('shopping')->destroy();
                            return view('front.orders.order', compact('order'));
                        } else {
                            dd('При создании произошла ошибка. Пожалуйста, свяжитесь со специалистом компании.');
                        }



                        break;
                    case 4:
                        // отправка в меасофт пункт выдачи

                        $amount = floatval(preg_replace('/[^\d.]/', '', Cart::instance('shopping')->subtotal()));

                        $order = array(
                                                'orderno'=> \rand(10000,99999),//Номер заказа
                                                'barcode'=>'1673943081',//Штрих-код
                            'company' => 'AvtoProk',//Компания-получатель. Должно быть заполнено company ИЛИ person!
                            'person' => 'Иванов Иван Иванович',//Контактное лицо. Должно быть заполнено company ИЛИ person!
                            'phone' => '89123456789',//Телефон. Можно указывать несколько телефонов
                            'town' => 'Москва',//Город
                            'address' => 'ул. Уральская, 1-2',//Адрес
                            'date' => '2018-06-11',//'2018-04-30',//Дата доставки в формате "YYYY-MM-DD"
                            'time_min' => '12:00',//Желаемое время доставки в формате "HH:MM"
                            'time_max' => '20:00',//Желаемое время доставки в формате "HH:MM"
                            'weight' => 5,//Общий вес заказа
                            'quantity' => 1,//Количество мест
                            'price' => $amount,//Сумма заказа
                            'inshprice' => $amount + 200,//Объявленная стоимость
                            'enclosure' => 'Это ТЕСТОВЫЙ заказ',//Наименование
                            'instruction' => 'Комментарий',//Поручение
                        );

                        $cartItems = Cart::instance('shopping')->content();

                        $items = [];

                        foreach ($cartItems as $cartItem) {
                            $items[] = [
                                'name' => $cartItem->name,//Название товара
                                'quantity' => $cartItem->qty,//Количество мест
                                'mass' => 1,//Масса единицы товара
                                'retprice' => $cartItem->price,//Цена единицы товара
                            ];
                        }

                        //Создаем экзепляр класса Меасофт
                        $measoft = new Measoft('test', 'testm', 8);

                        //Пытаемся отправить заказ
                        if ($orderNumber = $measoft->orderRequest($order, $items)) {
                            print 'Заказ ' . $orderNumber . ' успешно создан<br>';


                            if ($status = $measoft->statusRequest($orderNumber)) {
                                print 'Заказ ' . $orderNumber . ' сейчас: ' . $status;

                            } else {
                                print 'При получении статуса произошли ошибки:<br>';
                                print_r($measoft->errors);

                            }
                        } else {
                            print 'При отправке заказа произошли ошибки:<br>';
                            print_r($measoft->errors);

                        }
                        $order = Order::createOrder();
                        if ($order) {
                            Cart::instance('shopping')->destroy();
                            return view('front.orders.order', compact('order'));
                        } else {
                            dd('При создании произошла ошибка. Пожалуйста, свяжитесь со специалистом компании.');
                        }



                        break;
                    default:
                        // вывод сообщения о неизвестном типе доставки
                        dd('При создании произошла ошибка. Выбран неизветсный тип доставки. Пожалуйста, свяжитесь со специалистом компании.');
                        break;
                }
            }
        } else {
            return redirect()->to(route('checkout'));
        }

    }

    public function fail(Request $request)
    {
        if($request->has('InvId')){
            $inv_id = $request->InvId;
            echo "Вы отказались от оплаты. Заказ# $inv_id\n";
            echo "You have refused payment. Order# $inv_id\n";
        } else {
            return redirect()->to(route('checkout'));
        }

    }
}
