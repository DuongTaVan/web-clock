<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Articles};
class FrontendArticleController extends Controller
{
    public function index(){
    	return view('frontend.pages.article_detail.index');
    	dd(1);
    }
    public function Login(){
    	dd(1);
    	return view('frontend.account.login');
    }
}
