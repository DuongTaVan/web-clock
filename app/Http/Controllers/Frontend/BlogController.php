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

    	$top_articles = Articles::where(['a_active'=>1,'a_hot'=>1])->orderBy('id','DESC')->take(6)->get();

    	//dd($top_produc_pays);
    	//bai viet hot
        $articles_one = Articles::where(['a_active'=>1,'a_position_2'=>1])->orderByDesc('id')->first();
    	$articleHotSidebarTop = Articles::where(['a_active'=>1,'a_position_2'=>1])->orderByDesc('id')->take(5)->get();
        //dd($articles_one);
    	$articleTop = Articles::where(['a_active'=>1,'a_position_1'=>1])->orderByDesc('id')->take(5)->get();
    	return view('frontend.pages.article.index', compact('articles','top_produc_pays','top_articles','articleHotSidebarTop','articleTop','articles_one'));
    }
}
