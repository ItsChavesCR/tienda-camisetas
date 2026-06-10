<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Camiseta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CamisetaApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Camiseta::with(['categoria', 'marca', 'equipo.liga', 'tallas']);

        if ($request->filled('q')) {
            $search = trim($request->q);

            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('nombre', 'like', "%{$search}%")
                    ->orWhere('descripcion', 'like', "%{$search}%");
            });
        }

        if ($request->filled('id_categoria')) {
            $query->where('id_categoria', $request->id_categoria);
        }

        if ($request->filled('id_marca')) {
            $query->where('id_marca', $request->id_marca);
        }

        if ($request->filled('id_equipo')) {
            $query->where('id_equipo', $request->id_equipo);
        }

        if ($request->filled('version')) {
            $query->where('version', $request->version);
        }

        if ($request->filled('id_liga')) {
            $query->whereHas('equipo.liga', function ($q) use ($request) {
                $q->where('id_liga', $request->id_liga);
            });
        }

        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', (float) $request->precio_min);
        }

        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', (float) $request->precio_max);
        }

        return response()->json(
            $query->orderByDesc('id_camiseta')->paginate(6)
        );
    }

    public function show(Camiseta $camiseta)
    {
        $camiseta->load(['categoria', 'marca', 'equipo.liga', 'tallas']);

        return response()->json($camiseta);
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        $tallas = $validated['tallas'] ?? [];
        unset($validated['tallas']);

        $camiseta = Camiseta::create($validated);
        $camiseta->tallas()->sync($tallas);

        return response()->json(
            $camiseta->load(['categoria', 'marca', 'equipo.liga', 'tallas']),
            201
        );
    }

    public function update(Request $request, Camiseta $camiseta)
    {
        $validated = $this->validateRequest($request);

        $tallas = $validated['tallas'] ?? [];
        unset($validated['tallas']);

        $camiseta->update($validated);
        $camiseta->tallas()->sync($tallas);

        return response()->json(
            $camiseta->load(['categoria', 'marca', 'equipo.liga', 'tallas'])
        );
    }

    public function destroy(Camiseta $camiseta)
    {
        $camiseta->tallas()->detach();
        $camiseta->delete();

        return response()->json([
            'message' => 'Camiseta eliminada correctamente.'
        ]);
    }

    protected function validateRequest(Request $request): array
    {
        return $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'version' => ['required', Rule::in(['fan', 'player', 'retro'])],
            'genero' => ['required', 'string', 'max:50'],
            'temporada' => ['required', 'string', 'max:50'],
            'precio' => ['required', 'numeric', 'min:0'],
            'material' => ['required', 'string', 'max:120'],
            'tipo_manga' => ['required', 'string', 'max:50'],
            'numero' => ['nullable', 'integer', 'min:0', 'max:999'],
            'imagen_url' => ['nullable', 'url', 'max:2048'],
            'id_categoria' => ['required', 'exists:categorias,id_categoria'],
            'id_marca' => ['required', 'exists:marcas,id_marca'],
            'id_equipo' => ['required', 'exists:equipos,id_equipo'],
            'tallas' => ['nullable', 'array'],
            'tallas.*' => ['exists:tallas,id_talla'],
        ]);
    }
}