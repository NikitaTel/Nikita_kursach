<?php

namespace App\Http\Controllers;

use App\Cart;
use App\detailedCart;
use App\Http\Requests\ValidateRequest;
use App\Mask;
use Illuminate\Http\Request;
use Session;
class CartController extends Controller
{
    public function addToCart(Request $request, $id) {

        $mask = Mask::find($id);
        $oldCart =Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($mask, $mask->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('gallery');
    }
    public function removeFromCart(Request $request, $id) {

        $mask = Mask::find($id);
        $oldCart =Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->remove($mask, $mask->id);

        $request->session()->put('cart', $cart);

        session()->flash('success',$cart->items[$id]['qty'] );


        if(Session::get('cart')->totalQty ==0) {
            session()->forget('cart');
        }
        return redirect()->route('cart');
    }



    public function getCart() {
        if (!Session::has('cart')) {
            return 'Корзина Пуста';
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return $cart;
    }
}
