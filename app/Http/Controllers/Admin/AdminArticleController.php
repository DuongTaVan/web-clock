<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\{Articles,Menus};
class AdminArticleController extends Controller
{
    public function index(){
    	$articles = Articles::with('menu')->paginate(8); 
    	return view('admin.article.index', compact('articles'));
    }
    public function create(){
    	//$article = Articles::all();
        $menus = Menus::all();
    	return view('admin.article.create', compact('menus'));
	}
    public function store(Request $request){
		
    	$articles = new Articles;
    	$articles->a_name = $request->a_name;
    	$articles->a_slug = Str::slug($request->a_name);
    	$articles->a_description = $request->a_description;
    	$articles->a_menu_id = $request->a_menu_id;
    	$articles->a_content = $request->a_content;
    	if($request->a_avatar){
    		$image = upload_image('a_avatar');
    		if($image['code']==1){
    			$articles->a_avatar = $image['name'];
    		}
    	}
    	$articles->save();
    	return redirect()->route('admin.article.index');
	}
	public function active($id){
    	$articles = Articles::find($id);
    	$articles->a_active =! $articles->a_active;
    	$articles->save();
    	return redirect()->back();
    }
    public function hot($id){
    	$articles = Articles::find($id);
    	$articles->a_hot =! $articles->a_hot;
    	$articles->save();
    	return redirect()->back();
	}
	public function edit($id){
		$article = Articles::find($id);
        $menus = Menus::all();
        return view('admin.article.update',compact('menus','article'));
	}
	public function update(Request $request, $id){
		$articles = Articles::find($id);
    	$articles->a_name = $request->a_name;
    	$articles->a_slug = Str::slug($request->a_name);
    	$articles->a_description = $request->a_description;
    	$articles->a_menu_id = $request->a_menu_id;
    	$articles->a_content = $request->a_content;
    	if($request->a_avatar){
    		$image = upload_image('a_avatar');
    		if($image['code']==1){
    			$articles->a_avatar = $image['name'];
    		}
    	}
    	$articles->save();
    	return redirect()->route('admin.article.index');
	}
	public function delete($id){
		//dd(2);
    	$articles = Articles::find($id);
    	$articles->delete();
    	return redirect()->back();
    }
}
