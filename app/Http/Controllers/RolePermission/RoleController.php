<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Admin,Role,Permission,Role_admin,Role_permission};
use DB;
class RoleController extends Controller
{
   	public function getIndex(){
   		$roles = Role::all();
   		//dd($roles);
   		return view('admin/role_permission/role/index',compact('roles'));
   	}
   	//show form create roles
   	public function create(){
   		$permissions = Permission::all();
   		return view('admin/role_permission/role/create',compact('permissions'));
   	}
   	public function store(Request $request){
   		
            $role = new Role;
        	//dd(1);

	        $role->name = $request->name;
	        $role->display_name = $request->display_name;
	        $role->save();
	        $permission = $request->permission;
	        //dd($permission);
	        $role->permission()->attach($permission);
	        
       return redirect()->route('role.list');

   	}

   	public function edit($id){
   		//dd($id);
        $role = Role::find($id);
        //dd($role);
        $getallPer= Role_permission::where('role_id',$id)->pluck('permission_id');
        //dd($permission);
        $permissions = Permission::all();
   		return view('admin/role_permission/role/update',compact('role','permissions','getallPer'));
    }
    public function postedit(Request $Request ,$id){
   		
            $role =  Role::find($id);
        	//dd($Request->roles);

	        $role->name = $Request->name;
	        $role->display_name = $Request->display_name;
	        $role->save();

	        $permission = $Request->permission;
	       // dd($permission);
	        $role->permission()->sync($permission);
            return redirect()->route('role.list');
    }
        
        

   	public function delete($id){
        $role = Role::find($id);
        $role->delete();
        $permission_id = Role_permission::where('role_id',$id)->delete();
        return redirect()->route('role.list');
    }

    
}
