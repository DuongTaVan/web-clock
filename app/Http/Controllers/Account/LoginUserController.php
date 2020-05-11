<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function index()
    {
        $historyLog = \Auth::user()->log_login;
        $historyLog = json_decode($historyLog, true) ?? [];
        
        $viewData = [
            'title_page' => "Lịch sử đăng nhập của bạn",
            'historyLog' => $historyLog
        ];
        return view('user.history_login', $viewData);
    }
}
