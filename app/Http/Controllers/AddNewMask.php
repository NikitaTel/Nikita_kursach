<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMaskRequest;
use Illuminate\Http\Request;
use App\Mask;
class AddNewMask extends Controller
{
    public function add(AddMaskRequest $request)
    {
        $validation = $request->validate([
           'name'=> 'required',
           'category' => 'required',
           'price' => 'required'
        ]);

        $name = $request->input('name');
        $category = $request->input('category');
        $price = $request->input('price');

        $mask = new Mask();
        $mask->mask_name= $name;
        $mask->mask_img = "/images/".$name.".png";
        $mask->mask_qr = "/images/".$name."-qr.gif";
        $mask->category_id = $category;
        $mask->price = $price;

        $mask->save();

        return redirect()->route('profile');
    }
}
