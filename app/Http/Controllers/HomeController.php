<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Model\Contact;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductDetail;
use App\Model\ProductSize;
use App\Model\Slide;
use App\User;
use const http\Client\Curl\AUTH_ANY;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page =1;
        $products = Product::select('product.*', 'product_category.code')
            ->selectRaw('SUM(product_detail.quantity) as product_quantity')
            ->leftJoin('product_category', 'product_category.id', 'product.product_category')
            ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
            ->haVing('product_quantity', '>', 0)
            ->where('product_active', 1)
            ->groupBy('product.id', 'product.product_name', 'product.product_price_discount', 'product.product_image', 'product.product_image2', 'product.product_image3', 'product.product_image4', 'product.product_active', 'product.product_category', 'product.product_color', 'product.product_origin', 'product.product_title', 'product.product_desc', 'product.product_price', 'product.created_at', 'product.updated_at', 'product_category.code')
            ->orderBy('id','desc')
            ->limit(8)
            ->get();
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
        $products_sale = Product::select('product.*', 'product_category.code')
            ->selectRaw('SUM(product_detail.quantity) as product_quantity')
            ->selectRaw('COUNT(order_detail.product_id) as product_top_sale')
            ->leftJoin('product_category', 'product_category.id', 'product.product_category')
            ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
            ->leftJoin('order_detail', 'order_detail.product_id', 'product.id')
            ->leftJoin('order', 'order_detail.order_id', 'order.id')
            ->haVing('product_quantity', '>', 0)
            ->where('product_active', 1)
            ->where('order.status', ORDER_THANH_CONG)
            ->groupBy('product.id', 'product.product_name', 'product.product_price_discount', 'product.product_image', 'product.product_image2', 'product.product_image3', 'product.product_image4', 'product.product_active', 'product.product_category', 'product.product_color', 'product.product_origin', 'product.product_title', 'product.product_desc', 'product.product_price', 'product.created_at', 'product.updated_at', 'product_category.code')
            ->orderBy('product_top_sale','desc')
            ->limit(8)
            ->get();
        $contact = Contact::first();
        return view('frontend.layout.home', compact('products', 'slides', 'productCategorys', 'productSizes','products_sale','page','contact'));
    }

    function add_to_cart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size' => 'required|int',
            'id' => 'required'
        ], [
            'size.required' => 'Vui lòng chọn size',
            'id.required' => 'Vui lòng chọn sản phẩm',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()]);
        } else {
            $product = Product::find($request->input('id'));
            if (!$product) {
                return response()->json(['status' => 0, 'msg' => 'Sản phẩm không tồn tại']);
            } else {
                $size_id = ProductDetail::where('product_id', $request->input('id'))->where('size_id', $request->input('size'))->first();
                if (!$size_id) {
                    return response()->json(['status' => 0, 'msg' => 'Không đủ số lượng']);
                } else {
                    if ($request->input('quantity') > $size_id->quantity) {
                        return response()->json(['status' => 0, 'msg' => 'Không đủ số lượng']);
                    } else if ($request->input('quantity') == 0) {
                        return response()->json(['status' => 0, 'msg' => 'Vui lòng nhập số lượng']);
                    }
                }

            }
            $cart_pre = Session::get('cart');
            $exist = false;
            if(isset($cart_pre)){
                foreach ($cart_pre as $index => $item){
                    if($item['id'] == $request->input('id') && $item['size'] == $request->input('size')){
                        $exist = true;
                        $cart_pre[$index]['quantity'] = $request->input('quantity');
                        break;
                    }
                }
            }
            if (!$exist) {
                $size_name = ProductSize::select('name')->where('id',$request->input('size'))->first()->name;
                $cart_pre[] = [
                    'id' => $product->id,
                    'quantity' => $request->input('quantity'),
                    'size' => $request->input('size'),
                    'size_name' =>$size_name,
                    'image' => $product->product_image,
                    'name' => $product->product_name,
                    'price' => $product->product_price_discount == 0 ? $product->product_price : $product->product_price_discount,
                ];
            }
            Session::put('cart', $cart_pre);
            $cart = Session::get('cart');
            $total = 0;
            $total_quantity = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * intval($item['quantity']);
                $total_quantity += 1;
            }
            $html = View::make('frontend.layout.viewcart', compact('cart', 'total'))->render();
            return response()->json(['status' => 1, 'view' => $html, 'total_quantity' => $total_quantity]);
        }

    }

    function ready_cart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            $total = 0;
            $total_quantity = 0;
            foreach ($cart as $item) {
                $size_name = ProductSize::select('name')->where('id',$item['size'])->first()->name;
                $item['size_name'] = $size_name;
                $total += $item['price'] * intval($item['quantity']);
                $total_quantity += 1;
            }
            $html = View::make('frontend.layout.viewcart', compact('cart', 'total'))->render();
            return response()->json(['status' => 1, 'view' => $html, 'total_quantity' => $total_quantity]);
        } else {
            return response()->json(['status' => 0, 'total_quantity' => 0, 'msg' => 'Bạn chưa có sản phẩm nào']);
        }
    }

    function checkEmailCustomer($email, $id = null)
    {
        $check = User::where('email', $email)
            ->where('type', 0);
        if ($id) {
            $check->where('id', '!=', $id);
        }

//        dd($check);
        return $check->first();
    }

    public function sign_up()
    {
        $page = 6;
        return view('frontend.signInAndSignUp.signUp',compact('page'));
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:8',
            'email_registration' => 'required|email',
            'password_registration' => 'required|min:6',
            'password_confirm_registration' => 'required|same:password_registration'
        ], [
            'name.required' => 'Không được để trống',
            'name.min' => 'Tối thiếu 8 kí tự',
            'email_registration.required' => 'Email không được để trống',
            'email_registration.email' => 'Email không tồn tại',
            'password_registration.required' => 'Mật khẩu không được để trống',
            'password_registration.min' => 'Tối thiểu 6 kí tự',
            'password_confirm_registration.required' => 'Mật khẩu không được để trống',
            'password_confirm_registration.same' => 'Mật khẩu  không chính xác',
        ]);
        $email = $request->input('email');
        $validator->after(function ($validator) use ($email) {
            if ($this->checkEmailCustomer($email)) {
                $validator->errors()->add('email_registration', 'Email đã tồn tại');
            }
        });
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $users = new User();
        $users->fill($request->all());
        $users->password = bcrypt($request->password_registration);
        $users->email = $request->input('email_registration');
        $users->type = 0;
        $users->save();
        return redirect()->back()->with(['succes' => 'Đăng kí thành công']);
    }

    public function sign_in()
    {
        return view('frontend.signInAndSignUp.signIn');
    }

    public function postSign_in(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không chính xác',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $users = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($users)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with(['error' => 'Tài khoản hoặc mật khẩu không chính xác']);
        }
    }

    public function myAccount($id)
    {
        $page = 7;
        $users = User::find($id);
        $order = Order::select('order.*')
            ->where('order.customer_id', $users->id)
            ->orderBy('order.updated_time', 'desc');
        $order = $order->paginate(4);
        foreach ($order as $item) {
            $detail = OrderDetail::where('order_id', $item->id)->select('order_detail.*', 'product.product_name as product_name')
                ->leftJoin('product', 'product.id', 'order_detail.product_id')
                ->first();
            $item['detail']  = $detail;
        }
        return view('frontend.signInAndSignUp.myAccount', compact('users', 'order','page'));
    }
    public function order_detail($id)
    {
        $page = 8;
        $order_number = OrderDetail::where('order_id',$id)
            ->select('order_detail.order_id','order.order_number as order_number')
            ->leftJoin('order', 'order_detail.order_id', 'order.id')
            ->first();
        $detail = OrderDetail::where('order_id', $id)
            ->select('order_detail.*', 'product.product_name as product_name','product_size.name as size_name','order.order_number as order_number',
                'product.product_image as product_image')
            ->leftJoin('product', 'product.id', 'order_detail.product_id')
            ->leftJoin('product_size', 'order_detail.size', 'product_size.id')
            ->leftJoin('order', 'order_detail.order_id', 'order.id')
            ->get();
        $total_amount = 0;
        foreach ($detail as $item){
            $total_amount += $item->price*$item->quantity;
        }
        return view('frontend.order.acc-detail', compact('order_number','detail','page','total_amount'));
    }

    public function updateAccount(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required|max:10',
            'address' => 'required',
            'email' => 'required|email',
        ], [
            'name.required' => 'Tên không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.max' => 'Số điện thoại quá dài',
            'address.required' => 'Địa chỉ không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
        ]);
        $email = $request->input('email');
        if ($email) {
            $check = $this->checkEmailCustomer($email, $id);
            if ($check) {
                $this->setErrorValidation($validator, 'email', 'Email đã tồn tại');
//                $validator->errors()->add('email', 'Email đã tồn tại!');

            }
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $users = User::find($id);
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->phone_number = $request->input('phone_number');
            $users->address = $request->input('address');
            $users->save();
            return redirect()->back();
        }
    }

    public function checkoutCart(Request $request)
    {
        $number_code = $this->_number_code();
        $date_now = date('ym');
        $order_number = 'ORD-' . $date_now . '-' . str_pad($number_code, 4, "0", STR_PAD_LEFT);
        $data = [
            'order_number' => $order_number,
            'customer_id' => Auth::user()->id,
            'status' => ORDER_DAT_HANG,
            'order_desc' => $request->input('desc'),
            'address_city' => $request->input('address_city'),
            'phone_number' => $request->input('phone_number'),
            'created_time' => date('Y-m-d H:i:s'),
            'updated_time' => date('Y-m-d H:i:s'),
        ];
        DB::beginTransaction();
        try {
            $order_master = new Order();
            $response = $order_master->create($data);
            if ($response) {
                $cart = Session::get('cart');
                foreach ($cart as $item) {
                    $detail = new OrderDetail();
                    $detail->insert([
                        'product_id' => $item['id'],
                        'size' => $item['size'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'order_id' => $response->id,
                    ]);
                    $detail = ProductDetail::where('product_id', $item['id'])
                        ->where('size_id', $item['size'])->first();
                    if ($detail) {
                        $detail->update(['quantity' => $detail->quantity - $item['quantity']]);
                    }
                }
                $cart = Session::remove('cart');
            }
            DB::commit();
            return redirect()->route('front_end.my-account', Auth::user()->id);

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back();
        }

    }
}
