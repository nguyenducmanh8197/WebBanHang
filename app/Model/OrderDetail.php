<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
//    protected $connection= 'crm';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    protected $fillable = [
         'product_id', 'order_id', 'quantity','size','price', 'created_time','updated_time',
    ];
}
