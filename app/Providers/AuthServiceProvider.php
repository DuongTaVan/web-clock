<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\{Admin,Role,Permission,Role_admin,Role_permission};

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


    //     Gate::define('Rating', function ($admin) {
    //        $id = \Auth::guard('admin')->user()->id;
           
           
    //         $listRoleofPermission = $this->listRolesAdmin($id);
    //         $checkPermission = Permission::where('name','Rating')->value('id');
    //         if($listRoleofPermission->contains($checkPermission)){
            
    //         return true;        
    //     }
    //         return false;
         
    // });


        
    //     Gate::define('user', function ($admin) {
    //        $id = \Auth::guard('admin')->user()->id;
    //        //dd($id);
    //        // $listRolesadmin = $this->listRolesAdmin();
           
    //         $listRoleofPermission = $this->listRolesAdmin($id);
    //         $checkPermission = Permission::where('name','user')->value('id');
    //         if($listRoleofPermission->contains($checkPermission)){
            
    //         return true;        
    //     }
    //         return false;
         
    // });

    //     Gate::define('product', function ($admin) {
    //        $id = \Auth::guard('admin')->user()->id;
    //        //dd($id);
    //        // $listRolesadmin = $this->listRolesAdmin();
           
    //         $listRoleofPermission = $this->listRolesAdmin($id);
    //         $checkPermission = Permission::where('name','product')->value('id');
    //         if($listRoleofPermission->contains($checkPermission)){
            
    //         return true;        
    //     }
    //         return false;
         
    // });


    //     Gate::define('attribute', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','attribute')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });

    //     Gate::define('key', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','key')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });

    //     Gate::define('category', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','category')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });

    //     Gate::define('permission', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','permission')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('menu', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','menu')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('trademark', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','trademark')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('event', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','event')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('statistical', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','statistical')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('transport', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','transport')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('slide', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','slide')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('warehouse', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','warehouse')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('menu', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','menu')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('article', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','article')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
    //     Gate::define('role_permission', function ($admin) {
    //                $id = \Auth::guard('admin')->user()->id;
    //                //dd($id);
    //                // $listRolesadmin = $this->listRolesAdmin();
                   
    //                 $listRoleofPermission = $this->listRolesAdmin($id);
    //                 $checkPermission = Permission::where('name','role_permission')->value('id');
    //                 if($listRoleofPermission->contains($checkPermission)){
                    
    //                 return true;        
    //             }
    //                 return false;
                 
    //         });
        
   //
    }
    // private function listRolesAdmin($id){
            
    //         $listRolesadmin = Admin::find($id)->role()->select('roles.id')->pluck('id')->toArray();
    //          $listRoleofPermission =  \DB::table('roles')
    //         ->join('roles_permission', 'roles.id', '=', 'roles_permission.role_id')
    //         ->join('permissions', 'permissions.id', '=', 'roles_permission.permission_id')
    //         ->whereIn('roles.id',$listRolesadmin)
    //         ->select('permissions.*')
    //         ->get()->pluck('id')->unique();
    //         return $listRoleofPermission;
    // }
}
