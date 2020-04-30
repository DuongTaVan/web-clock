<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Comment, RepComment};
class CommentController extends Controller
{
    public function ajaxComment(Request $request){
    	if($request->ajax()){
            // Check load lại page để hiện popup captcha
            if (\Auth::user()->count_comment >= 2) {
                return response([

                    'messages' => '501'
                ]);
            }
    		$comment = new Comment();
    		$comment->cmt_user_id = \Auth::id();
    		$comment->cmt_name = \Auth::user()->name;
    		$comment->cmt_email = \Auth::user()->email;
            $comment->cmt_content = $request->comment;
            $comment->cmt_product_id = $request->productId;
    		$comment->save();

    		if($comment->id){
                \DB::table('users')->where('id', \Auth::user()->id)
                        ->increment('count_comment');
                $html = view('frontend.pages.product_detail.include._inc_comment_item', compact('comment'))->render();
    			
    		}
    		return response(['messages'=>'Đánh giá thành công','html'=>$html]);
    	}
    }
    public function ajaxRepComment(Request $request){
    	if($request->ajax()){
    		//dd(1);
    		$rep_comment = new RepComment();
    		$rep_comment->rcmt_user_id = \Auth::id();
    		$rep_comment->rcmt_name = \Auth::user()->name;
    		$rep_comment->rcmt_email = \Auth::user()->email;
            $rep_comment->rcmt_content = $request->comment;
            $rep_comment->rcmt_comment_id = $request->commentId;
            $rep_comment->rcmt_product_id = $request->productId;

    		$rep_comment->save();

    		if($rep_comment->id){
                $html = view('frontend.pages.product_detail.include._inc_rep_comment_item', compact('rep_comment'))->render();
    			
    		}
    		return response(['messages'=>'Đánh giá thành công','html'=>$html]);
    	}
    	//return response(['messages'=>'Đánh giá k thành công']);
    }
}
