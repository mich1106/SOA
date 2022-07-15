<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permission = Permission::all()->toJson();
        dd($permission);
 
     }
     public function findPermission($key_name){
         $permission = Permission::where('key_name', $key_name)->first()->toJson();
         dd($permission);
  
      }
     public function CreatePermission()
     {
        Permission::create([
           'name' => 'Move. Permission',
           'key_name'=> 'move_permission'
        ]);
     }
     public function UpdatePermission($id)
     {
        $permission=Permission::find($id);
        $permission -> update([
         'name' => 'Move. Permission',
         'key_name'=> 'move_permission'
        ]);
       
     }
     public function UpdatePermissionyKeyName($key_name)
     {
        $permission=Permission::where('key_name', $key_name)->first();
        $permission -> update([
         'name' => 'Move. Permission',
         'key_name'=> 'move_permission'
        ]);
       
     }
     public function DeletePermission($key_name)
     {
        $permission=Permission::where('key_name', $key_name)->first();
        $permission -> Delete();
       
     }
}
