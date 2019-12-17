<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
//    protected $connection= 'crm';
    protected $fillable = [
         'name', 'email', 'password','phone_number','remember_token','active', 'created_at', 'updated_at',
    ];
}
