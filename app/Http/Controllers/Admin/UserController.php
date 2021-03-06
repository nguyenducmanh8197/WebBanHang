<?php

namespace App\Http\Controllers\Admin;

use App\Model\Slide;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->_sidebar = 'users';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function checkEmailUser($email)
    {
        $check = \App\User::where('email', 'like', "%$email%")
            ->first();
//        dd($check);
        return $check;
    }

    function checkIdUser($id)
    {
        $check = \App\User::where('id', $id)
            ->first();
        return $check;
    }

    public function index(Request $request)
    {
        $users = User::select('*');
        if ($request->has('active') && $request->input('active') != -1) {
            $users->where('active', $request->input('active'));
        }
        if ($request->has('type') && $request->input('type') != -1) {
            $users->where('type', $request->input('type'));
        }
        $active = $request->input('active');
        $type = $request->input('type');
        $users = $users->paginate(10);
        return $this->render('admin.user.index', compact('users','active','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->render('admin.user.create');
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
            'image' => 'mimes:jpeg,png,jpg|max:10000',
            'name' => 'required|min:8|max:20',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'type' => 'required',
            'password_confirm' => 'required|same:password'
        ], [
            'image.max' => 'Ảnh quá lớn',
            'image.image' => 'Ảnh không hợp lệ',
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Tên tối thiểu 8 ký tự',
            'name.max' => 'Tên tối đa 20 ký tự',
            'email.required' => 'Email không được để trống',
            'type.required' => 'Loại không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống.',
            'password.min' => 'Password tối thiểu 6 ký tự',
            'password_confirm.required' => 'Password confirm không được để trống.',
            'password_confirm.same' => 'Password confirm không đúng.',
        ]);
        $email = $request->input('email');
        $validator->after(function ($validator) use ($email) {
            if ($this->checkEmailUser($email)) {
                $validator->errors()->add('email', 'Email đã tồn tại!');
            }
        });

        if ($validator->fails()) {
            return redirect('admin/user/create')
                ->withErrors($validator)
                ->withInput();
        }
        $users = new User();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);
            $users->image = 'storage/images/' . $fileName;
//                $image->position = $position->max_position ? ++ $position->max_position : 1;

        }
        $users->fill($request->all());
        $users->password = bcrypt($request->password);
        $users->type = $request->input('type');
        $users->phone_number = $request->input('phone_number');
        $users->address = $request->input('address');
        $users->save();

        return redirect()->route('user.index');
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
        $user = User::find($id);
        return $this->render('admin.user.edit', compact('user'));
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
        $data = $this->checkIdUser($id);
        if (!$data) {
            throw new ModelNotFoundException();
        }
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'min:8|max:20',
            'email' => 'email',
            'type' => 'required',
        ], [
            'image.image' => 'Ảnh không hợp lệ',
            'name.min' => 'Tên tối thiểu 8 ký tự',
            'name.max' => 'Tên tối đa 20 ký tự',
            'email.email' => 'Email không đúng định dạng',
        ]);
        if ($validator->fails()) {
            return redirect("admin/user/$id/edit")
                ->withErrors($validator)
                ->withInput();
        }
//        dd(date('Y-m-d H:i:s'));
        $users = User::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);
            $users->image = 'storage/images/' . $fileName;

        }
        $users->fill($request->all());
        $users->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $users = User::find($request->input('id'));
        if (!$users) {
            return response()->json(['status' => 0], 404);
        } else {
            DB::beginTransaction();
            try {
                $response = $users->delete();
                DB::commit();
            } catch (\Exception $e) {
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

    public function update_active(Request $request)
    {
        $user_id = Auth::user()->is_root;
        $data = $this->getById($request->input('id'));
        if (!$data) {
            return response()->json(['status' => '0'], 404);
        }
//        if ($user_id != IS_ROOT){
//            throw new ModelNotFoundException();
//        return response()->json(['status' => FAIL], 404);
//        }
        else {
            $user = \App\Model\user::find($request->input('id'));
            $user->active = $request->input('active');
            $user->updated_by = $user_id;
            $response = $user->save();
            if ($response) {
//                session()->flash('notif','Cập nhật mật khẩu thành công.');
                return response()->json(['status' => '1'], 200);
            } else {
                return response()->json(['status' => '1'], 404);
            }
        }
    }

    public function update_status(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->active = $request->input('active');
        $user->save();

        return response()->json(['status' => 1], 200);
    }
}
