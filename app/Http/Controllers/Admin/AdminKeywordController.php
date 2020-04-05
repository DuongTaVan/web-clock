<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestKeyword;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\{Keyword};

class AdminKeywordController extends Controller
{
    public function index(){
    	$keyword = Keyword::paginate(10); 
    	return view('admin.keyword.index', compact('keyword'));
    }
    public function create(){
    	return view('admin.keyword.create');
    }
    public function store(AdminRequestKeyword $Request)
    {
    	//dd(1);
        $keyword = new Keyword;
        $keyword->k_name = $Request->k_name;
        $keyword->k_slug = Str::slug($Request->k_name);
        $keyword->k_description = $Request->k_description;
        $keyword->created_at = Carbon::now();
        $keyword->save();
        return redirect()->route('admin.keyword.index');
    }
    public function hot($id){
    	$keyword = Keyword::find($id);
    	$keyword->k_hot =! $keyword->k_hot;
    	$keyword->save();
    	return redirect()->back();
    }
    public function edit($id){
    	$keyword = Keyword::find($id);
    	return view('admin.keyword.update', compact('keyword'));
    }
    public function update(AdminRequestKeyword $Request,$id){
    	$keyword =  Keyword::find($id);
        $keyword->k_name = $Request->k_name;
        $keyword->k_slug = Str::slug($Request->k_name);
        $keyword->k_description = $Request->k_description;
        $keyword->created_at = Carbon::now();
        $keyword->save();
        return redirect()->route('admin.keyword.index')->with('thongbao','Sửa thành công!');
    }
    public function delete($id){
    	$keyword = Keyword::find($id);
    	$keyword->delete();
    	return redirect()->back();
    }
}
