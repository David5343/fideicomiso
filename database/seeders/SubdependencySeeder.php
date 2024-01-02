<?php

namespace Database\Seeders;

use App\Models\Prestaciones\Subdependency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubdependencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subdependency::create([
            'name'=>'SUBSECRETARIA DE EJECUCION DE SANCIONES PENALES Y MEDIDAS DE SEGURIDAD',
            'dependency_id' => 1,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
        Subdependency::create([
            'name'=>'SECRETARIA DE SEGURIDAD PUBLICA Y PROTECCION CIUDADANA',
            'dependency_id' => 1,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
        Subdependency::create([
            'name'=>'SUBSECRETARIA DE SEGURIDAD TURISTICA Y VIAL',
            'dependency_id' => 1,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
        Subdependency::create([
            'name'=>'SUBSECRETARIA DE SERVICIOS ESTRATEGICOS DE SEGURIDAD',
            'dependency_id' => 1,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
        Subdependency::create([
            'name'=>'FISCALIA GENERAL DEL ESTADO',
            'dependency_id' => 2,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
    }
}
