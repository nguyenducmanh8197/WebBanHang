<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
//    protected $connection= 'crm';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    protected $fillable = [
         'customer_id', 'status', 'order_number','order_desc','created_time', 'updated_time','address_city','phone_number',
    ];
}
