<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Selecciones Nacionales', 'descripcion' => 'Camisetas oficiales de selecciones nacionales.'],
            ['nombre' => 'Clubes Europeos', 'descripcion' => 'Equipos top de las principales ligas de Europa.'],
            ['nombre' => 'Clubes Sudamericanos', 'descripcion' => 'Camisetas historicas y actuales de clubes sudamericanos.'],
            ['nombre' => 'Ediciones Retro', 'descripcion' => 'Modelos clasicos para coleccionistas y nostalgia futbolera.'],
            ['nombre' => 'Entrenamiento', 'descripcion' => 'Prendas deportivas para entreno y uso diario.'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
