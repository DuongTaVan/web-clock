<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Articles, Product};
class BlogController extends Controller
{
    public function index(){
    	$articles = Articles::all();
    	$top_produc_pays = Product::with('cate')->where('pro_active',1)->where('pro_pay','>',0)->orderBy('pro_pay','DESC')->take(5)->get();
    	//dd($top_produc_pays);
    	return view('frontend.pages.article.index', compact('articles','top_produc_pays'));
    }
}
