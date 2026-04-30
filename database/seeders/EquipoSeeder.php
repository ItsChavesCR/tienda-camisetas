<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Liga;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    public function run(): void
    {
        $ligas = Liga::pluck('id_liga', 'nombre');

        $equipos = [
            ['nombre' => 'Manchester City', 'id_liga' => $ligas['Premier League']],
            ['nombre' => 'Liverpool', 'id_liga' => $ligas['Premier League']],
            ['nombre' => 'Real Madrid', 'id_liga' => $ligas['LaLiga']],
            ['nombre' => 'Barcelona', 'id_liga' => $ligas['LaLiga']],
            ['nombre' => 'Juventus', 'id_liga' => $ligas['Serie A']],
            ['nombre' => 'AC Milan', 'id_liga' => $ligas['Serie A']],
        ];

        foreach ($equipos as $equipo) {
            Equipo::create($equipo);
        }
    }
}
