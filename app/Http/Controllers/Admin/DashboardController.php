<?php

namespace App\Http\Controllers\Admin;

use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->_sidebar = 'dashboard';
    }

    public function index()
    {
        $total_order = Order::select('*')
            ->count();
        $total_order_sucess = Order::select('*')
            ->where('order.status',ORDER_THANH_CONG)
            ->count();
        $order_sucsess = OrderDetail::select('order_detail.*','order.updated_time as update_at')
                    ->leftJoin('order','order_detail.order_id','order.id')
                    ->where('order.status',ORDER_THANH_CONG)
                    ->get();
        $total_price_sucsess = 0;
        foreach ($order_sucsess as $item){
            $total_price_sucsess+=$item->quantity*$item->price;
        }
        $total_price = OrderDetail::all();
        $total = 0;
        foreach ($total_price as $item){
            $total+=$item->quantity*$item->price;
        }
        $order_process = Order::select('order.*')
            ->whereIn('order.status',[ORDER_DAT_HANG,ORDER_DANG_XU_LY])
            ->orderBy('created_time','desc')
            ->limit(5)
            ->get();
        $labels = [];
        $data = [];
        $order_sucsess_static = OrderDetail::selectRaw('SUM(order_detail.quantity * order_detail.price) as total')
            ->selectRaw("DATE_FORMAT(order.created_time, '%Y-%m-%d') as date_format")
            ->groupBy('date_format')
            ->leftJoin('order','order_detail.order_id','order.id')
            ->where('order.status',ORDER_THANH_CONG)
            ->get();
        foreach ($order_sucsess_static as $value){
            $labels[] = date('d-m-Y)', strtotime($value['date_format']));
            $data[] =  $value->total;
        }
        return $this->render('admin.inc.content', compact('total_order','total_price','total_order_sucess','total','total_price_sucsess','order_process','labels','data'));
    }
}
