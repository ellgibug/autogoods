<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Session;

class Order extends Model
{
    protected $table = 'orders';

//    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'person', 'id');
    }

    public static function createOrder()
    {
        $order = new Order();
        $order->number =  \str_random();
        $order->content =  \serialize(Cart::instance('shopping')->content());
        if(Auth::check()){
            $order->person =  Auth::user()->id;
        }
        $order->amount =  Cart::instance('shopping')->subtotal();
        $order->name =  Session::get('name');
        $order->email =  Session::get('email');
        $order->phone =  Session::get('phone');
        $order->comment = \strlen(Session::get('robokassa_info')) > 2 ? Session::get('robokassa_info') : 'Это просто коментарий.';
        $order->delivery =  Session::get('delivery');
        $order->payment =  Session::get('payment');
//        $order->robokassa_info =  isset($robokassa_info) ? $robokassa_info : '';
        $order->status =  1;
        $order->save();
        return $order;
    }
}
