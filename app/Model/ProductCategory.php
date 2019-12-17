<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_category';
//    protected $connection= 'crm';
    protected $fillable = [
        'name','code', 'active','created_ad', 'updated_at'
    ];
}
