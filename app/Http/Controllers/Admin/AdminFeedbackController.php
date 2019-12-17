<?php

namespace App\Http\Controllers\Admin;

use App\Model\About;
use App\Model\Feedback;
use App\Model\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::select('feedback.*')
            ->orderBy('id', 'desc');
        $feedbacks = $feedbacks->paginate(10);
        return view('admin.feedback.index', compact('feedbacks'));
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
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'desc' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'desc.required' => 'Vui lòng nhập nội dung',
        ]);
        if ($validator->fails()) {
            return redirect()->route('frontend_contact.index')->with('flash_message_er', 'Bạn đã gủi yêu cầu không thành công')
                ->withErrors($validator)
                ->withInput();
        } else {
            $feedback = new Feedback();
            $feedback->email = $request->input('email');
            $feedback->desc = $request->input('desc');
//
            $feedback->save();
//
            return redirect()->route('frontend_contact.index')->with('flash_message', 'Bạn đã gủi yêu cầu thành công');
        }
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
