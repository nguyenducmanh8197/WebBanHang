<?php

namespace App\Http\Controllers\Admin;

use App\Model\Slide;
use App\User;
use App\Web\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SlideController extends BaseController
{
    public function __construct(){
        parent::__construct();
        $this->_slider = 'slider';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return $this->render('admin.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slides = Slide::all();
        return $this->render('admin.slide.create', compact('slides'));
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
            'content'=>'required|max:500',
        ],[
            'image.required'=>'Ảnh không được để rỗng',
            'image.max'=>'Ảnh quá lớn',
            'image.image'=>'Ảnh không hợp lệ',
            'title.required'=>'Tiêu đề không được để trống',
            'title.max'=>'Tiêu đề quá dài',
            'content.required'=>'Nội dung không được để trống',
            'content.max'=>'Nội dung quá dài',
        ]);
        if($validator->fails()){
            return redirect()->route('slide.create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $slide =new Slide();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                $slide->image = 'storage/images/' . $fileName;
//                $image->position = $position->max_position ? ++ $position->max_position : 1;

            }
            $slide->title = $request->input('title');
            $slide->content = $request->input('content');
//
            $slide->save();
//
            return redirect()->route('slide.index');
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
        $slides = Slide::find($id);
        return $this->render('admin.slide.edit',compact('slides'));
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
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title'=> 'max:500',
            'content'=> 'max:500',
        ], [
            'image.image' => 'Ảnh không hợp lệ',
            'title.max' => 'Tiêu đề quá dài',
            'content.max' => 'Tiêu đề quá dài',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $image = Slide::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                $image->image = 'storage/images/' . $fileName;

            }
            $image->title = $request->input('title');
            $image->content = $request->input('content');
            $image->save();
            return redirect()->route('slide.index');
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
        $slide = Slide::find($request->input('id'));
        if(!$slide){
            return response()->json(['status' => 0],404);
        }
        else{
            DB::beginTransaction();
            try{
                $response= $slide->delete();
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
        $slide = Slide::find($request->input('id'));
        $slide->active = $request->input('active');
        $slide->save();

        return response()->json(['status' => 1], 200);
    }
}
