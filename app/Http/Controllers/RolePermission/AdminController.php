<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\{Admin,Role,Permission,Role_admin};
use Auth;
use DB;

class AdminController extends Controller
{
    public function getIndex(){
       // dd(1);
        $admins = Admin::all();
        //dd($user);
        return view('admin/role_permission/admin/index',compact('admins'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin/role_permission/admin/create',compact('roles'));
    }
    public function store(Request $Request){
        try{
            //DB::beginTransaction();
        $admin = new Admin;
        //dd($Request->roles);

        $admin->name = $Request->name;
        $admin->email = $Request->email;
        $admin->password = bcrypt($Request->password);
        $admin->phone = $Request->phone;
        $admin->address = $Request->address;
        $admin->save();
        $role = $Request->roles;
        //dd($role);
        $admin->role()->attach($role);
        //dd($admin);
        return redirect()->route('user.list');

        }
        catch(Exception $Exception){
            DB::rollBack();
        }
        
        //dd('a');
        
    }
    public function edit($id){
        //dd($id);
        $roles = Role::all();
        $admin = Admin::find($id);
        $listRoles = Role_admin::where('admin_id',$id)->pluck('role_id');
        //dd($listRoles);
        return view('admin/role_permission/admin/update',compact('roles','admin','listRoles'));
    }
    public function postedit(Request $Request, $id){

        try{
            
        //update user table
            $admin = Admin::find($id);
            $admin->name = $Request->name;
            $admin->email = $Request->email;
            $admin->phone = $Request->phone;
            $admin->address = $Request->address;
            $admin->password = bcrypt($Request->password);
            $admin->save();

            //update rold User table
            $roles = $Request->roles;
            $admin->role()->sync($roles);

            
            return redirect()->route('user.list');
             }
        catch(Exception $Exception){
            DB::rollBack();
        }
       
    }
    public function delete($id){
        $admin = Admin::find($id);
        $admin->delete();
        $roles = Role_admin::where('admin_id',$id)->delete();
        return redirect()->route('user.list');
    }
}
