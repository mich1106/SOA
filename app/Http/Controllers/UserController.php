<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index(){


        $lista_permisos = Auth::user()->Role->permissions()->pluck('id')->toArray();
        //dd($lista_permisos);
        if(in_array('agregar_roles', $lista_permisos)){
            dd('Si existe :)');
        }else{
            dd('No existe');
        }
      
        if (Auth::user()->Role->key_name == 'algo'){

            $usuarios = User::with('Role.permissions')->get();
            foreach($usuarios as $usuario){

                foreach($usuario->Role->permissions as $permission)
                {
                    dd($permission->toArray());
                }
              
            }
     
         }else{
            dd('No se puede mostrar informacion');
         }

        }

        
       

        

     public function create(){
        
        User::create([
            'name'=> 'Alejandra',
            'last_name'=> 'López',
            'username' => 'AlejandraLopez',
            'edad' => '20',
            'telphone' => '6181233456',
            'email' => 'ashue@gmail.com',
            'password' => Hash::make ('54321'),
            'role_id' => '1'
        ]);
 
     }

     public function login(){

        $credentials = [
            'email' => 'ashue@gmail.com',
            'password' => '54321'

        ];

        if (Auth::attempt($credentials)){
            return redirect()->intended('/');
        }
    }
    
}

   