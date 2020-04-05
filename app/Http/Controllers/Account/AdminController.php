<?php

namespace App\Http\Controllers\Account;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AdminController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view('admin.account.index');
    }

    public function postLogin(LoginRequest $request)
    {
        if (\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
//            return redirect()->intended('/api-admin');
            return redirect()->route('admin.category.create');
        }

        return redirect()->back();
    }

    public function getLogoutAdmin()
    {
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.account.index');
    }
}






    


