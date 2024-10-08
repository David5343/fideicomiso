<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(AreasSeeder::class);
        // $this->call(BancosSeeder::class);
        // $this->call(EstadosSeeder::class);
        // $this->call(MunicipiosSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(PermissionSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(DependencySeeder::class);
        // $this->call(SubdependencySeeder::class);
        $this->call(FamiliaresSeeder::class);
    }
}
