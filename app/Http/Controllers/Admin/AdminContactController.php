<?php

namespace App\Http\Controllers\Admin;

use App\Model\Contact;
use App\Model\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::select('contact.*')
            ->first();
        return view('admin.contact.create',compact('contact'));
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
        $validator =Validator ::make($request->all(),[
            'address'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
        ],[
            'address.required'=>'Địa chỉ không được để trống',
            'phone_number.required'=>'Số điện thoại không được để trống',
            'email.required'=>'Email không được để trống',
        ]);
        if($validator->fails()){
            return redirect()->route('contact-admin.detail')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $contact= Contact::find($id);
            $contact->address = $request->input('address');
            $contact->phone_number = $request->input('phone_number');
            $contact->email = $request->input('email');
//
            $contact->save();
//
            return redirect()->route('contact-admin.detail');
        }
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
