<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Articles};
class ArticleDetailController extends Controller
{
    public function index($slug){
    	$arraySlug = explode('-', $slug);
    	//dd($arraySlug);
    	$id = array_pop($arraySlug);
    	$article_detail = Articles::find($id);
  
    	//dd($article_detail);
    	return view('frontend.pages.article_detail.index', compact('article_detail'));
    }
}
