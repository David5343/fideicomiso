<?php

namespace Database\Seeders;

use App\Models\Humanos\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bancos = [
            [
                'key' => '002',
                'name' => 'BANAMEX',
                'legal_name' => 'Banco Nacional de México, S.A., Institución de Banca Múltiple, Grupo Financiero Banamex'
            ],
            [
                'key' => '006',
                'name' => 'BANCOMEXT',
                'legal_name' => 'Banco Nacional de Comercio Exterior, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'
            ],
            [
                'key' => '009',
                'name' => 'BANOBRAS',
                'legal_name' => 'Banco Nacional de Obras y Servicios Públicos, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'
            ],
            [
                'key' => '012',
                'name' => 'BBVA BANCOMER',
                'legal_name' => 'BBVA Bancomer, S.A., Institución de Banca Múltiple, Grupo Financiero BBVA Bancomer'
            ],
            [
                'key' => '014',
                'name' => 'SANTANDER',
                'legal_name' => 'Banco Santander (México), S.A.,Institución de Banca Múltiple, Grupo Financiero Santander'
            ],
            [
                'key' => '019',
                'name' => 'BANJERCITO',
                'legal_name' => 'Banco Nacional del Ejército, Fuerza Aérea y Armada, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'
            ],
            [
                'key' => '021',
                'name' => 'HSBC',
                'legal_name' => 'HSBC México, S.A., institución De Banca Múltiple, Grupo Financiero HSBC'
            ],
            [
                'key' => '030',
                'name' => 'BAJIO',
                'legal_name' => 'Banco del Bajío, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '032',
                'name' => 'IXE',
                'legal_name' => 'IXE Banco, S.A., Institución de Banca Múltiple, IXE Grupo Financiero'
            ],
            [
                'key' => '036',
                'name' => 'INBURSA',
                'legal_name' => 'Banco Inbursa, S.A., Institución de Banca Múltiple, Grupo Financiero Inbursa'
            ],
            [
                'key' => '037',
                'name' => 'INTERACCIONES',
                'legal_name' => 'Banco Interacciones, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '042',
                'name' => 'MIFEL',
                'legal_name' => 'Banca Mifel, S.A., Institución de Banca Múltiple, Grupo Financiero Mifel'
            ],
            [
                'key' => '044',
                'name' => 'SCOTIABANK', 'legal_name' => 'Scotiabank Inverlat, S.A.'
            ],
            [
                'key' => '058',
                'name' => 'BANREGIO',
                'legal_name' => 'Banco Regional de Monterrey, S.A., Institución de Banca Múltiple, Banregio Grupo Financiero'
            ],
            [
                'key' => '059',
                'name' => 'INVEX',
                'legal_name' => 'Banco Invex, S.A., Institución de Banca Múltiple, Invex Grupo Financiero'
            ],
            [
                'key' => '060',
                'name' => 'BANSI',
                'legal_name' => 'Bansi, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '062',
                'name' => 'AFIRME',
                'legal_name' => 'Banca Afirme, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '072',
                'name' => 'BANORTE',
                'legal_name' => 'Banco Mercantil del Norte, S.A., Institución de Banca Múltiple, Grupo Financiero Banorte'
            ],
            [
                'key' => '102',
                'name' => 'THE ROYAL BANK',
                'legal_name' => 'The Royal Bank of Scotland México, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '103',
                'name' => 'AMERICAN EXPRESS',
                'legal_name' => 'American Express Bank (México), S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '106',
                'name' => 'BAMSA',
                'legal_name' => 'Bank of America México, S.A., Institución de Banca Múltiple, Grupo Financiero Bank of America'
            ],
            [
                'key' => '108',
                'name' => 'TOKYO',
                'legal_name' => 'Bank of Tokyo-Mitsubishi UFJ (México), S.A.'
            ],
            [
                'key' => '110',
                'name' => 'JP MORGAN',
                'legal_name' => 'Banco J.P. Morgan, S.A., Institución de Banca Múltiple, J.P. Morgan Grupo Financiero'
            ],
            [
                'key' => '112',
                'name' => 'BMONEX',
                'legal_name' => 'Banco Monex, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '113',
                'name' => 'VE POR MAS',
                'legal_name' => 'Banco Ve Por Mas, S.A. Institución de Banca Múltiple'
            ],
            [
                'key' => '116',
                'name' => 'ING',
                'legal_name' => 'ING Bank (México), S.A., Institución de Banca Múltiple, ING Grupo Financiero'
            ],
            [
                'key' => '124',
                'name' => 'DEUTSCHE',
                'legal_name' => 'Deutsche Bank México, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '126',
                'name' => 'CREDIT SUISSE',
                'legal_name' => 'Banco Credit Suisse (México), S.A. Institución de Banca Múltiple, Grupo Financiero Credit Suisse (México)'
            ],
            [
                'key' => '127',
                'name' => 'AZTECA',
                'legal_name' => 'Banco Azteca, S.A. Institución de Banca Múltiple.'
            ],
            [
                'key' => '128',
                'name' => 'AUTOFIN',
                'legal_name' => 'Banco Autofin México, S.A. Institución de Banca Múltiple'
            ],
            [
                'key' => '129',
                'name' => 'BARCLAYS',
                'legal_name' => 'Barclays Bank México, S.A., Institución de Banca Múltiple, Grupo Financiero Barclays México'
            ],
            [
                'key' => '130',
                'name' => 'COMPARTAMOS',
                'legal_name' => 'Banco Compartamos, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '131',
                'name' => 'BANCO FAMSA',
                'legal_name' => 'Banco Ahorro Famsa, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '132',
                'name' => 'BMULTIVA',
                'legal_name' => 'Banco Multiva, S.A., Institución de Banca Múltiple, Multivalores Grupo Financiero'
            ],
            [
                'key' => '133',
                'name' => 'ACTINVER',
                'legal_name' => 'Banco Actinver, S.A. Institución de Banca Múltiple, Grupo Financiero Actinver'
            ],
            [
                'key' => '134',
                'name' => 'WAL-MART',
                'legal_name' => 'Banco Wal-Mart de México Adelante, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '135',
                'name' => 'NAFIN',
                'legal_name' => 'Nacional Financiera, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'
            ],
            [
                'key' => '136',
                'name' => 'INTERBANCO',
                'legal_name' => 'Inter Banco, S.A. Institución de Banca Múltiple'
            ],
            [
                'key' => '137',
                'name' => 'BANCOPPEL',
                'legal_name' => 'BanCoppel, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '138',
                'name' => 'ABC CAPITAL',
                'legal_name' => 'ABC Capital, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '139',
                'name' => 'UBS BANK',
                'legal_name' => 'UBS Bank México, S.A., Institución de Banca Múltiple, UBS Grupo Financiero'
            ],
            [
                'key' => '140',
                'name' => 'CONSUBANCO',
                'legal_name' => 'Consubanco, S.A. Institución de Banca Múltiple'
            ],
            [
                'key' => '141',
                'name' => 'VOLKSWAGEN',
                'legal_name' => 'Volkswagen Bank, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '143',
                'name' => 'CIBANCO',
                'legal_name' => 'CIBanco, S.A.'
            ],
            [
                'key' => '145',
                'name' => 'BBASE',
                'legal_name' => 'Banco Base, S.A., Institución de Banca Múltiple'
            ],
            [
                'key' => '166',
                'name' => 'BANSEFI',
                'legal_name' => 'Banco del Ahorro Nacional y Servicios Financieros, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'
            ],
            [
                'key' => '168',
                'name' => 'HIPOTECARIA FEDERAL',
                'legal_name' => 'Sociedad Hipotecaria Federal, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo' 
            ],
            [
                'key' => '600',
                'name' => 'MONEXCB',
                'legal_name' => 'Monex Casa de Bolsa, S.A. de C.V. Monex Grupo Financiero'
            ],
            [
                'key' => '601',
                'name' => 'GBM',
                'legal_name' => 'GBM Grupo Bursátil Mexicano, S.A. de C.V. Casa de Bolsa'
            ],
            [
                'key' => '602',
                'name' => 'MASARI',
                'legal_name' => 'Masari Casa de Bolsa, S.A.'
            ],
            [
                'key' => '605',
                'name' => 'VALUE',
                'legal_name' => 'Value, S.A. de C.V. Casa de Bolsa'
            ],
            [
                'key' => '606',
                'name' => 'ESTRUCTURADORES',
                'legal_name' => 'Estructuradores del Mercado de Valores Casa de Bolsa, S.A. de C.V.'
            ],
            [
                'key' => '607',
                'name' => 'TIBER',
                'legal_name' => 'Casa de Cambio Tiber, S.A. de C.V.'
            ],
            [
                'key' => '608',
                'name' => 'VECTOR',
                'legal_name' => 'Vector Casa de Bolsa, S.A. de C.V.'
            ],
            [
                'key' => '610',
                'name' => 'B&B',
                'legal_name' => 'B y B, Casa de Cambio, S.A. de C.V.'
            ],
            [
                'key' => '614',
                'name' => 'ACCIVAL',
                'legal_name' => 'Acciones y Valores Banamex, S.A. de C.V., Casa de Bolsa'
            ],
            [
                'key' => '615',
                'name' => 'MERRILL LYNCH',
                'legal_name' => 'Merrill Lynch México, S.A. de C.V. Casa de Bolsa'
            ],
            [
                'key' => '616',
                'name' => 'FINAMEX',
                'legal_name' => 'Casa de Bolsa Finamex, S.A. de C.V.'
            ],
            [
                'key' => '617',
                'name' => 'VALMEX',
                'legal_name' => 'Valores Mexicanos Casa de Bolsa, S.A. de C.V.'
            ],
            [
                'key' => '618',
                'name' => 'UNICA',
                'legal_name' => 'Unica Casa de Cambio, S.A. de C.V.'
            ],
            [
                'key' => '619',
                'name' => 'MAPFRE',
                'legal_name' => 'MAPFRE Tepeyac, S.A.'
            ],
            [
                'key' => '620',
                'name' => 'PROFUTURO',
                'legal_name' => 'Profuturo G.N.P., S.A. de C.V., Afore'
            ],
            [
                'key' => '621',
                'name' => 'CB ACTINVER',
                'legal_name' => 'Actinver Casa de Bolsa, S.A. de C.V.'
            ],
            [
                'key' => '622',
                'name' => 'OACTIN',
                'legal_name' => 'OPERADORA ACTINVER, S.A. DE C.V.'
            ],
            [
                'key' => '623',
                'name' => 'SKANDIA',
                'legal_name' => 'Skandia Vida, S.A. de C.V.'
            ],
            [
                'key' => '626',
                'name' => 'CBDEUTSCHE',
                'legal_name' => 'Deutsche Securities, S.A. de C.V. CASA DE BOLSA'
            ],
            [
                'key' => '627',
                'name' => 'ZURICH',
                'legal_name' => 'Zurich Compañía de Seguros, S.A.'
            ],
            [
                'key' => '628',
                'name' => 'ZURICHVI',
                'legal_name' => 'Zurich Vida, Compañía de Seguros, S.A.'
            ],
            [
                'key' => '629',
                'name' => 'SU CASITA',
                'legal_name' => 'Hipotecaria Su Casita, S.A. de C.V. SOFOM ENR'
            ],
            [
                'key' => '630',
                'name' => 'CB INTERCAM',
                'legal_name' => 'Intercam Casa de Bolsa, S.A. de C.V.'
            ],
            [
                'key' => '631',
                'name' => 'CI BOLSA',
                'legal_name' => 'CI Casa de Bolsa, S.A. de C.V.'
            ],
            [
                'key' => '632',
                'name' => 'BULLTICK CB',
                'legal_name' => 'Bulltick Casa de Bolsa, S.A., de C.V.'
            ],
            [
                'key' => '633',
                'name' => 'STERLING',
                'legal_name' => 'Sterling Casa de Cambio, S.A. de C.V.'
            ],
            [
                'key' => '634',
                'name' => 'FINCOMUN',
                'legal_name' => 'Fincomún, Servicios Financieros Comunitarios, S.A. de C.V.'
            ],
            [
                'key' => '636',
                'name' => 'HDI SEGUROS',
                'legal_name' => 'HDI Seguros, S.A. de C.V.'
            ],
            [
                'key' => '637',
                'name' => 'ORDER',
                'legal_name' => 'Order Express Casa de Cambio, S.A. de C.V'
            ],
            [
                'key' => '638',
                'name' => 'AKALA',
                'legal_name' => 'Akala, S.A. de C.V., Sociedad Financiera Popular'
            ],
            [
                'key' => '640',
                'name' => 'CB JPMORGAN',
                'legal_name' => 'J.P. Morgan Casa de Bolsa, S.A. de C.V. J.P. Morgan Grupo Financiero'
            ],
            [
                'key' => '642',
                'name' => 'REFORMA',
                'legal_name' => 'Operadora de Recursos Reforma, S.A. de C.V., S.F.P.'
            ],
            [
                'key' => '646',
                'name' => 'STP',
                'legal_name' => 'Sistema de Transferencias y Pagos STP, S.A. de C.V.SOFOM ENR'
            ],
            [
                'key' => '647',
                'name' => 'TELECOMM',
                'legal_name' => 'Telecomunicaciones de México'
            ],
            [
                'key' => '648',
                'name' => 'EVERCORE',
                'legal_name' => 'Evercore Casa de Bolsa, S.A. de C.V.'
            ],
            [
                'key' => '649',
                'name' => 'SKANDIA',
                'legal_name' => 'Skandia Operadora de Fondos, S.A. de C.V.'
            ],
            [
                'key' => '651',
                'name' => 'SEGMTY',
                'legal_name' => 'Seguros Monterrey New York Life, S.A de C.V'
            ],
            [
                'key' => '652',
                'name' => 'ASEA',
                'legal_name' => 'Solución Asea, S.A. de C.V., Sociedad Financiera Popular'
            ],
            [
                'key' => '653',
                'name' => 'KUSPIT',
                'legal_name' => 'Kuspit Casa de Bolsa, S.A. de C.V.'
            ],
            [
                'key' => '655',
                'name' => 'SOFIEXPRESS',
                'legal_name' => 'J.P. SOFIEXPRESS, S.A. de C.V., S.F.P.'
            ],
            [
                'key' => '656',
                'name' => 'UNAGRA',
                'legal_name' => 'UNAGRA, S.A. de C.V., S.F.P.'
            ],
            [
                'key' => '659',
                'name' => 'OPCIONES EMPRESARIALES DEL NOROESTE',
                'legal_name' => 'OPCIONES EMPRESARIALES DEL NORESTE, S.A. DE C.V., S.F.P.'
            ],
            [
                'key' => '901',
                'name' => 'CLS',
                'legal_name' => 'Cls Bank International'
            ],
            [
                'key' => '902',
                'name' => 'INDEVAL',
                'legal_name' => 'SD. Indeval, S.A. de C.V.'
            ],
            [
                'key' => '670',
                'name' => 'LIBERTAD',
                'legal_name' => 'Libertad Servicios Financieros, S.A. De C.V.'
            ],
            [
                'key' => '999',
                'name' => 'N/A',
                'legal_name' => ''
            ]
        ];       
        foreach($bancos as $banco){
            Bank::create([
                'key' => $banco['key'],
                'name'=>$banco['name'],
                'legal_name' =>$banco['legal_name'],
                'status'=>'active',
                'modified_by'=>'david@fideicomiso.com',
            ]);
        };
    }
}
