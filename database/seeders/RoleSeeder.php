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

        Permission::create(['name' => 'admin.usuarios.usuario.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usuarios.usuario.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.usuario.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usuarios.usuario.roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$role1]);



        Permission::create(['name' => 'admin.centros.centro.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.centros.centro.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.centros.centro.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.centros.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.carreras.carrera.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.carreras.carrera.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.carreras.carrera.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.carreras.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.supervisores.sup.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.supervisores.sup.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.supervisores.sup.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.supervisores.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.horas.hora.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.horas.hora.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.horas.hora.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.horas.destroy'])->syncRoles([$role1]); 
    }
}
