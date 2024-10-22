<?php

namespace Database\Seeders;

use App\Models\Prestaciones\PensionType;
use Illuminate\Database\Seeder;

class PensionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pensiones = [
            [
                'name' => 'Jubilación',
            ],
            [
                'name' => 'Vejez',
            ],
            [
                'name' => 'Invalidez',
            ],
            [
                'name' => 'Viudez y Orfandad',
            ],
            [
                'name' => 'Viudez',
            ],
            [
                'name' => 'Orfandad',
            ],
            [
                'name' => 'Ascendencia',
            ],
            [
                'name' => 'Riesgo de Trabajo-Incapacidad Parcial y Permanente',
            ],
            [
                'name' => 'Riesgo de Trabajo-Incapacidad Total y Permanenta',
            ],
            [
                'name' => 'Riesgo de Trabajo-Ivalidez Parcial (Descontinuado)',
            ],
            [
                'name' => 'Riesgo de Trabajo-Invalidez (Descontinuado)',
            ],
            [
                'name' => 'Riesgo de Trabajo-Viudez y Orfandad',
            ],
            [
                'name' => 'Riesgo de Trabajo-Viudez',
            ],
            [
                'name' => 'Riesgo de Trabajo-Orfandad',
            ],
            [
                'name' => 'Riesgo de Trabajo-Ascendencia',
            ],
        ];
        foreach ($pensiones as $pension) {
            PensionType::create([
                'name' => $pension['name'],
                'status' => 'active',
                'modified_by' => 'david@fideicomiso.com',
            ]);
        }
    }
}
