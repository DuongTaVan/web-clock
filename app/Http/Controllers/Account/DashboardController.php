<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\User;
use App\Models\{Transactions};


class DashboardController extends Controller
{
    protected $userId;

    public function __construct()
    {

    }

    public function getIdUser()
    {
        return \Auth::user()->id;
    }
    public function index(){
        
        $totalTransaction = Transactions::where('tst_user_id', $this->getIdUser())
            ->select('id')
            ->count();

        $totalTransactionCancel = Transactions::where([
            'tst_user_id' => $this->getIdUser(),
            'tst_status'  => -1
        ])
            ->select('id')
            ->count();

        $totalTransactionProcess = Transactions::where([
            'tst_user_id' => $this->getIdUser(),
        ])->whereIn('tst_status' , [1,2])
            ->select('id')
            ->count();

        $totalTransactionSuccess = Transactions::where([
            'tst_user_id' => $this->getIdUser(),
            'tst_status'  => 3
        ])
            ->select('id')
            ->count();

        $viewData = [
            'totalTransaction'        => $totalTransaction,
            'totalTransactionCancel'  => $totalTransactionCancel,
            'totalTransactionProcess' => $totalTransactionProcess,
            'totalTransactionSuccess' => $totalTransactionSuccess
        ];

        return view('user.dashboard', $viewData);
       

    }
    public function edit(){
        return view('user.update_infor');
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        //dd($user);
        $user->update($request->all());
        if ($request->hasFile('image')) {
            if ($user->avatar) {
                $old_image = $user->avatar;
                unlink($old_image);
            }
            //dd(1);
            $file = $request->image;
            $file_name = Str::slug($request->name).'.'.$file->getClientOriginalExtension();
           // dd($file_name);
            $file->move(public_path('images/user/'), $file_name);
            $user->avatar = 'images/user/' . $file_name;
            $image = Image::make(public_path('images/user/'.$file_name))->fit($width = 48, $height = 48);
            $image->save();
        }
        //dd(2);
        $user->save();
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
