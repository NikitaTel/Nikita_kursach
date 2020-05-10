<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constructor extends Model
{
    protected $fillable=['constructor_description','constructor_status','constructor_price','constructor_image','user_id'];
}
