<?php

namespace App\Http\Controllers\Account;
use App\Http\Requests\AccountRequestRegister;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
class RegisterController extends Controller
{
    public function index(){
    	return view('account.register');
    }
    public function create(AccountRequestRegister $Request){
    	$user = new User;
    	$user->name = $Request->name;
    	$user->email = $Request->email;
    	$user->password = bcrypt($Request->password);
    	$user->phone = $Request->phone;
        $user->address = $Request->address;
    	$user->save();
    	return redirect()->route('frontend.account.login.index');
    }
    public function login(){
    	return view('account.login');
    }
    public function PostLogin(Request $Request){
    	$data = ['email'=>$Request->email,'password'=>$Request->password];
    	
    	if(Auth::attempt($data)){
    		return redirect()->route('frontend.home.index');
    	}
    	else
    		return redirect()->route('frontend.account.login.index')->with('thongbao','Tài khoản hoặc mật khẩu không đúng!');
    }
    public function logout(){
    	Auth::logout();
    	return redirect()->route('frontend.home.index');
    }
}
