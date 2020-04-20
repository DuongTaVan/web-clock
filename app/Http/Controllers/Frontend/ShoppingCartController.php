<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Transactions, Orders};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionSuccess;
use Cart;
use Auth;
class ShoppingCartController extends Controller
{
    public function add($id){
    	$product = Product::find($id);
    	Cart::add(['id' => $product->id, 'name' => $product->pro_name, 'qty' => 1, 'price'   => number_price($product->pro_price, $product->pro_sale), 'weight' => 1, 'options' => ['sale' => $product->pro_sale,'image' => $product->pro_avatar,'price_old' => $product->pro_price,]]);
    	return redirect()->back();
    }
    public function index(){
    	$shopping  = Cart::content();
    	return view('frontend.pages.shopping.index', compact('shopping'));
    }
    public function delete($rowId){
    	Cart::remove($rowId);
    	return redirect()->back();
    }
    public function postpay(Request $Request){
        $transactions = new Transactions;
        if(isset(Auth::user()->id))
        {
            $transactions->tst_user_id = Auth::user()->id;
        }
        $transactions->tst_total_money = str_replace(',','',Cart::subtotal(0));
        $transactions->tst_name = $Request->tst_name;
        $transactions->tst_phone = $Request->tst_phone;
        $transactions->tst_address = $Request->tst_address;
        $transactions->tst_email = $Request->tst_email;
        $transactions->tst_note = $Request->tst_note;
        $transactions->save();
        $shopping = Cart::content();
        Mail::to($Request->tst_email)->send(new TransactionSuccess($shopping));
        foreach($shopping as $key =>$item){
            $order = new Orders;
            $order->od_transaction_id = $transactions->id;
            $order->od_product_id = $item->id;
            $order->od_sale = $item->options->sale;
            $order->od_qty = $item->qty;
            $order->od_price = $item->price;
            $order->save();
           \DB::table('products')->where('id',$item->id)->increment('pro_pay',$item->qty);
        }
        \Session::flash('toastr',['type'=>'success','message'=>'Mua hàng thành công']);
        Cart::destroy();
        return redirect()->back();

    }
    public function update(Request $request,$id,$rowId, $qty){
        if($request->ajax()){
            $product = Product::find($id);
            if($product->pro_number < $qty)
            {
                return response(['messages'=>'Không đủ số lượng sản phẩm cần update']);
            }

            Cart::update($rowId, $qty); 
                return response(['messages'=>'Cập nhật thành công']);
        }
        
       
    }
}
