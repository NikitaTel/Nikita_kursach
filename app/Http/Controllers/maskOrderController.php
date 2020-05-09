<?php

namespace App\Http\Controllers;

use App\Constructor;
use App\DetailedCart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class maskOrderController extends Controller
{
    public function order() {

        $order = new Order([
            'payment_id' => 'card',
            'user_id' => Auth::user()->id
        ]);
        $order->save();

        $order_id=$order->id;


        foreach((new CartController)->getCart()->items as $cart) {
            if($cart['item']['id']) {

                $det_order = new DetailedCart([
                    'payment_id' => 'card',
                    'mask_name' => $cart['item']['mask_name'],
                    'order_id' => $order_id
                ]);

                $det_order->save();
            }
        }



        return view('cart-download',['user'=> Auth::user(),'check'=> Auth::check()]);

    }
}
