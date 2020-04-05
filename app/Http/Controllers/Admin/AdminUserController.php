<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class AdminUserController extends Controller
{
    public function index(){
    	$user = User::paginate(10);
    	return view('admin.user.index', compact('user'));
    }
    public function delete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect()->back();
    }
}
