<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Practicante']);

        Permission::create(['name' => 'inicio'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'usuarios.usuario.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'usuarios.usuario.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'usuarios.usuario.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$role1, $role2]); 
    }
}
