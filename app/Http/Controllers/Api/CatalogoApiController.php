<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Liga;
use App\Models\Marca;
use App\Models\Talla;

class CatalogoApiController extends Controller
{
    public function categorias()
    {
        return response()->json(Categoria::orderBy('nombre')->get());
    }

    public function marcas()
    {
        return response()->json(Marca::orderBy('nombre')->get());
    }

    public function equipos()
    {
        return response()->json(Equipo::with('liga')->orderBy('nombre')->get());
    }

    public function ligas()
    {
        return response()->json(Liga::orderBy('nombre')->get());
    }

    public function tallas()
    {
        return response()->json(Talla::orderBy('id_talla')->get());
    }
}