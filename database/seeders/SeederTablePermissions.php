<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class SeederTablePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //Tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }
    }

}
