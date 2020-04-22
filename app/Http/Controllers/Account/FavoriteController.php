<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product};
use App\User;
class FavoriteController extends Controller
{
    public function addFavorite(Request $request, $id){
    	if($request->ajax()){
    		$product = Product::find($id);
    		if(!$product) return response(['messages'=>'Không tồn tại sản phẩm']);
    		$messages = 'Thêm sản phẩm yêu thích thành công';
    		try {
    			\DB::table('favorite')->insert([
    				'uf_product_id' => $id,
    				'uf_user_id'    => \Auth::user()->id
    			]);
    		} catch (\Exception $e) {
    			$messages = 'Sản phẩm này đã được yêu thích';
    		}
    		return response(['messages'=>$messages]);
    	}
    	
    }
    public function favorite(){
    	$userID = \Auth::id();
    	//dd($userID);

       
        $products = User::with('favo')->where('id',$userID)->first();

        return view('user.favorite', compact('products'));
	}
}
