<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Rating, Product};
class RatingController extends Controller
{
    public function ajaxRating(Request $request){
    	if($request->ajax()){
    		$rating = new Rating();
    		$rating->r_user_id = \Auth::id();
    		$rating->r_product_id = $request->product_id;
    		$rating->r_content = $request->content_review;
            $rating->r_number = $request->review;
    		$rating->save();

    		if($rating->id){
                $html = view('frontend.pages.product_detail.include._inc_rating_item', compact('rating'))->render();
    			$this->staticRatingProduct($request->product_id, $request->review);
    		}
    		return response(['messages'=>'Đánh giá thành công','html'=>$html]);
    	}
    	
    }
    public function ajaxLike(Request $request){
        if($request->ajax()){
            \DB::table('rep_comments')->where('id', $request->commentID)
                        ->increment('rcmt_like');
            return response(['messages'=>'Đánh giá thành công']);
            //echo 
            
        }
        return response(['messages'=>'abcd']);
    }
    private function staticRatingProduct($productID,$number){
    	$product = Product::find($productID);
    	$product->pro_review_total++;
    	$product->pro_review_star += $number;
    	$product->save();
    }
}
