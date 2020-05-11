<?php

namespace App\Http\Controllers;

use App\Constructor;
use App\Http\Requests\ConstructorRequest;
use App\Http\Requests\StatusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddConstructorController extends Controller
{
    public function add(ConstructorRequest $request, $id) {
        $image=$request->file('image')->store('orders', 'public');;

        $constructor = new Constructor([
            'constructor_description' => trim($request['description']),
            'constructor_image' => $image,
            'constructor_status' => 'Анализ заказа',
            'constructor_price' => null,
            'user_id' => $id
        ]);

        $constructor->save();

        return redirect()->route('order-mask');
    }

    public function status(StatusRequest $request, $id) {

        $constructor = Constructor::find($id);
        $constructor->constructor_status='Подтверждён';
        $constructor->constructor_price=$request->price;
        $constructor->save();

        return redirect()->route('profile');
    }
}
