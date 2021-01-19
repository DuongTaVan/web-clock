<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\{Slide};
class AdminSlideController extends Controller
{
    public function index(){
    	$slides = Slide::paginate(10);
    	//dd($slides);
    	return view('admin.slide.index', compact('slides'));
    }
    public function create(){
    	return view('admin.slide.create');
    }
    public function store(Request $request){
    	//dd(1);
    	$slide = new Slide;
    	$slide->s_name = $request->s_name;
    	//dd($request->trm_name);
    	$slide->s_slug = Str::slug($request->s_name);
    	
    	//dd($request->location);
    	if ($request->hasFile('image')) {
			//dd(1);
            $file = $request->image;
            $file_name = Str::slug($request->s_name).'.'.$file->getClientOriginalExtension();
           // dd($file_name);
            $file->move(public_path('images/slide/'), $file_name);
            $slide->s_image = 'images/slide/' . $file_name;
            $image = Image::make(public_path('images/slide/'.$file_name))->fit($width = 1349, $height = 289);
            $image->save();
        }
        //dd(2);
    	$slide->save();
    	return redirect()->route('admin.slide.index');
    }
    public function active($id){
    	$slide = Slide::find($id);
    	$slide->s_active =! $slide->s_active;
    	$slide->save();
    	return redirect()->back();
    }
    public function hot($id){
    	$slide = slide::find($id);
    	$slide->s_hot =! $slide->s_hot;
    	$slide->save();
    	return redirect()->back();
    }
    public function edit($id){
    	$slide = Slide::find($id);
    	return view('admin.slide.update', compact('slide'));
    }
    public function update(Request $request, $id){
    	//dd(1);
    	$slide =  Slide::find($id);
    	$slide->s_name = $request->s_name;
    	//dd($request->trm_name);
    	$slide->s_slug = Str::slug($request->s_name);
    	
    	if ($request->hasFile('image')) {
    		if ($slide->s_image) {
                $old_image = $slide->s_image;
                unlink($old_image);
            }
			//dd(1);
            $file = $request->image;
            $file_name = Str::slug($request->s_name).'.'.$file->getClientOriginalExtension();
           // dd($file_name);
            $file->move(public_path('images/slide/'), $file_name);
            $slide->s_image = 'images/slide/' . $file_name;
            $image = Image::make(public_path('images/slide/'.$file_name))->fit($width = 1349, $height = 289);
            $image->save();
        }
        //dd(2);
    	$slide->save();
    	return redirect()->route('admin.slide.index');
    }
    public function delete($id)
    {
        $slide = Slide::find($id);
        if ($slide->s_image) {
            if (file_exists($slide->s_image)){
                $old_image = $slide->s_image;
                unlink(public_path($old_image));
            }
        }
        $slide->delete();
        
        return redirect()->route('admin.slide.index');
    }
}
