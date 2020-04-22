<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Admin,Role,Permission,Role_admin,Role_permission};
use DB;
class PermissionController extends Controller
{
   	public function getIndex(){
   		$permissions = Permission::all();
   		//dd($roles);
   		return view('admin/role_permission/permission/index',compact('permissions'));
   	}
   	//show form create roles
   	public function create(){
   		//$permissions = Permission::all();
   		return view('admin/role_permission/permission/create');
   	}
   	public function store(Request $request){

   		    //$data = $request->except('_token');
          //dd($data);
          $permission = Permission::create($request->all());
        	//$permission->save();

	        //$role->name = $request->name;
	        //$role->display_name = $request->display_name;
	        //$role->save();
	        //$permission = $request->permission;
	        //dd($permission);
	        //$role->permission()->attach($permission);
	        
       return redirect()->route('permission.list');

   	}

   	public function edit($id){
   		
        $permission = Permission::find($id);
   		return view('admin/role_permission/permission/update',compact('permission'));
    }
    public function postedit(Request $request ,$id){
        $permission = Permission::find($id);
        $permission->update($request->all());
        return redirect()->route('permission.list');
    }
        
        

   	public function delete($id){
        $permission = Permission::find($id);
        $permission->delete();
        $permission_id = Role_permission::where('permission_id',$id)->delete();
        return redirect()->route('permission.list');
    }

    
}
