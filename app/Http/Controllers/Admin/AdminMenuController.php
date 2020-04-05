<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminMenuRequest;
use Illuminate\Support\Str;
use App\Models\{Menus};
class AdminMenuController extends Controller
{
    public function index(){
    	$menu = Menus::paginate(10);
    	return view('admin.menu.index', compact('menu'));
    }
    public function create(){
    	return view('admin.menu.create');
    }
    public function store(AdminMenuRequest $Request){
        $menu = new Menus;
        $menu->mn_name = $Request->mn_name;
        $menu->mn_slug = Str::slug($Request->mn_name);
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function active($id){
    	$menu = Menus::find($id);
    	$menu->mn_status =! $menu->mn_status;
    	$menu->save();
    	return redirect()->back();
    }
    public function hot($id){
    	$menu = Menus::find($id);
    	$menu->mn_hot =! $menu->mn_hot;
    	$menu->save();
    	return redirect()->back();
    }
    public function edit($id){
    	$menu = Menus::find($id);
    	return view('admin.menu.update', compact('menu'));
    }
    public function update(AdminMenuRequest $Request,$id){
    	$menu =  Menus::find($id);
        $menu->mn_name = $Request->mn_name;
        $menu->mn_slug = Str::slug($Request->mn_name);
        $menu->save();
        return redirect()->route('admin.menu.index')->with('thongbao','Sửa thành công!');
    }
    public function delete($id){
    	$menu = Menus::find($id);
    	$menu->delete();
    	return redirect()->back();
    }
}
