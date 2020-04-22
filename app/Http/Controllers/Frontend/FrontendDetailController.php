<?php

namespace App\Http\Controllers\Frontend;
use App\Services\ProcessViewService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Product, Rating, Comment, RepComment, ProductImage};

class FrontendDetailController extends Controller
{
    public function index(Request $Request,$slug){
        
    	$arraySlug = explode('-', $slug);
    	//dd($arraySlug);
    	$id = array_pop($arraySlug);
    	//dd($id);
    	if($id){
            $product_images = ProductImage::with('product')->where('pi_product_id',$id)->get();
           // dd($product_images);
    		$product = Product::findOrFail($id);
            ProcessViewService::view('products','pro_view','product',$id);
            $products = Product::where('pro_active',1)->orderBy('id','DESC')->paginate(12);
            $ratings = Rating::with('user:id,name')->where('r_product_id',$id)->orderByDesc('id')->limit(5)->get();
            $comments = Comment::with('user:id,name')->where('cmt_product_id',$id)->orderByDesc('id')->limit(5)->get();
            $rep_comments = RepComment::with('user:id,name')->where('rcmt_product_id',$id)->orderByDesc('id')->limit(5)->get();
            $ratingsDashboard = Rating::groupBy('r_number')->where('r_product_id',$id)->select(\DB::raw('count(r_number) as count_number'),\DB::raw('sum(r_number) as total'))->addSelect('r_number')->get()->toArray();
            //dd($ratingsDashboard);
            $ratingDefault = $this->mapRatingDefault();
            //dd($ratingDefaultt);
    		foreach ($ratingsDashboard as $key => $item) {
                $ratingDefault[$item['r_number']] = $item;
            }
             //dd($ratingDefault);
    		return view('frontend.pages.product_detail.index', compact('product','products','ratings','ratingDefault','comments','rep_comments','product_images'));	
    	}
    	else
    		return view()->route('frontend.home.index');
    	
    }
    private function mapRatingDefault(){
        $ratingDefault = [];
        for($i = 1; $i<=5; $i++){
            $ratingDefault[$i] = [
                'count_number'=>0,
                'total'=>0,
                'r_number'=>0
            ];

        }
        return $ratingDefault;
    }
    public function getRating(Request $request, $slug){
        $arraySlug = explode('-', $slug);
        //dd($arraySlug);
        $id = array_pop($arraySlug);
        //dd($id);
        $product = Product::findOrFail($id);
        $products = Product::where('pro_active',1)->orderBy('id','DESC')->paginate(12);
        $ratings = Rating::with('user:id,name')->where('r_product_id',$id);
        if($request->s) $ratings = $ratings->where('r_number',$request->s);
        $ratings = $ratings->orderByDesc('id')->paginate(8);
        if($request->ajax()){
            $query = $request->query();
            $html = view('frontend.pages.product_detail.include._inc_list_reviews', compact('ratings','query'))->render();
            return response(['html' => $html]);
        }
        $query = $request->query();
        $ratingsDashboard = Rating::groupBy('r_number')->where('r_product_id',$id)->select(\DB::raw('count(r_number) as count_number'),\DB::raw('sum(r_number) as total'))->addSelect('r_number')->get()->toArray();
        //dd($ratingsDashboard);
        $ratingDefault = $this->mapRatingDefault();
        //dd($ratingDefaultt);
        foreach ($ratingsDashboard as $key => $item) {
            $ratingDefault[$item['r_number']] = $item;
        }
        return view('frontend.pages.product_detail.product_rating', compact('product','products','ratings','ratingDefault','query'));    
    }
}
