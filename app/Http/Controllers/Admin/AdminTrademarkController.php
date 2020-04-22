<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\{Trademark};
class AdminTrademarkController extends Controller
{
    public function index(){
    	$trademarks = Trademark::all();
    	//dd($trademarks);
    	return view('admin.trademark.index', compact('trademarks'));
    }
    public function create(){
    	return view('admin.trademark.create');
    }
    public function store(Request $request){
    	//dd(1);
    	$trademark = new Trademark;
    	$trademark->trm_name = $request->trm_name;
    	//dd($request->trm_name);
    	$trademark->trm_slug = Str::slug($request->trm_name);
    	if ($request->hasFile('image')) {
			//dd(1);
            $file = $request->image;
            $file_name = Str::slug($request->trm_name).'.'.$file->getClientOriginalExtension();
           // dd($file_name);
            $file->move(public_path('images/trademark/'), $file_name);
            $trademark->image = 'images/trademark/' . $file_name;
            $image = Image::make(public_path('images/trademark/'.$file_name))->fit($width = 189, $height = 57);
            $image->save();
        }
        //dd(2);
    	$trademark->save();
    	return redirect()->route('admin.trademark.index');
    }
    public function edit($id){
    	$trademark = Trademark::find($id);
    	return view('admin.trademark.update', compact('trademark'));
    }
    public function update(Request $request, $id){
    	//dd(1);
    	$trademark =  Trademark::find($id);
    	$trademark->trm_name = $request->trm_name;
    	//dd($request->trm_name);
    	$trademark->trm_slug = Str::slug($request->trm_name);
    	if ($request->hasFile('image')) {
    		if ($trademark->image) {
                $old_image = $trademark->image;
                unlink($old_image);
            }
			//dd(1);
            $file = $request->image;
            $file_name = Str::slug($request->trm_name).'.'.$file->getClientOriginalExtension();
           // dd($file_name);
            $file->move(public_path('images/trademark/'), $file_name);
            $trademark->image = 'images/trademark/' . $file_name;
            $image = Image::make(public_path('images/trademark/'.$file_name))->fit($width = 189, $height = 57);
            $image->save();
        }
        //dd(2);
    	$trademark->save();
    	return redirect()->route('admin.trademark.index');
    }
    public function delete($id)
    {
        $trademark = Trademark::find($id);
        if ($trademark->image) {
            if (file_exists($trademark->image)){
                $old_image = $trademark->image;
                unlink(public_path($old_image));
            }
        }
        $trademark->delete();
        
        return redirect()->route('admin.trademark.index');
    }
}
