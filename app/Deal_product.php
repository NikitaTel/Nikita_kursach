<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal_product extends Model
{
    public $timestamps = false;
    protected $fillable=['product_description','price','benefit_price'];
}
