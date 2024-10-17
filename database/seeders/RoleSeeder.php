<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
        $role10 = Role::create(['name' => 'Jefe-Coordinacion']);
        $role11 = Role::create(['name' => 'Jefe-Administracion']);
        $role12 = Role::create(['name' => 'Jefe-Juridica']);
        $role13 = Role::create(['name' => 'Jefe-Medica']);
        $role14 = Role::create(['name' => 'Jefe-Humanos']);
        $role15 = Role::create(['name' => 'Jefe-Financieros']);
        $role16 = Role::create(['name' => 'Jefe-Materiales']);
        $role17 = Role::create(['name' => 'Jefe-Prestaciones']);
        $role18 = Role::create(['name' => 'Jefe-Tecnologias']);
        $role19 = Role::create(['name' => 'Admin']);
        $role20 = Role::create(['name' => 'Default']);
    }
}
