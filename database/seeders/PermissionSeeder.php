<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->getData() as $keyName => $name){
            DB::table('permissions')->insert([
                'key_name'=>$keyName,
                'name' => $name,
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s')
            ]);
        }
        
    }
    private function getData(){
        return[
            'ver_rol'=> 'ver Roles',
            'actualizar rol' => 'actualizar Rol',
            'eliminar Rol'=>'eliminar Rol',
            'editar rol' => 'editar Rol',
              
        ];
    }
}
