<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    protected $table = 'user';
//    protected $connection= 'crm';
    protected $fillable = [
        'name', 'email','phone_number','address' ,'type','password','phone','avatar','remember_token','active', 'created_by', 'updated_by',
    ];
}
