<?php

namespace Database\Seeders;

use App\Models\Humanos\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = collect()
        ->push('Coordinación General')
        ->push('Jurídica')
        ->push('Coordinación Médica')
        ->push('Administración General')
        ->push('Recursos Humanos')
        ->push('Recursos Financieros y Contabilidad')
        ->push('Recursos Materiales y Servicios Generales')
        ->push('Prestaciones Socio-Económicas')
        ->push('Tecnologías de la Información');
        
        foreach($areas as $area){
            Area::create([
                'name'=>$area,
                'status'=>'active',
                'modified_by'=>'david@fideicomiso.com',
            ]);
        };
    }
}
