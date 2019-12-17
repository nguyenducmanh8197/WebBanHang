<?php

namespace App\Http\Controllers;

use App\Model\OrderNumber;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $order_number;

    public function __construct(OrderNumber $order_number)
    {

        $this->order_number = $order_number;
    }

    function setErrorValidation($validator, $field, $message)
    {
        $validator->after(function ($validator) use ($field, $message) {
            $validator->errors()->add($field, $message);
        });
    }

    public function _number_code()
    {
        $date_now = date('ym');
        $order_number = OrderNumber::whereNotNull('id')->first();
        if ($order_number) {
            if ($order_number['month'] != $date_now) {
                $data_number['month'] = $date_now;
                $data_number['order_number'] = 1;
            } else {
                // không thỳ tăng lên 1
                $data_number['order_number'] = $order_number['order_number'] + 1;
            }
            OrderNumber::find($order_number->id)->update($data_number);
//            $this->order_number->update_model($order_number['id'], $data_number);
        } else {
//            tạo mới
            $data_number['order_number'] = 1;
            $data_number['month'] = $date_now;

            $order_number = new OrderNumber();
            $order_number->order_number = 1;
            $order_number->month = $date_now;
            $order_number->save();
        }

        return $data_number['order_number'];
    }

}
