<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends BaseController
{
    public function __construct(){
        parent::__construct();
        $this->_productCategory = 'productCategory';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategorys = ProductCategory::all();
        return $this->render('admin.productCategory.index', compact('productCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategorys = ProductCategory::all();
        return $this->render('admin.productCategory.create', compact('productCategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator ::make($request->all(),[
            'name'=>'required|max:500',
            'code'=>'required|max:500',
        ],[
            'name.required'=>'Tên sản phẩm không được để trống',
            'code.required'=>'Mô tả  không được để trống',
        ]);
        if($validator->fails()){
            return redirect()->route('productCategory.create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $productCategory =new ProductCategory();
            $productCategory->name = $request->input('name');
            $productCategory->code = $request->input('code');
//
            $productCategory->save();
//
            return redirect()->route('productCategory.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategorys = ProductCategory::find($id);
        return $this->render('admin.productCategory.edit', compact('productCategorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator =Validator ::make($request->all(),[
            'name'=>'required|max:500',
            'code'=>'required|max:500',
        ],[
            'name.required'=>'Tên sản phẩm không được để trống',
            'code.required'=>'Code sản phẩm không được để trống',
        ]);
        if($validator->fails()){
            return redirect()->route('productCategory.create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $productCategorys = ProductCategory::find($id);
            $productCategorys->name = $request->input('name');
            $productCategorys->code = $request->input('code');
//
            $productCategorys->save();
//
            return redirect()->route('productCategory.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $productSize = ProductCategory::find($request->input('id'));
        if(!$productSize){
            return response()->json(['status' => 0],404);
        }
        else{
            DB::beginTransaction();
            try{
                $response= $productSize->delete();
                DB::commit();
            }catch(\Exception $e){
                dd($e);
                DB::rollBack();
                return response()->json(['status' => 0],404);
            }
            if ($response){
                return response()->json(['status' => 1],200);
            }
            else{
                return response()->json(['status' => 0],404);
            }

        }
    }
    public function update_status(Request $request){
        $productSize = ProductCategory::find($request->input('id'));
        $productSize->active = $request->input('active');
        $productSize->save();
        return response()->json(['status' => 1], 200);
    }
}
