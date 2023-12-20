<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Coordinacion']);
        $role2 = Role::create(['name' => 'Administracion']);
        $role3 = Role::create(['name' => 'Juridica']);
        $role4 = Role::create(['name' => 'Medica']);
        $role5 = Role::create(['name' => 'Humanos']);
        $role6 = Role::create(['name' => 'Financieros']);
        $role7 = Role::create(['name' => 'Materiales']);
        $role8 = Role::create(['name' => 'Prestaciones']);
        $role9 = Role::create(['name' => 'Tecnologias']);
        $role10 = Role::create(['name' => 'Configuracion']);
        $role11 = Role::create(['name' => 'Admin']);
        $role12 = Role::create(['name' => 'Default']);
        //Ejemplo de como asignar un permiso a muchos roles
        //Permission::create(['name'=>'humanos.area.index'])->syncRoles($role1,$role2);

        // //
        // Permission::create(['name'=>'humanos.area.index'])->syncRoles($role1,$role2);
        // Permission::create(['name'=>'humanos.area.create'])->syncRoles($role1,$role2);
        // Permission::create(['name'=>'humanos.area.edit'])->syncRoles($role1,$role2);
        // Permission::create(['name'=>'humanos.area.destroy'])->syncRoles($role1,$role2);
        // //
        // Permission::create(['name'=>'configuracion.usuarios.index'])->assignRole($role1);
        // Permission::create(['name'=>'configuracion.usuarios.create'])->assignRole($role1);
        // Permission::create(['name'=>'configuracion.usuarios.edit'])->assignRole($role1);
        // Permission::create(['name'=>'configuracion.usuarios.destroy'])->assignRole($role1);
    }
}
