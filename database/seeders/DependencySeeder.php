<?php

namespace Database\Seeders;

use App\Models\Prestaciones\Dependency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dependencias = collect()
        ->push('SSYPC')
        ->push('FISCALIA GENERAL DEL ESTADO');
        
        foreach($dependencias as $dependencia){
            Dependency::create([
                'name'=>$dependencia,
                'status'=>'active',
                'modified_by'=>'david@fideicomiso.com',
            ]);
        };
    }
}
