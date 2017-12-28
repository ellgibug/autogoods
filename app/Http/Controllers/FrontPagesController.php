<?php

namespace App\Http\Controllers;

use App\Adaptability;
use App\Car;
use Illuminate\Http\Request;
use App\Level;
use App\Product;
use Illuminate\Support\Facades\Auth;

class FrontPagesController extends Controller
{
    public function index()
    {
//        $previous = Product::all()->random(8);
//        $prices = Product::all()->random(8);
//        $season = Product::all()->random(8);
//        return view('front.pages.index', compact('previous', 'prices', 'season'));
        return view('front.pages.index');
    }

    public function getProductsByLevels($id)
    {
        $level = Level::find($id);
        $products = $level->products()->get();

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
                        $products = $products->where('id', '!=', $product->id);
                    }
                }
            }

        }

        return view('front.pages.level', compact('level', 'products'));

    }

    public function getSingleProduct($id)
    {
        $product = Product::find($id);

        return view ('front.pages.product', compact('product'));
    }


    public function apiCall2()
    {
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

//        $app = app();
//        $connection = $app['tecdoc'];
//
//        $products = Product::all();
//
//        foreach ($products as $product){
//
//            $manufacturers = $connection->getAdaptabilityManufacturers($product->brand, $product->vendor_code);
//            if($manufacturers){
//                foreach ($manufacturers as $manufacturer){
////                    var_dump($manufacturer);
//                    $models = $connection->getAdaptabilityModels($product->brand, $product->vendor_code, $manufacturer->name);
//                    if($models) {
//                        foreach ($models as $model){
////                            var_dump($model);
//                            $modifications = $connection->getAdaptabilityModifications($product->brand, $product->vendor_code, $manufacturer->name, $model);
//                            if ($modifications){
//                                foreach ($modifications as $modification) {
////                                    var_dump($modification->name);
//                                    $adaptability = new Adaptability();
//                                    $adaptability->product_id = $product->id;
//                                    $adaptability->modification_name = $modification->name;
//                                    $adaptability->save();
//                                }
//                            }
//
//                        }
//                    }
//                }
//            }
//        }
    }
}