<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //Permisos para areas
        Permission::create(['name'=>'humanos.areas.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.areas.edit'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.areas.update'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.area.destroy'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para bancos
        Permission::create(['name'=>'humanos.bancos.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.bancos.edit'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.bancos.update'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.bancos.destroy'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para estados
        Permission::create(['name'=>'humanos.estados.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.estados.edit'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.estados.update'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.estados.destroy'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para municipios
        Permission::create(['name'=>'humanos.municipios.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.municipios.edit'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.municipios.update'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.municipios.destroy'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para categorias
        Permission::create(['name'=>'humanos.categorias.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.categorias.edit'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.categorias.update'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.categorias.destroy'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para plazas
        Permission::create(['name'=>'humanos.plazas.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.plazas.edit'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.plazas.update'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.plazas.destroy'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para empleados
        Permission::create(['name'=>'humanos.empleados.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.empleados.create'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.empleados.store'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.empleados.show'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.empleados.edit'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.empleados.update'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.empleados.destroy'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para Familiares
        Permission::create(['name'=>'humanos.familiares.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.familiares.edit'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.familiares.update'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.familiares.destroy'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para Generador de PDF
        Permission::create(['name'=>'humanos.reportes.index'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.reportes.tabulador'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.reportes.activos'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        Permission::create(['name'=>'humanos.reportes.inactivos'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        //Permisos para Slider
        Permission::create(['name'=>'humanos.slider.create'])->syncRoles('Humanos','Jefe-Humanos','Jefe-Administracion','Jefe-Coordinacion','Admin');
        // Permission::create(['name'=>'configuracion.usuarios.index'])->assignRole($role1);
        // Permission::create(['name'=>'configuracion.usuarios.create'])->assignRole($role1);
        // Permission::create(['name'=>'configuracion.usuarios.edit'])->assignRole($role1);
        // Permission::create(['name'=>'configuracion.usuarios.destroy'])->assignRole($role1);
        //Ejemplo de como asignar un permiso a muchos roles
        //Permission::create(['name'=>'humanos.area.index'])->syncRoles($role1,$role2);
        // Permission::create(['name'=>'humanos.area.index'])->syncRoles($role1,$role2);
        // Permission::create(['name'=>'humanos.area.create'])->syncRoles($role1,$role2);
        // Permission::create(['name'=>'humanos.area.edit'])->syncRoles($role1,$role2);
        // Permission::create(['name'=>'humanos.area.destroy'])->syncRoles($role1,$role2);
        // //

    }
}
