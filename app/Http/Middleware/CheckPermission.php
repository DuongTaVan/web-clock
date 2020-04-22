<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\{Admin,Role,Permission,Role_admin,Role_permission};
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = 'null')
    {
        //dd($parameter);
        $id = get_data_user('admin');
        //dd($id);
        $listRolesadmin = Admin::find($id)->role()->select('roles.id')->pluck('id')->toArray();
//dd($listRolesadmin);
        $listRoleofPermission =  \DB::table('roles')
            ->join('roles_permission', 'roles.id', '=', 'roles_permission.role_id')
            ->join('permissions', 'permissions.id', '=', 'roles_permission.permission_id')
            ->whereIn('roles.id',$listRolesadmin)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();

        //dd($listRoleofPermission);

        $checkPermission = Permission::where('name',$permission)->value('id');
        //dd($checkPermission) ;
        //kiem tra user co vao dc man hinh khong?
        if($listRoleofPermission->contains($checkPermission)){
            //dd(1);
            return $next($request);        
        }
        //dd($CheckPermission);
        //dd($listRolesadmin);
        return abort(401);
    }
}
