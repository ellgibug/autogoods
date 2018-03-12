<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('shopping')->content();

        foreach ($cartItems as $cartItem){
            if (($cartItem->model->qty > 0) & ($cartItem->model->qty < $cartItem->qty)){
                Cart::instance('shopping')->update($cartItem->rowId, $cartItem->model->qty);
            } elseif ($cartItem->model->qty == 0){
                Cart::instance('shopping')->remove($cartItem->rowId);
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

    }


}
