<?php

namespace App\Http\Controllers\Admin;

use App\Model\ProductCategory;
use App\Model\ProductColor;
use App\Model\ProductDetail;
use App\Model\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductSizeController extends BaseController
{
    public function __construct(){
        parent::__construct();
        $this->_productSize = 'productSize';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSizes = ProductSize::paginate(5);
        return $this->render('admin.productSize.index', compact('productSizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productSizes = ProductSize::all();
        return $this->render('admin.productSize.create', compact('productSizes'));
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
        ],[
            'name.required'=>'Tên sản phẩm không được để trống',
        ]);
        if($validator->fails()){
            return redirect()->route('productSize.create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $productSize = new ProductSize();
            $productSize->name = $request->input('name');
//
            $productSize->save();
//
            return redirect()->route('productSize.index');
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
        $productSizes = ProductSize::find($id);
        return $this->render('admin.productSize.edit', compact('productSizes'));
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
        ],[
            'name.required'=>'Tên sản phẩm không được để trống',
        ]);
        if($validator->fails()){
            return redirect()->route('productColor.create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $productSize = ProductSize::find($id);
            $productSize->name = $request->input('name');
//
            $productSize->save();
//
            return redirect()->route('productSize.index');
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
        $productSize = ProductSize::find($request->input('id'));
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
        $productSize = ProductSize::find($request->input('id'));
        $productSize->active = $request->input('active');
        $productSize->save();

        return response()->json(['status' => 1], 200);
    }
}
