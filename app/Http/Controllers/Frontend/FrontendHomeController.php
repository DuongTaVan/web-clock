<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Trademark, Category};
class FrontendHomeController extends Controller
{
    public function index(){
    	$trademarks = Trademark::all();
    	//dd($trademarks);
    	$product = Product::orderBy('id','DESC')->take(4)->get();
    	$product_hot = Product::where([
					    ['pro_hot', 1],
					    ['pro_active', 1]])->take(4)->get();
    	//dd($product_hot );
    	$diamonds = Category::with('product')->where('c_name','ĐỒNG HỒ DIAMOND D')->orderBy('id','DESC')->first();
    	$philippes = Category::with('product')->where('c_name','ĐỒNG HỒ PHILIPPE AUGUSTE')->orderBy('id','DESC')->first();
    	$epos = Category::with('product')->where('c_name','ĐỒNG HỒ EPOS SWISS')->orderBy('id','DESC')->first();
    	$pens = Category::with('product')->where('c_name','BÚT KÝ CAO CẤP')->orderBy('id','DESC')->first();
    	$glasses = Category::with('product')->where('c_name','KÍNH MẮT THỜI TRANG')->orderBy('id','DESC')->first();
    	//dd($philippes);
    	$data = [
    		'diamonds' =>$diamonds,
    		'epos' =>$epos,
    		'philippes' =>$philippes,
    		'pens' =>$pens,
    		'glasses' =>$glasses,
    		'product' =>$product,
    		'product_hot' => $product_hot,
    		'trademarks' => $trademarks
    	];
    	return view('frontend.pages.home.index',$data);
    }
}
