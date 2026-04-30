<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Marca;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('camisetas')
            ->orderBy('nombre')
            ->paginate(10);

        return view('categorias.index', compact('categorias'));
    }

    public function show(Categoria $categoria)
    {
        $camisetas = $categoria->camisetas()
            ->with(['marca', 'equipo'])
            ->orderByDesc('id_camiseta')
            ->paginate(9)
            ->withQueryString();

        return view('camisetas.index', [
            'camisetas' => $camisetas,
            'search' => '',
            'categorias' => Categoria::orderBy('nombre')->get(),
            'marcas' => Marca::orderBy('nombre')->get(),
            'equipos' => Equipo::orderBy('nombre')->get(),
            'versiones' => ['fan', 'player', 'retro'],
            'idCategoria' => $categoria->id_categoria,
            'idMarca' => null,
            'idEquipo' => null,
            'version' => null,
            'categoriaActual' => $categoria,
        ]);
    }
}
