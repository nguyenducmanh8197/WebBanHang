<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductDetail;
use App\Model\ProductSize;
use App\Model\Slide;
use Illuminate\Http\Request;

class FrontendProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = 2;
        $products = Product::select('product.*', 'product_category.code')
            ->leftJoin('product_category', 'product_category.id', 'product.product_category')
            ->where('product_active', 1);
        if ($request->has('keyword')) {
            $products->where('product_name', 'like', "%$request->keyword%");
        }
        $products = $products->paginate(8);
        $productSizes = ProductSize::select('product_size.*')
            ->where('active', 1)
            ->get();
        $productCategorys = ProductCategory::select('product_category.*')
            ->where('active', 1)
            ->limit(6)
            ->get();
        $slides = Slide::select('slide.*')
            ->where('active', 1)
            ->orderBy('updated_at', 'desc')
            ->limit(3)
            ->get();
        $keyword = $request->input('keyword');
        return view('frontend.product.index', compact('products', 'slides', 'productCategorys', 'productSizes', 'keyword','page'));
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
        $page = 5;
        $product_detail = Product::select('product.*')
            ->leftJoin('product_detail', 'product.id', 'product_detail.product_id')
            ->where('product.id', $id)
            ->first();
        $product_size = Product::select('product_detail.size_id', 'product_size.name')
            ->leftJoin('product_detail', 'product.id', 'product_detail.product_id')
            ->leftJoin('product_size', 'product_size.id', 'product_detail.size_id')
            ->where('product.id', $id)
            ->where('product_detail.quantity', '>', 0)
            ->get();
        $product_relate = Product::select('product.*')
            ->where('id','!=',$id)
            ->where('product.product_category',$product_detail->product_category)
            ->orderBy('id','desc')
            ->limit(4)
            ->get();
        return view('frontend.product.productDetail', compact('product_detail', 'product_size','product_relate','page'));
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
