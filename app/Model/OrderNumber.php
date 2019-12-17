<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//use App\Traits\UpdateModelTrait;

class OrderNumber extends Model
{
//    use UpdateModelTrait;

    protected $table = 'order_number';

    public $timestamps = false;

    protected $fillable = ['id', 'order_number', 'month'];


    public function getNum()
    {
        $a = $this->whereNull('id')->first();
        return $a;

    }

    public function update_model($id, array $attributes)
    {
        $result = OrderNumber::find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }


}
