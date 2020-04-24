<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\{Transactions};


class DashboardController extends Controller
{
    public function index(){
        
        //dd($platform);
        return view('user.dashboard');

    }
    public function edit(){
        return view('user.update_infor');
    }
    public function update(Request $request, $id){
        $user = User::find($id)->firstOrFail();
        $user->update($request->all());
        return redirect()->back();
    }
   
    public function transaction(Request $request){
        $transaction = Transactions::whereRaw(1)->where('tst_user_id',\Auth::user()->id);
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
        return view('user.transaction', compact('transaction','query'));
    }
}
