<?php

namespace Database\Seeders;

use App\Models\Liga;
use Illuminate\Database\Seeder;

class LigaSeeder extends Seeder
{
    public function run(): void
    {
        $ligas = [
            ['nombre' => 'Premier League'],
            ['nombre' => 'LaLiga'],
            ['nombre' => 'Serie A'],
        ];

        foreach ($ligas as $liga) {
            Liga::create($liga);
        }
    }
}
