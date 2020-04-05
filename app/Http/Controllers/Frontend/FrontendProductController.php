<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Attributes, Product};
class FrontendProductController extends Controller
{
    public function index(Request $request){
        $paramAtbSearch = $request->except('price');
        //dd($paramAtbSearch);
        $paramAtbSearch = array_values($paramAtbSearch);
        //dd($paramAtbSearch);
        $product = Product::whereRaw(1);
        
        if($request->price){
            $price = $request->price;
            if($price == 6)
                $product->where('pro_price','>',10000000);
            else
                $product->where('pro_price','<=',1000000*$price*2);
            
        }
    	$attributes = $this->syncAttributeGroup();
        $product = $product->where('pro_active',1);
        $product = $product->orderBy('id','DESC')->paginate(12);
    	//dd($product);
    	$viewData = ['attributes'=>$attributes,'product'=>$product];
    	return view('frontend.pages.product.index',$viewData);
    }
    public function syncAttributeGroup(){
    	$attributes = Attributes::get();
    	$groupAttribute = [];
    	foreach($attributes as $key =>$attribute){
    		$key = $attribute->getType($attribute->atb_type)['name'];
    		//dd($attribute->toArray());
    		$groupAttribute[$key][]= $attribute->toArray();
    	}
    	return $groupAttribute;
    }

}
