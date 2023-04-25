<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        $roles->each(function($role){

            $permissions = array('create', 'edit', 'update', 'delete');
            $models = array('user', 'role', 'permission');

            if($role->name === 'admin'){
                foreach($permissions as $permission){
                    foreach($models as $model){
                        //Creamos el permiso y se lo asignamos al Rol directamente
                        $role->givePermissionTo(
                            Permission::create([
                                'name'      => $permission ." ". $model,
                            ])
                        );
                    }
                }
            }else{
                foreach($permissions as $permission){
                    $role->givePermissionTo(

                        Permission::create([
                            'name'      => $permission ." ". $role->name,
                        ])
                    );
                }
            }

        });



    }
}
