<?php

namespace App\Model;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $fillable = [
        'product_category', 'product_name', 'product_origin','product_color','product_image', 'product_image2', 'product_image3', 'product_image4','product_desc','product_title' ,'product_price','product_price_discount', 'product_active','created_at','updated_at'
    ];

    public function getByName ($name,$product_category){
        return $this->select('*')
            ->where('product_name',$name)
            ->where('product_category',$product_category)
            ->first();
    }
}
