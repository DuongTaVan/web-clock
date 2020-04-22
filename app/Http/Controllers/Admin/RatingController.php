<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Rating, Product};
class RatingController extends Controller
{
    public function index(){
    	$ratings = Rating::with('product:id,pro_name','user')->orderByDesc('id')->paginate(8);
    	//dd($ratings);
    	return view('admin.rating.index', compact('ratings'));
    }
    public function delete($id){
    	$rating = Rating::find($id);
    	$product = Product::find($rating->r_product_id);
    	$product->pro_review_total --;
    	$product->pro_review_star -= $rating->r_number;
    	$product->save();
    	$rating->delete();
    	return redirect()->back();
    }
}
