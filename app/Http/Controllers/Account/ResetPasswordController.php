<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\ResetPasswordEmail;
use App\Http\Requests\NewPasswordRequest;
class ResetPasswordController extends Controller
{
    public function index(){
    	return view('account.password.email');
    }
    public function checkEmailResetPassword(Request $request)
    {

        $account = \DB::table('users')->where('email', $request->email)->first();
        //dd($account);
        if ($account) {
            // gửi email
            $token = bcrypt($account->email.$account->id);
            \DB::table('password_resets')
            ->insert([
                'email' => $account->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $link = route('get.new_password',['email' => $account->email,'_token' => $token]);

            Mail::to($account->email)->send(new ResetPasswordEmail($link));

            return redirect()->route('frontend.home.index');
        }

        return redirect()->back();
    }
     public function newPassword(Request $request)
    {
        $token = $request->_token;
        
        //Check tồn tại token 
        $checkToken = \DB::table('password_resets')
            ->where('token',$token)
            ->first();
        //dd($checkToken);
    
        if (!$checkToken)  return redirect()->route('frontend.home.index');


        //Check xem time taoj token quá 3phút chưa 
        $now = Carbon::now();
        if ($now->diffInMinutes($checkToken->created_at) > 3) {
            \DB::table('password_resets')->where('email', $request->email)->delete();   
            return redirect()->route('frontend.home.index');
        }

        return view('account.password.reset'); 
    }

    public function savePassword(NewPasswordRequest $request)
    {
        $password = $request->password;

        $data['password']   =  Hash::make($password);
        $email = $request->email;

        if (!$email) return redirect()->to('/');

        \DB::table('users')->where('email', $email)
            ->update($data);

        \DB::table('password_resets')->where('email', $email)->delete();
        return redirect()->route('frontend.account.login.index');
    }
}
