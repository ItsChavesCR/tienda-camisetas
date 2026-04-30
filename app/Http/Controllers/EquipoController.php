<?php

namespace App\Http\Controllers;

use App\Models\Equipo;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::with('liga')
            ->withCount('camisetas')
            ->orderBy('nombre')
            ->paginate(10);

        return view('equipos.index', compact('equipos'));
    }

    public function show(Equipo $equipo)
    {
        $equipo->load('liga');
        $camisetas = $equipo->camisetas()
            ->with(['categoria', 'marca'])
            ->orderByDesc('id_camiseta')
            ->paginate(9);

        return view('equipos.show', compact('equipo', 'camisetas'));
    }
}
