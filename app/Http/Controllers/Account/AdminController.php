<?php

namespace App\Http\Controllers\Account;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\{Admin};
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
           
            return redirect('admin/');

        }

        return redirect()->back();
    }

    public function getLogoutAdmin()
    {
        \Auth::guard('admin')->logout();
        
        return redirect()->route('admin.account.index');
      
    }
    public function getProfile($id){
        $admin = Admin::find($id);
        return view('admin/profile/index', compact('admin'));
    }
    public function postProfile(Request $request, $id){
        $admin = Admin::find($id);
        //dd($request->all());
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        if ($request->hasFile('image')) {
            if ($admin->avatar != NULL) {
                $old_image = $admin->avatar;
                unlink($old_image);
            }
            //dd(1);
            $file = $request->image;
            $file_name = Str::slug($request->name).'.'.$file->getClientOriginalExtension();
           // dd($file_name);
            $file->move(public_path('images/admin/'), $file_name);
            $admin->avatar = 'images/admin/' . $file_name;
            $image = Image::make(public_path('images/admin/'.$file_name))->fit($width = 160, $height = 160);
            $image->save();
        }
        //dd(1);
        $admin->save();
        return redirect('admin/');
    }
}






    


