<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class OrderController extends BaseController
{
    function index (){
        $page = 7;
        if (Session::has('cart')){
            $order = Session::get('cart');
            $total_price = 0;
            $total_price_tax = 0;
//            dd($order);
            foreach ($order as $item){
                $total_price += $item['price'] * intval($item['quantity']);
                $total_price_tax = $total_price + $total_price*5/100;
            }
            return view('frontend.order.index',compact('order','total_price','total_price_tax','page'));
        }
    }

    function update_order_plus(Request $req){
        return $this->_update_order($req,1);
    }
    function update_order_mimus(Request $req){
        return $this->_update_order($req,2);
    }

    function _update_order(Request $request,$type){
        $cart = Session::get('cart');
        $total = 0;
        $total_price = 0;
        $cart_new = [];
        foreach ($cart as $key => $item){
            if($item['id'] == $request->input('id') && $item['size'] == $request->input('size')){
                $item['quantity'] = $type == 1 ? $item['quantity'] + 1 : $item['quantity'] - 1;
                $total = $item['price'] * intval($item['quantity']);
            }
            $cart_new[] = $item;
            $total_price += $item['price'] * intval($item['quantity']);
        }
        $total_price_tax = $total_price + $total_price * (10/100);
        Session::put('cart',$cart_new);
        Session::save();
        return response()->json(['status' => 1, 'total'=>$total,'total_price'=>$total_price,'total_price_tax'=>$total_price_tax]);
    }

    function  remove_product(Request $request){
        $order = Session::get('cart');
        $total_price = 0;
//        $total_price_tax = 0;
        foreach ($order as $key => $item)
        {
            if ($item['id'] == $request->input('id') && $item['size'] == $request->input('size'))
            {
                unset($order[$key]);
                $total_price += $item['price'] * intval($item['quantity']);
//                $total_price_tax = $total_price + $total_price*5/100;
            }
        }

        Session::put('cart',$order);
        return response()->json(['status' => 1]);

    }
}
