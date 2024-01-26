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
            'name'=>'Subsecretaría de Ejecución de sanciones Penales y Medidas de Seguridad',
            'dependency_id' => 1,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
        Subdependency::create([
            'name'=>'Secretaría de Seguridad Pública y Protección Ciudadana',
            'dependency_id' => 1,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
        Subdependency::create([
            'name'=>'Subsecretaría de Seguridad Turística Y Vial',
            'dependency_id' => 1,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
        Subdependency::create([
            'name'=>'Subsecretaría de Servicios Estrategicos de Seguridad',
            'dependency_id' => 1,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
        Subdependency::create([
            'name'=>'Fiscalía General del Estado',
            'dependency_id' => 2,
            'status'=>'active',
            'modified_by'=>'david@fideicomiso.com',
        ]);
    }
}
