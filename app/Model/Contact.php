<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
//    protected $connection= 'crm';
    protected $fillable = [
        'address', 'phone_number', 'email','created_at', 'updated_at'
    ];
}
