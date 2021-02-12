<?php

namespace App\Http\Controllers;

use App\Deal_product;
use App\Partner;
use App\Deal;
use Illuminate\Http\Request;

class MakeADeal extends Controller
{
    public function deal(Request $request, $receiver_id, $sender_id, $city_from) {

        $description = $request->input('description');
        $price = $request->input('price');
        $benefit = $request->input('benefit');
        $city_to = $request->input('city');

        $deal = new Deal();
        $deal->city_to= $city_to;
        $deal->city_from = $city_from;
        $deal->save();

        $partner = new Partner();
        $partner->receiver_id = $receiver_id;
        $partner->sender_id = $sender_id;
        $partner->receiver_status = "confirmed";
        $partner->sender_status = "waiting";
        $partner->save();

        $deal_product = new Deal_product();
        $deal_product->product_description = $description ;
        $deal_product->product_price = $price;
        $deal_product->benefit_price = $benefit;
        $deal_product->save();

        return view('home');
    }
}
