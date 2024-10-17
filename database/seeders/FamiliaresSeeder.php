<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamiliaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beneficiaries')
            ->where('affiliate_status', 'active')
            ->update(['affiliate_status' => 'Activo']);
    }
}
