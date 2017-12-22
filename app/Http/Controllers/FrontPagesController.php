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


}
