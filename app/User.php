<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthContract,CanResetPasswordContract
{
    protected $fillable=['login','city','password','city_to', 'phone_number', 'sender', 'email', 'name', 'mark', 'mark_count', 'mark_summary'];
    use Authenticatable, CanResetPassword;
}
