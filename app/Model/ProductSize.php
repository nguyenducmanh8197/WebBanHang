<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_size';
//    protected $connection= 'crm';
    protected $fillable = [
        'name', 'active','created_at','updated_at'
    ];
}
