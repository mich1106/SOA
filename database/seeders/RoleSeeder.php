<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->getData() as $keyName => $name){
            DB::table('roles')->insert([
                'key_name'=>$keyName,
                'name' => $name,
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s')
            ]);
        }

    }
    private function getData(){
        return[
            'superadmin'=> 'super Administrador',
            'alumno' => 'Alumno',
            'docente'=>'Docente',
            'director' => 'Director',
            'administrativo'=> 'Administrativo'       
        ];
    }
}
