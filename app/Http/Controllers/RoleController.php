<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(){
       $role = Role::all()->toJson();
       return response($role);

       //$role = Role::all();
       //return response()->toJson($role);

    }

    public function indexPivot(){

      $role =  Role::with('permissions')->where('key_name', 'superadmin')->first();
      $role->permissions()->sync(array(1,2,3));
      $roleWithPermissions =  $role->toArray();
      dd($roleWithPermissions);

   }


    public function findRole($key_name){
        $role = Role::where('key_name', $key_name)->first()->toJson();
        dd($role);
 
     }
     public function CreateRole(Request $request)
     {
        Role::create([
           'name' => $request->name,
           'key_name'=> Str::slug($request->name)
        ]);
     }
     public function UpdateRole($id)
     {
        $role=Role::find($id);
        $role -> update([
         'name' => 'Tec. docente',
         'key_name'=> 'tec_docente'
        ]);
       
     }
     public function UpdateRolebyKeyName($key_name)
     {
        $role=Role::where('key_name', $key_name)->first();
        $role -> update([
         'name' => 'Tec. Docente',
         'key_name'=> 'tec_docente'
        ]);
       
     }
     public function DeleteRole($key_name)
     {
        $role=Role::where('key_name', $key_name)->first();
        $role -> Delete();
       
     }

}
