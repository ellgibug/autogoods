<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cart()
    {
        $cartItems = Cart::instance('shopping')->content();

        foreach ($cartItems as $cartItem){
            if (($cartItem->model->qty > 0) & ($cartItem->model->qty < $cartItem->qty)){
                Cart::instance('shopping')->update($cartItem->rowId, $cartItem->model->qty);
            } elseif ($cartItem->model->qty == 0){
                Cart::instance('shopping')->remove($cartItem->rowId);
            }
        }

        return view ('front.orders.cart', compact('cartItems'));
    }

    public function wishlist(Request $request)
    {
        $cartItems = Cart::instance('wishlist')->content();

        if ($request->has('sortBy')) {
            if($request->sortBy == 2) {
                $cartItems = $cartItems->sortBy('price');
            }
            if($request->sortBy == 3) {
                $cartItems = $cartItems->sortByDesc('price');
            }
        }

        $numberOfWishlistItems = $cartItems->count();

        return view ('front.orders.wishlist', compact('cartItems', 'numberOfWishlistItems'));
    }

    public function addProductToCart(Request $request, $id)
    {
        if ($request->has('qty')){
            $qty = $request->qty;
        } else {
            $qty = 1;
        }

        $product = Product::find($id);

        Cart::instance('shopping')->add($id, $product->name, $qty, $product->price)->associate('App\Product');

        return back();
    }

    public function addProductToWishlist(Request $request, $id)
    {
        $product = Product::find($id);

        Cart::instance('wishlist')->add($id, $product->name, 1, $product->price)->associate('App\Product');

        return back();
    }


    public function updateCart(Request $request, $id)
    {
        if($request->ajax()) {
            if ($request->has('qty')) {
                $result = Cart::instance('shopping')->update($id, $request->qty);
                $total = Cart::subtotal();
                return response()->json(['data'=>$result,'total'=>$total]);
            }
        }

        Cart::instance('shopping')->update($id, $request->qty);

        return back();
    }

    public function deleteProductFromCart($id)
    {
        Cart::instance('shopping')->remove($id);

        return back();
    }

    public function deleteProductFromWishlist($id)
    {
        Cart::instance('wishlist')->remove($id);

        return back();
    }

    public function sendWishlist(Request $request)
    {
        $this->validate($request, [
            'email' => 'email'
        ]);

        \Mail::to($request->email)->send(new Wishlist(Cart::instance('wishlist')->content()));

        return back();
    }
}
