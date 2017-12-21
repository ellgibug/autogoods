<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    // searching for request?
//    public function search(Request $request)
//    {
//        // redirect current search to searchProduct method
//        return redirect('/search/' . $request['search']);
//
//    }

    public function searchProduct($product)
    {
        $products = Product::search($product)->get();
        return view('front.pages.product_search')->with(compact('products'));
    }


    public function search(Request $request)
    {
        $search = $request->search;

        $products = Product::search($search)->get();


        return view ('front.pages.search', compact('products', 'search'));
    }
}
