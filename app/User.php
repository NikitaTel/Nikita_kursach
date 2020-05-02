<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthContract
{
    //
    protected $fillable=['login','email','password'];
    use Authenticatable;
}
