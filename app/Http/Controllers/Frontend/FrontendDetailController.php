<?php

namespace App\Http\Controllers\Frontend;
use App\Services\ProcessViewService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product};
class FrontendDetailController extends Controller
{
    public function index(Request $Request,$slug){
    	$arraySlug = explode('-', $slug);
    	//dd($arraySlug);
    	$id = array_pop($arraySlug);
    	//dd($id);
    	if($id){

    		$product = Product::findOrFail($id);
            ProcessViewService::view('products','pro_view','product',$id);
            $products = Product::where('pro_active',1)->orderBy('id','DESC')->paginate(12);
    		//dd($product);
    		return view('frontend.pages.product_detail.index', compact('product','products'));	
    	}
    	else
    		return view()->route('frontend.home.index');
    	
    }
}
