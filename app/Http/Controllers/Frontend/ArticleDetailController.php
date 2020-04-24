<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Articles,Product};
class ArticleDetailController extends Controller
{
    public function index($slug){
    	$arraySlug = explode('-', $slug);
    	//dd($arraySlug);
    	$id = array_pop($arraySlug);
    	$top_produc_pays = Product::with('cate')->where('pro_active',1)->where('pro_pay','>',0)->orderBy('pro_pay','DESC')->take(5)->get();

    	$article_detail = Articles::find($id);
  		$top_articles = Articles::where(['a_active'=>1,'a_hot'=>1])->orderBy('id','DESC')->take(6)->get();
        $articleHotSidebarTop = Articles::where(['a_active'=>1,'a_position_2'=>1])->orderByDesc('id')->take(5)->get();
        //dd($articleHotSidebarTop);
       

    	//dd($article_detail);
    	return view('frontend.pages.article_detail.index', compact('article_detail','top_articles','top_produc_pays','articleHotSidebarTop'));
    }
}
