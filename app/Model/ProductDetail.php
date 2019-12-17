<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_detail';
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'size_id','quantity',
    ];

    public function getByProductId($product_id){
        return $this->select('product_detail.*','product_size.name as name_size')
            ->where('product_id',$product_id)
            ->leftJoin('product_size','product_size.id','product_detail.size_id')
            ->get();
    }


}
