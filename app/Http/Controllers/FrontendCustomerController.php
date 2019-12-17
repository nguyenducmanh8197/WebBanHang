<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Model\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class FrontendCustomerController extends Controller
{
    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    function checkEmailCustomer($email)
    {
        $check = Customer::where('email', 'like', "%$email%")
            ->first();
//        dd($check);
        return $check;
    }
    public function sign_up(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống.',
            'password.min' => 'Password tối thiểu 6 ký tự',
            'password_confirm.required' => 'Password confirm không được để trống.',
            'password_confirm.same' => 'Password confirm không đúng.',
        ]);
        $email = $request->input('email');
        $validator->after(function ($validator) use ($email) {
            if ($this->checkEmailCustomer($email)) {
                $validator->errors()->add('email', 'Email đã tồn tại!');
            }
        });
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect('aa')
                ->withErrors($validator)
                ->withInput();
        }
        $email = Customer::where('email',$request->input('email'));
        if($email){
            return response()->json(['status' => 0, 'msg' => 'Email đã tồn tại']);
        }else{
            $customers = new Customer();
            $customers->fill($request->all());
            $customers->password = bcrypt($request->password);
            dd($customers);
            $customers->save();
        }

        return redirect()->route('/');
    }
    public function sign_in(Request $request)
    {

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
        //
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
        //
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
