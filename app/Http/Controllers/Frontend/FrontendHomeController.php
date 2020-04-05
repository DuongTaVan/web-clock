<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product};
class FrontendHomeController extends Controller
{
    public function index(){
    	
    	$product = Product::orderBy('id','DESC')->take(4)->get();
    	$product_hot = Product::where([
    ['pro_hot', 1],
    ['pro_active', 1]])->take(4)->get();
    	//dd($product_hot );
    	return view('frontend.pages.home.index', compact('product','product_hot'));
    }
}
