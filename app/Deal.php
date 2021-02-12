<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    public $timestamps = false;
    protected $fillable=['city_to','city_from'];
}
