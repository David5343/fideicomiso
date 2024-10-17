<?php

namespace Database\Seeders;

use App\Models\Humanos\State;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            [
                'key' => '001',
                'name' => 'AGUASCALIENTES',
            ],
            [
                'key' => '002',
                'name' => 'BAJA CALIFORNIA',
            ],
            [
                'key' => '003',
                'name' => 'BAJA CALIFORNIA SUR',
            ],
            [
                'key' => '004',
                'name' => 'CAMPECHE',
            ],
            [
                'key' => '005',
                'name' => 'COAHUILA DE ZARAGOZA',
            ],
            [
                'key' => '006',
                'name' => 'COLIMA',
            ],
            [
                'key' => '007',
                'name' => 'CHIAPAS',
            ],
            [
                'key' => '008',
                'name' => 'CHIHUAHUA',
            ],
            [
                'key' => '009',
                'name' => 'CIUDAD DE MEXICO',
            ],
            [
                'key' => '010',
                'name' => 'DURANGO',
            ],
            [
                'key' => '011',
                'name' => 'GUANAJUATO',
            ],
            [
                'key' => '012',
                'name' => 'GUERRERO',
            ],
            [
                'key' => '013',
                'name' => 'HIDALGO',
            ],
            [
                'key' => '014',
                'name' => 'JALISCO',
            ],
            [
                'key' => '015',
                'name' => 'MEXICO',
            ],
            [
                'key' => '016',
                'name' => 'MICHOACAN DE OCAMPO',
            ],
            [
                'key' => '017',
                'name' => 'MORELOS',
            ],
            [
                'key' => '018',
                'name' => 'NAYARIT',
            ],
            [
                'key' => '019',
                'name' => 'NUEVO LEON',
            ],
            [
                'key' => '020',
                'name' => 'OAXACA',
            ],
            [
                'key' => '021',
                'name' => 'PUEBLA',
            ],
            [
                'key' => '022',
                'name' => 'QUERETARO DE ARTEAGA',
            ],
            [
                'key' => '023',
                'name' => 'QUINTANA ROO',
            ],
            [
                'key' => '024',
                'name' => 'SAN LUIS POTOSI',
            ],
            [
                'key' => '025',
                'name' => 'SINALOA',
            ],
            [
                'key' => '026',
                'name' => 'SONORA',
            ],
            [
                'key' => '027',
                'name' => 'TABASCO',
            ],
            [
                'key' => '028',
                'name' => 'TAMAULIPAS',
            ],
            [
                'key' => '029',
                'name' => 'TLAXCALA',
            ],
            [
                'key' => '030',
                'name' => 'VERACRUZ DE IGNACIO DE LA LLAVE',
            ],
            [
                'key' => '031',
                'name' => 'YUCATAN',
            ],
            [
                'key' => '032',
                'name' => 'ZACATECAS',
            ],
        ];
        foreach ($estados as $estado) {
            State::create([
                'key' => $estado['key'],
                'name' => $estado['name'],
                'status' => 'active',
                'modified_by' => 'david@fideicomiso.com',
            ]);
        }
    }
}
