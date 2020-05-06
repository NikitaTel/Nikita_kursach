<?php

namespace App;

class Cart
{

    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' =>$item->price, 'item'=> $item];
        if ($this->items) {
            if (array_key_exists($id,$this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->totalQty++;
        $this->totalPrice += $item->price;
        $this->items[$id]=$storedItem;
    }

    public function remove($item, $id) {

        $storedItem = $this->items[$id];


        $this->items[$id]['qty']--;
        $this->items[$id]['price'] = $item->price * $this->items[$id]['qty'];
        $this->totalQty--;
        $this->totalPrice -= $item->price;
        if ($storedItem['qty']==1)
        {
            $this->items[$id]=null;
            session()->forget('cart');

        }
    }
}
