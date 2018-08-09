<?php

namespace App\Http\Controllers;

use App\Adaptability;
use App\Car;
use Illuminate\Http\Request;
use App\Level;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class FrontPagesController extends Controller
{

    public function index()
    {
        return view('front.pages.index');
    }

    public function getProductsByLevels($id)
    {
        $level = Level::find($id);
        $products = $level->products()->paginate(20);

        if (Auth::guard('web')->check()){

            $cars = Car::where('user_id', Auth::user()->id)
                ->where('filter', 1)
                ->pluck('modification_name');


            foreach ($products as $product) {
                // если продукт не универсальный = есть в таблице сопостовимости
                if (count($product->adaptabilities)) {

                    $adaptabilities = $product->adaptabilities()->pluck('modification_name');

                    // если нет пересечений среди модификаций
                    if (! count($adaptabilities->intersect($cars))) {
                        $products = $products->where('id', '!=', $product->id)->paginate(16);
                    }
                }
            }

        }

        return view('front.pages.level', compact('level', 'products'));

    }

    public function search(Request $request)
    {
        $search = $request->search;

        $products = Product::search($search)->get();

        return view ('front.pages.search', compact('products', 'search'));
    }



    public function getSingleProduct($id)
    {
        $product = Product::find($id);

        return view ('front.pages.product', compact('product'));
    }

    public function exProd()
    {

//        $a = Excel::selectSheets('sheet1')->load();
//
//        dd($a);

        $level1 = collect([
            'АВТОХИМИЯ И АВТОКОСМЕТИКА',
            'АКСЕССУАРЫ',
            'ЗАПЧАСТИ',
            'ИНСТРУМЕНТЫ',
            'МАСЛА И ТЕХЖИДКОСТИ',
            'Мототехника',
            'Подарки.',
            'РАСХОДНЫЕ МАТЕРИАЛЫ',
        ]);

        $level2 = collect([
            'Автокосметика',
            'Автохимия',
            'Автохимия сезонного спроса',
            'Автогаджеты',
            'Автомобильные ароматизаторы',
            'Автомобильные ковры',
            'Автоэлектроника',
            'Аксессуары 1',
            'Компрессоры',
            'Товары для туризма и отдыха',
            'Чехлы',
            'Элементы кузова',
            'Запчасти на заказ',
            'Помпы, термостаты и датчики',
            'Ремни и ролики',
            'Тормозные диски и колодки',
            'Домкраты.',
            'Инструмент',
            'Наборы инструмента',
            'Масла для мото и специальной техники',
            'Масла моторные для автомобилей',
            'Масла трансмиссионные',
            'Технические жидкости',
            'Квадроциклы',
            'Снегоуборщики',
            'Подарки',
            'Автолампы',
            'Аккумуляторы',
            'Зарядные устройства',
            'Предохранители',
            'Свечи',
            'Фильтры',
            'Щётки стеклоочистителя'
        ]);
        $level3 = collect([
            'Автошампуни',
            'Очистители',
            'Полироли и восстановители краски',
            'Препараты для стекол',
            'Препараты для шин и дисков',
            'Средства по уходу за салоном',
            'Клеи, герметики, формирователи прокладок',
            'Материалы для кузовного ремонта',
            'Мото-Вело Химия',
            'Смазки',
            'Специальные жидкости',
            'Средства для масляной системы двигателя',
            'Средства для системы кондиционирования',
            'Средства для системы охлаждения двигателя',
            'Средства для топливной системы',
            'Средства для трансмиссионной системы и ГУР',
            'Для дизтоплива',
            'Для запуска двигателя',
            'Размораживатели',
            'Стеклоомывающая жидкость',
            'Автоэлектроника прочая',
            'Ароматизаторы',
            'Ковры салонные и в багажник',
            'Алкотестеры',
            'Видеоэлектроника',
            'Клеммы, провода, разное',
            'Колонки',
            'Магнитолы',
            'Навигаторы',
            'Радар - детекторы',
            'Сигнализации',
            'Аксессуары для багажного отделения',
            'Аксессуары для салона прочие',
            'Декоративные колпаки колес',
            'Детские аксессуары',
            'Товары для техосмотра и обслуживания автомобиля',
            'Щетки, салфетки, губки, мойки',
            'Экстерьер кузова',
            'Электроприборы',
            'Компрессоры и насосы',
            'Арбалеты и рогатки',
            'Газовое оборудование',
            'Галантерея',
            'Изотермическая продукция',
            'Ножи и мультиинструмент',
            'Пневматика',
            'Сопутствующие товары для туризма',
            'Товары для пикника',
            'Туристическая мебель',
            'Туристическое снаряжение',
            'Фонари',
            'Чехлы и накидки',
            'Жиклеры омывателя',
            'Накладки на педали',
            'Пистоны',
            'Трубки соединительные',
            'Шланги',
            'Элементы зеркальные',
            'Заказные запчасти',
            'Датчики температурные',
            'Помпы',
            'Термостаты',
            'ГРМ',
            'Приводные ремни',
            'Ролики',
            'Тормозные диски',
            'Тормозные колодки',
            'Домкраты',
            'Абразивный инструмент',
            'Автомобильный инструмент',
            'Измерительный инструмент',
            'Ленты клейкие',
            'Металлорежущий инструмент',
            'Метизы',
            'Перчатки',
            'Пневматический инструмент',
            'Слесарно-монтажный инструмент',
            'Сопутствующие товары',
            'Столярный инструмент',
            'Строительный инструмент',
            'Электроинструмент',
            'Ящики и сумки для инсрумента',
            'Наборы слесарных инструментов',
            'Масла для мото- и специальной техники',
            'Оригинальные масла',
            'Универсальные масла',
            'Масла трансмиссионные.',
            'Антифризы и тосолы',
            'Технические жидкости_',
            'Автолампы*',
            'Стартерные батареи для автомобилей',
            'Стартерные батареи для мототехники',
            'Зарядные и пусковые устройства',
            'Предохранители*',
            'Свечи зажигания и накаливания',
            'Фильтры*',
            'Щетки стеклоочистителя*'
        ]);

//        foreach ($level1 as $l1){
//            $level = new Level();
//            $level->name = $l1;
//            $level->save();
//        };
//
//        foreach ($level2 as $l2){
//            $level = new Level();
//            $level->name = $l2;
//            $level->save();
//        };
//
//        foreach ($level3 as $l3){
//            $level = new Level();
//            $level->name = $l3;
//            $level->save();
//        };


//        die('1');

//
//        $a = Excel::load('matrix.xlsx', function($reader) {
//
//            $reader->get();
//
//        });

//        dd($a->sheet[0]);

//        $a->each(function($sheet) {
//
//            // Loop through all rows
//            $sheet->each(function($row) {
//                $level1->push($row['gruppa1']);
//                $level2->push($row['gruppa2']);
//                $level3->push($row['gruppa3']);
//            });
//        });

//
//        dd($level3);
//





//        $a->each(function($sheet) {
//
//            // Loop through all rows
//            $sheet->each(function($row) {
//
//                if($row['gruppa3']){
//                    $product = new Product();
//                    $product->name = $row['nomenklatura'];
//                    $product->vendor_code = $row['artikul'];
//                    $product->brand = $row['brend'] ? $row['brend'] : 'default';
//                    $product->level1 = $row['gruppa1'];
//                    $product->level2 = $row['gruppa2'];
//                    $product->level3 = $row['gruppa3'];
//
//                    $product->provider = 'excel';
//                    $product->qty = \rand(10, 1000);
//                    $product->price = \rand(10, 1000);
//
//                    $product->save();
//                }
//
//            });
//
//        });
//
//        echo '+';










    }




    public function apiCall2()
    {
        die();
//        $products = Product::all();
//        $levels = Level::all();
//
//        foreach ($products as $product){
//            foreach ($levels as $level){
//                if($product->level1 == $level->name){
//                    $product->levels()->attach($level->id);
//                }
//                if($product->level2 == $level->name){
//                    $product->levels()->attach($level->id);
//                }
//                if($product->level3 == $level->name){
//                    $product->levels()->attach($level->id);
//                }
//            }
//        }
//        echo '+';

        $app = app();
        $connection = $app['tecdoc'];




//        $models = DB::table('models')->select('*')->where('id', '>=', 301)->where('id', '<=', 400)->get();
        $models = DB::table('models')->select('*')->where('id', '>=', 401)->get();

        foreach ($models as $model){
            \sleep(5);
            $modifications = $connection->getAdaptabilityModifications($model->product, $model->vendor_code, $model->manufacturer, $model->model);
            if ($modifications){
                foreach ($modifications as $modification) {

                    $adaptability = new Adaptability();
                    $adaptability->product_id = 8791;
                    $adaptability->modification_name = $modification->name;
                    $adaptability->save();
                }
            }
        }

        echo '+55';
        die();


////
////
//        $product = Product::find(8791);
//////////
////////        $products = Product::where('id', '>=', 8789)->where('id', '<=', 8800)->get();
//////
////////        foreach ($products as $product){
//            \sleep(2);
//            $manufacturers = $connection->getAdaptabilityManufacturers($product->brand, $product->vendor_code);
//
//            if($manufacturers){
//                foreach ($manufacturers as $manufacturer){
////                    var_dump($manufacturer);
//                    \sleep(2);
//                    $models = $connection->getAdaptabilityModels($product->brand, $product->vendor_code, $manufacturer->name);
//
//                    if($models) {
//                        foreach ($models as $model){
//
//                            DB::table('models')->insert([
//                                    'product' => $product->brand,
//                                    'vendor_code' => $product->vendor_code,
//                                    'manufacturer' => $manufacturer->name,
//                                    'model' => $model
//                                ]
//                            );
//
////                            \sleep(2);
////                            $modifications = $connection->getAdaptabilityModifications($product->brand, $product->vendor_code, $manufacturer->name, $model);
////
////                            if ($modifications){
////                                foreach ($modifications as $modification) {
//////                                    var_dump($modification->name);
////                                    $adaptability = new Adaptability();
////                                    $adaptability->product_id = $product->id;
////                                    $adaptability->modification_name = $modification->name;
////                                    $adaptability->save();
////                                }
////                            }
//
//                        }
//                    }
//                }
//            }
//////        }
//
        echo '++++';


    }
}