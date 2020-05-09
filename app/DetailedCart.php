<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailedCart extends Model
{
    protected $fillable=['mask_name','order_id','mask_img','mask_qr'];
}
