<?php

namespace App\Http\Controllers\Admin;

use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products_sale = OrderDetail::select('order_detail.product_id', 'product.product_name', 'product.product_image', 'product.product_price')
            ->selectRaw('SUM(order_detail.quantity) as product_quantity')
            ->leftJoin('order', 'order_detail.order_id', 'order.id')
            ->leftJoin('product', 'order_detail.product_id', 'product.id')
            ->where('order.status', ORDER_THANH_CONG)
            ->groupBy('order_detail.product_id', 'product.product_name', 'product.product_image', 'product.product_price')
            ->orderBy('product_quantity', 'desc')
            ->get();
        return view('admin.statistical.product_sale', compact('products_sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_new()
    {
        $products_new = Product::select('product.*', 'product_category.name')
            ->selectRaw('SUM(product_detail.quantity) as total_quantity')
            ->leftJoin('product_category', 'product_category.id', 'product.product_category')
            ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
            ->groupBy('product.id', 'product.product_name', 'product.product_category', 'product.product_price_discount', 'product.product_image4', 'product.product_image', 'product.product_image2', 'product.product_image3', 'product.product_active', 'product.product_color', 'product.product_origin', 'product.product_title', 'product.product_desc', 'product.product_price', 'product.created_at', 'product.updated_at', 'product_category.name')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        return view('admin.statistical.product_new', compact('products_new'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
