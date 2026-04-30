<?php

namespace Database\Seeders;

use App\Models\Talla;
use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    public function run(): void
    {
        $tallas = [
            ['codigo' => 'S', 'descripcion' => 'Small'],
            ['codigo' => 'M', 'descripcion' => 'Medium'],
            ['codigo' => 'L', 'descripcion' => 'Large'],
            ['codigo' => 'XL', 'descripcion' => 'Extra Large'],
        ];

        foreach ($tallas as $talla) {
            Talla::create($talla);
        }
    }
}
