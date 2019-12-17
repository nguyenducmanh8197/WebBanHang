<?php

namespace App\Http\Controllers\Admin;

use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::select('order.*','users.name as customer_name')
            ->leftJoin('users','users.id','order.customer_id')
            ->orderBy('order.updated_time', 'desc');
        $order = $order->paginate(10);
        return view('admin.order.index',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_number = OrderDetail::where('order_id',$id)
            ->select('order_detail.order_id','order.order_number as order_number','order.status as status')
            ->leftJoin('order', 'order_detail.order_id', 'order.id')
            ->first();
        $detail = OrderDetail::where('order_id', $id)
            ->select('order_detail.*', 'product.product_name as product_name','product_size.name as size_name','order.order_number as order_number',
                'product.product_image as product_image')
            ->leftJoin('product', 'product.id', 'order_detail.product_id')
            ->leftJoin('product_size', 'order_detail.size', 'product_size.id')
            ->leftJoin('order', 'order_detail.order_id', 'order.id')
            ->get();
        return view('admin.order.detail',compact('detail','order_number'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $order = Order::find($request->input('order_id'));
        $order->status = $request->input('status');
        $order->save();
        return response()->json(['status' => 1], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
