<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Trademark, Category, Event};

class FrontendHomeController extends Controller
{
    public function index(){
        //dd(1);
        
    	$trademarks = Trademark::all();
        $location_1 = Event::where('location','1')->first();
        $location_2 = Event::where('location','2')->first();
        $location_3 = Event::where('location','3')->first();
        //dd($location_1);
    	//dd($trademarks);
    	$product = Product::orderBy('id','DESC')->take(4)->get();
    	$product_hot = Product::where([
					    ['pro_hot', 1],
					    ['pro_active', 1]])->orderBy('id','DESC')->take(4)->get();
    	//dd($product_hot );
    	$diamonds = Category::with('product')->where('c_name','ĐỒNG HỒ DIAMOND D')->first();
        $diamond_items = $diamonds->product->take(4);
        //dd($diamond_items);
    	$philippes = Category::with('product')->where('c_name','ĐỒNG HỒ PHILIPPE AUGUSTE')->orderBy('id','DESC')->first();
        //$philippes = $philippes->product->take(4);
    	$epos = Category::with('product')->where('c_name','ĐỒNG HỒ EPOS SWISS')->orderBy('id','DESC')->first();
        //$epos = $epos->product->take(5);
        //dd($epos);
    	$pens = Category::with('product')->where('c_name','BÚT KÝ CAO CẤP')->orderBy('id','DESC')->first();
        //$pens = $pens->product->take(5);
    	$glasses = Category::with('product')->where('c_name','KÍNH MẮT THỜI TRANG')->orderBy('id','DESC')->first();
        //$glasses = $glasses->product->take(5);
    	//dd($philippes);
    	$data = [
    		'diamonds' =>$diamonds,
    		'epos' =>$epos,
    		'philippes' =>$philippes,
    		'pens' =>$pens,
    		'glasses' =>$glasses,
    		'product' =>$product,
    		'product_hot' => $product_hot,
    		'trademarks' => $trademarks,
            'diamond_items' => $diamond_items,
            'location_1' => $location_1,
            'location_2' => $location_2,
            'location_3' => $location_3
    	];
    	return view('frontend.pages.home.index',$data);
    }
}
