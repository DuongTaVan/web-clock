<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Models\{Attributes, Product, Category};
class FrontendProductController extends Controller
{
    public function index(Request $request){
      
        $paramAtbSearch = $request->except('price','page','k','country');
        $paramAtbSearch = array_values($paramAtbSearch);
        $product = Product::whereRaw(1);
        if(!empty($paramAtbSearch)){
            $product->whereHas('attributes', function($query) use($paramAtbSearch){
                $query->whereIn('pa_attribute_id',$paramAtbSearch);
            });
        }
        
        if($request->k){
            $product->where('pro_name','like','%'.$request->k.'%');
        }
        if($request->country){
            $product->where('pro_country',$request->country);
        }
        // dd($request->country);
        if($request->price){
            $price = $request->price;
            if($price == 6)
                $product->where('pro_price','>',10000000);
            else
                $product->where('pro_price','<=',1000000*$price*2);
            
        }
        $attributes = $this->syncAttributeGroup();
        $product = $product->where('pro_active',1);
        $product = $product->orderBy('id','DESC')->paginate(16);
        $query = $request->query();
        $model_product = new Product();
        //dd($product);
        $country = $model_product->country;
        $viewData = ['attributes'=>$attributes,'product'=>$product,'query'=>$query,'country'=>$model_product->country];
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

    public function productCate(Request $request, $slug){
        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        $paramAtbSearch = $request->except('price');
        $paramAtbSearch = array_values($paramAtbSearch);
        
        $product = Product::where('pro_category_id',$id);
        $product = $product->orderBy('id','DESC');
        //dd($product);
        if($request->k){
            $product->where('pro_name','like','%'.$request->k.'%');
        }
        if($request->country){
            $product->where('pro_country',$request->country);
        }
        if($request->price){
            $price = $request->price;
            if($price == 6)
                $product->where('pro_price','>',10000000);
            else
                $product->where('pro_price','<=',1000000*$price*2);
            
        }
        if(!empty($paramAtbSearch)){
            $product->whereHas('attributes', function($query) use($paramAtbSearch){
                $query->whereIn('pa_attribute_id',$paramAtbSearch);
            });
        }
        $model_product = new Product();
        //dd($model_product);
        $country = $model_product->country;
       // dd($country);

        $attributes = $this->syncAttributeGroup();
        $product = $product->paginate(12);
       // dd($product);
        $viewData = ['attributes'=>$attributes,'product'=>$product,'country'=>$model_product->country];
        return view('frontend.pages.product.index',$viewData);
    }

    public function productCateSearch(Request $request, $slug){
        $paramAtbSearch = $request->except('price');
        $paramAtbSearch = array_values($paramAtbSearch);
        $product = Product::where('pro_name','like','%'.$slug.'%');
        $product = $product->where('pro_active',1)->orderBy('id','DESC');
        if($request->k){
            $product->where('pro_name','like','%'.$request->k.'%');
        }
        if($request->country){
            $product->where('pro_country',$request->country);
        }
        if($request->price){
            $price = $request->price;
            if($price == 6)
                $product->where('pro_price','>',10000000);
            else
                $product->where('pro_price','<=',1000000*$price*2);
            
        }
        $model_product = new Product();
        $country = $model_product->country;
        $product = $product->paginate(12);
    
        $viewData = ['product'=>$product,'country'=>$model_product->country];
        return view('frontend.pages.product.index',$viewData);
    }

}
