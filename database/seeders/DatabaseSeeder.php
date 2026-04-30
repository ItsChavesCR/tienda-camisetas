<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
            MarcaSeeder::class,
            LigaSeeder::class,
            EquipoSeeder::class,
            TallaSeeder::class,
            CamisetaSeeder::class,
        ]);
    }
}
