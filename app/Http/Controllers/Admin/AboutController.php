<?php

namespace App\Http\Controllers\Admin;

use App\Model\About;
use App\Model\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AboutController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'image'=>'required|mimes:jpeg,png,jpg|max:10000',
            'title'=>'required|max:500',
            'content'=>'required',
        ],[
            'image.required'=>'Ảnh không được để rỗng',
            'image.max'=>'Ảnh quá lớn',
            'image.image'=>'Ảnh không hợp lệ',
            'title.required'=>'Tiêu đề không được để trống',
            'title.max'=>'Tiêu đề quá dài',
            'content.required'=>'Nội dung không được để trống',
        ]);
        if($validator->fails()){
            return redirect()->route('slide.create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $about =new About();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                $about->image = 'storage/images/' . $fileName;
//                $image->position = $position->max_position ? ++ $position->max_position : 1;

            }
            $about->title = $request->input('title');
            $about->content = $request->input('content');
//
            $about->save();
//
            return redirect()->route('about.index');
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
        $abouts = About::find($id);
        return $this->render('admin.about.edit',compact('abouts'));
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
        $validator = Validator::make($request->all(), [
            'image'=>'required|mimes:jpeg,png,jpg|max:10000',
            'title'=>'required|max:500',
            'content'=>'required',
        ], [
            'image.required'=>'Ảnh không được để rỗng',
            'image.max'=>'Ảnh quá lớn',
            'image.image'=>'Ảnh không hợp lệ',
            'title.required'=>'Tiêu đề không được để trống',
            'title.max'=>'Tiêu đề quá dài',
            'content.required'=>'Nội dung không được để trống',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $about = About::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                $about->image = 'storage/images/' . $fileName;

            }
            $about->title = $request->input('title');
            $about->content = $request->input('content');
            $about->save();
            return redirect()->route('about.index');
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
        $about = Slide::find($request->input('id'));
        if(!$about){
            return response()->json(['status' => 0],404);
        }
        else{
            DB::beginTransaction();
            try{
                $response= $about->delete();
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
        $about = About::find($request->input('id'));
        $about->active = $request->input('active');
        $about->save();

        return response()->json(['status' => 1], 200);
    }
}
