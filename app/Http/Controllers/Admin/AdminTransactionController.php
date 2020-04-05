<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\TransactionExport;
use Illuminate\Support\Str;
use App\Models\{Transactions, Orders, Product};
class AdminTransactionController extends Controller
{
    public function index(Request $request){
        $transaction = Transactions::whereRaw(1);
        if($request->id) $transaction->where('id',$request->id);
        if($email = $request->email){
            $transaction->where('tst_email','like','%'.$email.'%');
        }
        if($type = $request->type){
            if($type == 1)
                $transaction->where('tst_user_id','<>',0);
            else
                $transaction->where('tst_user_id',0);
        }
        if($status = $request->status)
            $transaction->where('tst_status',$status);
    	$transaction = $transaction->orderByDesc('id')->paginate(10);
        if($request->export){
            return \Excel::download(new TransactionExport($transaction), Str::random(40).'don-hang.xlsx');
        }
        $query = $request->query();
    	return view('admin.transaction.index', compact('transaction','query'));
    }
    public function delete($id){
    	$tran = Transactions::find($id);
    	$order = Orders::where('od_transaction_id',$id)->delete();
    	$tran->delete();
    	return redirect()->back();
    }
    public function getTransactionDetail(Request $Request, $id){
    	if($Request->ajax()){
    		$order = Orders::where('od_transaction_id',$id)->get();
    		//dd($order);
    		$html = view('component.order', compact('order'))->render();
    		return response([
    			'html'=>$html
    		]);
    	}
    }
    public function delete_order(Request $Request,$id){
        if($Request->ajax()){
            $order = Orders::find($id);
            if($order){
                $money = $order->od_qty*$order->od_price;
                \DB::table('transactions')->where('id',$order->od_transaction_id)->decrement('tst_total_money',$money);
                $order->delete();
            }
            return response(['code'=>200]);
        }
    }
    public function active($active,$id){
        $transaction = Transactions::find($id);
        if($transaction){
            switch ($active) {
                case 'process':
                //dd('1');
                    $transaction->tst_status = 2;
                    break;
                case 'success':
                    $transaction->tst_status = 3;
                    break;
                case 'cancel':
                    $transaction->tst_status = -1;
                    break;
            }
            $transaction->save();
        }
        return redirect()->back();
    }
}
