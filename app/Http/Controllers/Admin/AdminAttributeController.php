<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestAttribute;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\{Category,Attributes};
class AdminAttributeController extends Controller
{
    public function index(){
    	$attributes = Attributes::paginate(10);
    	//dd($attributes);
    	//$viewData = ['attributes'=>$attributes];
    	return view('admin.attribute.index', compact('attributes'));
    }
    public function create(){
    	$category = Category::all();
    	return view('admin.attribute.create', compact('category'));
    }
    public function store(AdminRequestAttribute $Request)
    {
    	//dd(1);
        $attribute = new Attributes;
        $attribute->atb_name = $Request->atb_name;
        $attribute->atb_slug = Str::slug($Request->atb_name);
        $attribute->atb_type = $Request->atb_type;
        $attribute->atb_category_id = $Request->atb_category_id;
        $attribute->created_at = Carbon::now();
        $attribute->save();
        return redirect()->route('admin.attribute.index');
    }
    public function edit($id){
    	$attribute = Attributes::find($id);

    	return view('admin.attribute.update', compact('attribute'));
    }
    public function update(AdminRequestAttribute $Request,$id){
    	$attribute =  Attributes::find($id);
        $attribute->atb_name = $Request->atb_name;
        $attribute->atb_slug = Str::slug($Request->atb_name);
        $attribute->atb_type = $Request->atb_type;
        $attribute->atb_category_id = $Request->atb_category_id;
        $attribute->created_at = Carbon::now();
        $attribute->save();
        return redirect()->route('admin.attribute.index')->with('thongbao','Sửa thành công!');
    }
    public function delete($id){
    	$attribute = Attributes::find($id);
    	$attribute->delete();
    	return redirect()->back();
    }
}
