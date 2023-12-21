<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'David Sánchez de la Cruz',
            'email' => 'david@fideicomiso.com',
            'password' => bcrypt('david2023'),
            'status' => 'active'
        ])->assignRole('Admin');
        //]);
        User::create([
            'name' => 'Luis Adelfo Roblez Vazquez',
            'email' => 'adelfo@fideicomiso.com',
            'password' => bcrypt('adelfo2023'),
            'status' => 'active'
        ])->assignRole('Admin');
        //]);

    }
}
