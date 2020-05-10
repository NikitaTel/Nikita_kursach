<?php

namespace App\Http\Controllers;

use App\Constructor;
use App\DetailedCart;
use App\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class maskOrderController extends Controller
{
    public function order() {

        $order = new Order([
            'price'=>null,
            'user_id' => Auth::user()->id
        ]);

        $order->save();
        $order_id=$order->id;

        foreach((new CartController)->getCart()->items as $cart) {
            if($cart['item']['id']) {

                $det_order = new DetailedCart([
                    'mask_name' => $cart['item']['mask_name'],
                    'mask_img' => $cart['item']['mask_img'],
                    'mask_qr' => $cart['item']['mask_qr'],

                    'order_id' => $order_id
                ]);

                $det_order->save();
            }
        }

        $order->price=(new CartController)->getCart()->totalPrice;
        $order->save();

//        (new \Illuminate\Contracts\Session\Session)->forget('cart');
        return view('cart-download',['user'=> Auth::user(),'check'=> Auth::check()]);
    }
}
