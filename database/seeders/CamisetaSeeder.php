<?php

namespace Database\Seeders;

use App\Models\Camiseta;
use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Liga;
use App\Models\Marca;
use App\Models\Talla;
use Illuminate\Database\Seeder;

class CamisetaSeeder extends Seeder
{
    public function run(): void
    {
        $placeholder = 'https://via.placeholder.com/400x500?text=Camiseta';
        $imagenesPorNombre = [
            'Jude Bellingham' => 'https://images.openai.com/static-rsc-4/dChrN9gofu8aPQrdlHzBdTtYcTEEn_CtaTGPNos00yIo7hxE-wK1YTIyj8Ntd9inPIU9rk4A1LlMHlqAJKkYPM0HDP55z5T6INfE4LnqBFpAeHe5nmWjF3hr4w9XKrTOYIF8w_2aONI5_wmKaLdkPWhiEbYIbKRSaqyNGrcC9ik?purpose=inline',
            'Vinicius Jr' => 'https://www.sportline.cr/media/catalog/product/i/u/iu5011_apparel-front-center-view.jpg?optimize=medium&bg-color=255,255,255&fit=bounds&height=&width=&canvas=:',
            'Robert Lewandowski' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/barcelona-home-jersey.jpg',
            'Erling Haaland' => 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa/global/770438/01/fnd/PNA/fmt/png',
            'Lionel Messi' => 'https://acdn-us.mitiendanube.com/stores/002/322/390/products/camisa-inter-miami-home-messi1-bb6595c5fab7b8420217428538327571-1024-1024.webp',
        ];

        $catalogo = [
            [
                'nombre' => 'Jude Bellingham',
                'numero' => 5,
                'descripcion' => 'Camiseta del Real Madrid temporada 2024/25',
                'categoria' => 'Futbol - Club',
                'version' => 'player',
                'genero' => 'Hombre',
                'temporada' => '2024/25',
                'precio' => 89900,
                'tallas' => ['S', 'M', 'L', 'XL'],
                'marca' => 'Adidas',
                'liga' => 'La Liga',
                'equipo' => 'Real Madrid',
                'material' => 'Polyester',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Vinicius Jr',
                'numero' => 7,
                'descripcion' => 'Camiseta local Real Madrid',
                'categoria' => 'Futbol - Club',
                'version' => 'fan',
                'genero' => 'Hombre',
                'temporada' => '2024/25',
                'precio' => 79900,
                'tallas' => ['S', 'M', 'L', 'XL'],
                'marca' => 'Adidas',
                'liga' => 'La Liga',
                'equipo' => 'Real Madrid',
                'material' => 'Polyester',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Robert Lewandowski',
                'numero' => 9,
                'descripcion' => 'Camiseta FC Barcelona 2024',
                'categoria' => 'Futbol - Club',
                'version' => 'player',
                'genero' => 'Hombre',
                'temporada' => '2024/25',
                'precio' => 89900,
                'tallas' => ['S', 'M', 'L', 'XL'],
                'marca' => 'Nike',
                'liga' => 'La Liga',
                'equipo' => 'Barcelona',
                'material' => 'Dri-FIT',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Pedri',
                'numero' => 8,
                'descripcion' => 'Camiseta local FC Barcelona',
                'categoria' => 'Futbol - Club',
                'version' => 'fan',
                'genero' => 'Hombre',
                'temporada' => '2024/25',
                'precio' => 74900,
                'tallas' => ['S', 'M', 'L'],
                'marca' => 'Nike',
                'liga' => 'La Liga',
                'equipo' => 'Barcelona',
                'material' => 'Dri-FIT',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Erling Haaland',
                'numero' => 9,
                'descripcion' => 'Camiseta Manchester City',
                'categoria' => 'Futbol - Club',
                'version' => 'player',
                'genero' => 'Hombre',
                'temporada' => '2024/25',
                'precio' => 94900,
                'tallas' => ['M', 'L', 'XL'],
                'marca' => 'Puma',
                'liga' => 'Premier League',
                'equipo' => 'Manchester City',
                'material' => 'DryCell',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Kevin De Bruyne',
                'numero' => 17,
                'descripcion' => 'Camiseta Manchester City',
                'categoria' => 'Futbol - Club',
                'version' => 'fan',
                'genero' => 'Hombre',
                'temporada' => '2024/25',
                'precio' => 79900,
                'tallas' => ['S', 'M', 'L'],
                'marca' => 'Puma',
                'liga' => 'Premier League',
                'equipo' => 'Manchester City',
                'material' => 'DryCell',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Lionel Messi',
                'numero' => 10,
                'descripcion' => 'Camiseta Inter Miami',
                'categoria' => 'Futbol - Club',
                'version' => 'player',
                'genero' => 'Hombre',
                'temporada' => '2024',
                'precio' => 99900,
                'tallas' => ['S', 'M', 'L', 'XL'],
                'marca' => 'Adidas',
                'liga' => 'MLS',
                'equipo' => 'Inter Miami',
                'material' => 'Polyester',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Cristiano Ronaldo',
                'numero' => 7,
                'descripcion' => 'Camiseta Al Nassr',
                'categoria' => 'Futbol - Club',
                'version' => 'player',
                'genero' => 'Hombre',
                'temporada' => '2024',
                'precio' => 94900,
                'tallas' => ['S', 'M', 'L', 'XL'],
                'marca' => 'Nike',
                'liga' => 'Saudi League',
                'equipo' => 'Al Nassr',
                'material' => 'Dri-FIT',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Kylian Mbappe',
                'numero' => 7,
                'descripcion' => 'Camiseta PSG',
                'categoria' => 'Futbol - Club',
                'version' => 'player',
                'genero' => 'Hombre',
                'temporada' => '2024',
                'precio' => 89900,
                'tallas' => ['S', 'M', 'L'],
                'marca' => 'Nike',
                'liga' => 'Ligue 1',
                'equipo' => 'PSG',
                'material' => 'Dri-FIT',
                'tipo_manga' => 'Corta',
            ],
            [
                'nombre' => 'Harry Kane',
                'numero' => 9,
                'descripcion' => 'Camiseta Bayern Munich',
                'categoria' => 'Futbol - Club',
                'version' => 'player',
                'genero' => 'Hombre',
                'temporada' => '2024',
                'precio' => 89900,
                'tallas' => ['M', 'L', 'XL'],
                'marca' => 'Adidas',
                'liga' => 'Bundesliga',
                'equipo' => 'Bayern Munich',
                'material' => 'Polyester',
                'tipo_manga' => 'Corta',
            ],
        ];

        foreach ($catalogo as $item) {
            $categoria = Categoria::where('nombre', $item['categoria'])->first();
            if (! $categoria) {
                $categoria = Categoria::firstOrCreate(
                    ['nombre' => $item['categoria']],
                    ['descripcion' => 'Categoria de camisetas deportivas']
                );
            }

            $marca = Marca::where('nombre', $item['marca'])->first();
            if (! $marca) {
                $marca = Marca::firstOrCreate(
                    ['nombre' => $item['marca']],
                    ['pais_origen' => 'N/A']
                );
            }

            $liga = Liga::where('nombre', $item['liga'])->first();
            if (! $liga) {
                $liga = Liga::firstOrCreate(['nombre' => $item['liga']]);
            }

            $equipo = Equipo::where('nombre', $item['equipo'])->first();
            if (! $equipo) {
                $equipo = Equipo::firstOrCreate(
                    ['nombre' => $item['equipo']],
                    ['id_liga' => $liga->id_liga]
                );
            } elseif ((int) $equipo->id_liga !== (int) $liga->id_liga) {
                $equipo->update(['id_liga' => $liga->id_liga]);
            }

            $camiseta = Camiseta::updateOrCreate(
                [
                    'nombre' => $item['nombre'],
                    'numero' => $item['numero'],
                    'temporada' => $item['temporada'],
                    'id_equipo' => $equipo->id_equipo,
                ],
                [
                    'descripcion' => $item['descripcion'],
                    'version' => strtolower($item['version']),
                    'genero' => $item['genero'],
                    'precio' => $item['precio'],
                    'material' => $item['material'],
                    'tipo_manga' => $item['tipo_manga'],
                    'imagen_url' => $imagenesPorNombre[$item['nombre']] ?? $placeholder,
                    'id_categoria' => $categoria->id_categoria,
                    'id_marca' => $marca->id_marca,
                    'id_equipo' => $equipo->id_equipo,
                ]
            );

            $tallaIds = [];
            foreach ($item['tallas'] as $codigoTalla) {
                $talla = Talla::firstOrCreate(
                    ['codigo' => strtoupper($codigoTalla)],
                    ['descripcion' => 'Talla '.strtoupper($codigoTalla)]
                );
                $tallaIds[] = $talla->id_talla;
            }

            $camiseta->tallas()->sync($tallaIds);
        }
    }
}
