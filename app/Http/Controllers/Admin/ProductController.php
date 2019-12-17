<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductDetail;
use App\Model\ProductSize;
use App\Model\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ProductController extends BaseController
{
    protected $model;
    protected $product_detail;


    public function __construct(Product $model, ProductDetail $product_detail)
    {
        $this->model = $model;
        $this->product_detail = $product_detail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::select('product.*', 'product_category.name')
            ->selectRaw('SUM(product_detail.quantity) as total_quantity')
            ->leftJoin('product_category', 'product_category.id', 'product.product_category')
            ->leftJoin('product_detail','product_detail.product_id','product.id')
            ->groupBy('product.id','product.product_name','product.product_category','product.product_price_discount','product.product_image4','product.product_image','product.product_image2','product.product_image3','product.product_active','product.product_color','product.product_origin','product.product_title','product.product_desc','product.product_price','product.created_at','product.updated_at','product_category.name')
            ->orderBy('id', 'desc');
        $productCategorys = ProductCategory::all();
        if ($request->has('keyword')) {
            $products->where('product_name', 'like', "%$request->keyword%");
        }
        if ($request->has('active') && $request->input('active') != -1) {
            $products->where('product_active', $request->input('active'));
        }
        if ($request->has('product_category') && $request->input('product_category') != -1) {
            $products->where('product_category', $request->input('product_category'));
        }
        $products = $products->paginate(5);
        $keyword = $request->input('keyword');
        $active = $request->input('active');
        $product_category = $request->input('product_category');
        return $this->render('admin.product.index', compact('products', 'keyword', 'active', 'productCategorys', 'product_category'));
    }

    function _render_update($products = null, $product_categorys = null, $sizes = null)
    {
        return view('admin.product.create', compact('products', 'product_categorys', 'sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categorys = ProductCategory::all();
        $sizes = ProductSize::all();
        return $this->_render_update(null, $product_categorys, $sizes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_image' => 'required|mimes:jpeg,png,jpg|image|max:10000',
            'product_image2' => 'required|mimes:jpeg,png,jpg|image|max:10000',
            'product_image3' => 'required|mimes:jpeg,png,jpg|image|max:10000',
            'product_image4' => 'required|mimes:jpeg,png,jpg|image|max:10000',
            'product_category' => 'required',
            'product_name' => 'required|max:500',
            'product_desc' => 'required',
            'product_title' => 'required|max:250',
            'product_color' => 'required|max:250',
            'product_origin' => 'required|max:250',
            'product_price' => 'required',
        ], [
            'product_image.required' => 'Ảnh không được để rỗng',
            'product_image.max' => 'Ảnh quá lớn',
            'product_image.image' => 'Ảnh không hợp lệ',
            'product_image2.required' => 'Ảnh không được để rỗng',
            'product_image2.max' => 'Ảnh quá lớn',
            'product_image2.image' => 'Ảnh không hợp lệ',
            'product_image3.required' => 'Ảnh không được để rỗng',
            'product_image3.max' => 'Ảnh quá lớn',
            'product_image3.image' => 'Ảnh không hợp lệ',
            'product_image4.required' => 'Ảnh không được để rỗng',
            'product_image4.max' => 'Ảnh quá lớn',
            'product_image4.image' => 'Ảnh không hợp lệ',
            'product_category.required' => 'Loại sản phẩm không được để trống',
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_desc.required' => 'Mô tả  không được để trống',
            'product_title.required' => 'Tiêu đề không được để trống',
            'product_origin.required' => 'Xuất xứ không được để trống',
            'product_color.required' => 'Màu không được để trống',
            'product_price.required' => 'Giá không được để trống',
        ]);
        if ($validator->fails()) {
            return redirect()->route('product.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->input('product_name')) {
                $check = $this->model->getByName($request->input('product_name'), $request->input('product_category'));
                if ($check) {
                    return redirect()->route('product.edit', $check->id);
                } else {
                    $product = new Product();
                    if ($request->hasFile('product_image')) {
                        $file = $request->file('product_image');
                        $fileName = $file->getClientOriginalName();
                        $file->storeAs('public/images', $fileName);
                        $product->product_image = 'storage/images/' . $fileName;
                    }
                    if ($request->hasFile('product_image2')) {
                        $file = $request->file('product_image2');
                        $fileName = $file->getClientOriginalName();
                        $file->storeAs('public/images', $fileName);
                        $product->product_image2 = 'storage/images/' . $fileName;
                    }
                    if ($request->hasFile('product_image3')) {
                        $file = $request->file('product_image3');
                        $fileName = $file->getClientOriginalName();
                        $file->storeAs('public/images', $fileName);
                        $product->product_image3 = 'storage/images/' . $fileName;

                    }
                    if ($request->hasFile('product_image4')) {
                        $file = $request->file('product_image4');
                        $fileName = $file->getClientOriginalName();
                        $file->storeAs('public/images', $fileName);
                        $product->product_image4 = 'storage/images/' . $fileName;

                    }
                    $product->product_category = $request->input('product_category');
                    $product->product_name = $request->input('product_name');
                    $product->product_desc = $request->input('product_desc');
                    $product->product_title = $request->input('product_title');
                    $product->product_color = $request->input('product_color');
                    $product->product_origin = $request->input('product_origin');
                    $product->product_price = $request->input('product_price');
                    $product->product_price_discount = $request->input('product_price_discount');
                    $product->save();
                }
            }
            return redirect()->route('product.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $products['detail'] = $this->product_detail->getByProductId($id);
        $product_categorys = ProductCategory::all();
        $sizes = ProductSize::all();
        return $this->_render_update($products, $product_categorys, $sizes);
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
//        dd($request);
        $validator = Validator::make($request->all(), [
            'product_image' => 'mimes:jpeg,png,jpg|image|max:10000',
            'product_image2' => 'mimes:jpeg,png,jpg|image|max:10000',
            'product_image3' => 'mimes:jpeg,png,jpg|image|max:10000',
            'product_image4' => 'mimes:jpeg,png,jpg|image|max:10000',
            'product_category' => 'required',
            'product_name' => 'required|max:500',
            'product_desc' => 'required',
            'product_title' => 'required|max:250',
            'product_price' => 'required',
            'product_color' => 'required|max:250',
            'product_origin' => 'required|max:250',
        ], [
            'product_image.max' => 'Ảnh quá lớn',
            'product_image.image' => 'Ảnh không hợp lệ',
            'product_image2.max' => 'Ảnh quá lớn',
            'product_image2.image' => 'Ảnh không hợp lệ',
            'product_image3.max' => 'Ảnh quá lớn',
            'product_image3.image' => 'Ảnh không hợp lệ',
            'product_image4.max' => 'Ảnh quá lớn',
            'product_image4.image' => 'Ảnh không hợp lệ',
            'product_category.required' => 'Loại sản phẩm không được để trống',
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_desc.required' => 'Mô tả  không được để trống',
            'product_title.required' => 'Tiêu đề  không được để trống',
            'product_price.required' => 'Giá không được để trống',
            'product_origin.required' => 'Xuất xứ không được để trống',
            'product_color.required' => 'Màu không được để trống',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $product = Product::find($id);
            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                $product->product_image = 'storage/images/' . $fileName;
            }
            if ($request->hasFile('product_image2')) {
                $file = $request->file('product_image2');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                $product->product_image2 = 'storage/images/' . $fileName;
            }
            if ($request->hasFile('product_image3')) {
                $file = $request->file('product_image3');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                $product->product_image3 = 'storage/images/' . $fileName;

            }
            if ($request->hasFile('product_image4')) {
                $file = $request->file('product_image4');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                $product->product_image4 = 'storage/images/' . $fileName;

            }
            $product->product_category = $request->input('product_category');
            $product->product_name = $request->input('product_name');
            $product->product_desc = $request->input('product_desc');
            $product->product_title = $request->input('product_title');
            $product->product_color = $request->input('product_color');
            $product->product_origin = $request->input('product_origin');
            $product->product_price = $request->input('product_price');
            $product->product_price_discount = $request->input('product_price_discount');
            $product->save();
            return redirect()->route('product.edit', $id)->with('flash_message','Cập nhật sản phẩm thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->input('id'));
        if (!$product) {
            return response()->json(['status' => 0], 404);
        } else {
            DB::beginTransaction();
            try {
                $response = $product->delete();
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                DB::rollBack();
                return response()->json(['status' => 0], 404);
            }
            if ($response) {
                return response()->json(['status' => 1], 200);
            } else {
                return response()->json(['status' => 0], 404);
            }

        }
    }
    public function delete_size(Request $request)
    {
        $product_detail = ProductDetail::find($request->input('id'));
        if (!$product_detail) {
            return response()->json(['status' => 0], 404);
        } else {
            DB::beginTransaction();
            try {
                $response = $product_detail->delete();
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                DB::rollBack();
                return response()->json(['status' => 0], 404);
            }
            if ($response) {
                return response()->json(['status' => 1], 200);
            } else {
                return response()->json(['status' => 0], 404);
            }

        }
    }

    public function update_status(Request $request)
    {
        $product = Product::find($request->input('id'));
        $product->product_active = $request->input('product_active');
        $product->save();

        return response()->json(['status' => 1], 200);
    }


    public function create_size(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|int',
        ], [
            'quantity.required' => 'Số lượng không được để rỗng',
            'quantity.int' => 'Số lượng phải là kiểu số',

        ]);
        if ($validator->fails()) {
            return redirect()->route('product.create_size')
                ->withErrors($validator)
                ->withInput();
        }
        $size_id = ProductDetail::where('product_id', $request->input('product_id'))
            ->where('size_id', $request->input('size_id'))
            ->first();
        if ($size_id) {
            ProductDetail::where('product_id', $request->input('product_id'))
                ->where('size_id', $request->input('size_id'))
                ->update([
                    'quantity' => $size_id->quantity + $request->input('quantity'),
                ]);
            return response()->json(['status' => 1], 200);
        } else {
            $detail = new ProductDetail();
            $detail->product_id = $request->input('product_id');
            $detail->size_id = $request->input('size_id');
            $detail->quantity = $request->input('quantity');
            $detail->save();
            return response()->json(['status' => 1], 200);
        }
        return response()->json(['status' => 0], 200);

    }

    public function readyDetailProduct(Request $request)
    {
        $products = Product::find($request->input('id'));
        $products['detail'] = $this->product_detail->getByProductId($request->input('id'));
        $html = View::make('admin.product.product_size', compact('products'))->render();
        return response()->json(['status' => 1, 'view' => $html], 200);
    }
}
