<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\{Category};

class AdminCategoryController extends Controller
{
    public function index(){
    	$category = Category::paginate(10);

    	return view('admin.category.index', compact('category'));
    }
    public function create(){
    	return view('admin.category.create');
    }
    public function store(AdminRequestCategory $Request)
    {
        $category = new Category;
        $category->c_name = $Request->c_name;
        $category->c_slug = Str::slug($Request->c_name);
        $category->created_at = Carbon::now();
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function active($id){
    	$category = Category::find($id);
    	$category->c_status =! $category->c_status;
    	$category->save();
    	return redirect()->back();
    }
    public function hot($id){
    	$category = Category::find($id);
    	$category->c_hot =! $category->c_hot;
    	$category->save();
    	return redirect()->back();
    }
    public function edit($id){
    	$category = Category::find($id);
    	return view('admin.category.update', compact('category'));
    }
    public function update(AdminRequestCategory $Request,$id){
    	$category =  Category::find($id);
        $category->c_name = $Request->c_name;
        $category->c_slug = Str::slug($Request->c_name);
        $category->created_at = Carbon::now();
        $category->save();
        return redirect()->route('admin.category.index')->with('thongbao','Sửa thành công!');
    }
    public function delete($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect()->back();
    }
}
