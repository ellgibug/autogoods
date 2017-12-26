<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Product;

class FrontPagesController extends Controller
{
    public function index()
    {
        $previous = Product::all()->random(8);
        $prices = Product::all()->random(8);
        $season = Product::all()->random(8);
        return view('front.pages.index')->with(compact('previous', 'prices', 'season'));
    }

    public function getProductsByLevels($id)
    {
        $level = Level::find($id);

        $products = $level->products()->get();

        return view('front.pages.level', compact('level', 'products'));
    }

    public function getSingleProduct($id)
    {
        $product = Product::find($id);

        return view ('front.pages.product', compact('product'));
    }

    public function apiCall()
    {
//        return redirect('http://tecdoc.api.abcp.ru/manufacturers?userlogin=api@id13506&userpsw=13dfbc5398ae2f1e5f1bf28bb248820c&userkey=3565430');
//        return redirect('http://tecdoc.api.abcp.ru/models?userlogin=api@id13506&userpsw=13dfbc5398ae2f1e5f1bf28bb248820c&userkey=3565430&manufacturerId=788');
//        return redirect();

//        $a = 'http://tecdoc.api.abcp.ru/modifications?userlogin=api@id13506&userpsw=13dfbc5398ae2f1e5f1bf28bb248820c&userkey=3565430&manufacturerId=16&modelId=5389';
//        $b = file_get_contents($a);
//        $c = json_decode($b);
//
//        dd($c);
//        foreach ($c as $item){
//            var_dump($item->name);
//        }

        $app = app();
        $connection = $app['tecdoc'];

        $a = $connection->getManufacturers();
//        dd($a);
        $b = $connection->getModels(788);
//        dd($b);
        $c = $connection->getModifications(815, 4930);
//        dd($c);
//        $d = $connection->getAdaptabilityManufacturers('febi', '01089');
        $d = $connection->getAdaptabilityManufacturers('BMW', '83212365925');
        dd($d);
        $f = $connection->getAdaptabilityModels('TRW', 'DF7369', 'NISSAN');
        dd($f);
        $h = $connection->getAdaptabilityModifications('TRW', 'DF7369', 'NISSAN', 'QASHQAI / QASHQAI +2 I (J10, JJ10)');
        dd($h);
    }
}