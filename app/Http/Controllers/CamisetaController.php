<?php

namespace App\Http\Controllers;

use App\Models\Camiseta;
use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Liga;
use App\Models\Marca;
use App\Models\Talla;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CamisetaController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q'));
        $idCategoria = $request->query('id_categoria');
        $idMarca = $request->query('id_marca');
        $idEquipo = $request->query('id_equipo');
        $idLiga = $request->query('id_liga');
        $version = $request->query('version');
        $precioMin = $request->query('precio_min');
        $precioMax = $request->query('precio_max');

        $query = Camiseta::with(['categoria', 'marca', 'equipo.liga'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nombre', 'like', "%{$search}%")
                        ->orWhere('descripcion', 'like', "%{$search}%");
                });
            })
            ->when($idCategoria, fn ($query) => $query->where('id_categoria', $idCategoria))
            ->when($idMarca, fn ($query) => $query->where('id_marca', $idMarca))
            ->when($idEquipo, fn ($query) => $query->where('id_equipo', $idEquipo))
            ->when($version, fn ($query) => $query->where('version', $version))
            ->when($idLiga, function ($query) use ($idLiga) {
                $query->whereHas('equipo.liga', function ($relationQuery) use ($idLiga) {
                    $relationQuery->where('id_liga', $idLiga);
                });
            })
            ->when($precioMin !== null && $precioMax !== null && $precioMin !== '' && $precioMax !== '', function ($query) use ($precioMin, $precioMax) {
                $query->whereBetween('precio', [(float) $precioMin, (float) $precioMax]);
            })
            ->when($precioMin !== null && $precioMin !== '' && ($precioMax === null || $precioMax === ''), fn ($query) => $query->where('precio', '>=', (float) $precioMin))
            ->when($precioMax !== null && $precioMax !== '' && ($precioMin === null || $precioMin === ''), fn ($query) => $query->where('precio', '<=', (float) $precioMax));

        $camisetas = $query->orderByDesc('id_camiseta')
            ->paginate(9)
            ->withQueryString();

        $categorias = Categoria::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();
        $equipos = Equipo::orderBy('nombre')->get();
        $ligas = Liga::orderBy('nombre')->get();
        $versiones = ['fan', 'player', 'retro'];

        return view('camisetas.index', compact(
            'camisetas',
            'search',
            'categorias',
            'marcas',
            'equipos',
            'ligas',
            'versiones',
            'idCategoria',
            'idMarca',
            'idEquipo',
            'idLiga',
            'version',
            'precioMin',
            'precioMax'
        ));
    }

    public function create()
    {
        return view('camisetas.create', $this->formDependencies());
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);
        $tallas = $validated['tallas'] ?? [];
        unset($validated['tallas']);

        $camiseta = Camiseta::create($validated);
        $camiseta->tallas()->sync($tallas);

        return redirect()
            ->route('camisetas.show', $camiseta->id_camiseta)
            ->with('success', 'Camiseta creada correctamente.');
    }

    public function show(Camiseta $camiseta)
    {
        $camiseta->load(['categoria', 'marca', 'equipo.liga', 'tallas']);

        return view('camisetas.show', compact('camiseta'));
    }

    public function edit(Camiseta $camiseta)
    {
        $camiseta->load('tallas');

        return view('camisetas.edit', array_merge(
            $this->formDependencies(),
            ['camiseta' => $camiseta]
        ));
    }

    public function update(Request $request, Camiseta $camiseta)
    {
        $validated = $this->validateRequest($request);
        $tallas = $validated['tallas'] ?? [];
        unset($validated['tallas']);

        $camiseta->update($validated);
        $camiseta->tallas()->sync($tallas);

        return redirect()
            ->route('camisetas.show', $camiseta->id_camiseta)
            ->with('success', 'Camiseta actualizada correctamente.');
    }

    public function destroy(Camiseta $camiseta)
    {
        $camiseta->tallas()->detach();
        $camiseta->delete();

        return redirect()
            ->route('camisetas.index')
            ->with('success', 'Camiseta eliminada correctamente.');
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

    protected function formDependencies(): array
    {
        return [
            'categorias' => Categoria::orderBy('nombre')->get(),
            'marcas' => Marca::orderBy('nombre')->get(),
            'equipos' => Equipo::with('liga')->orderBy('nombre')->get(),
            'tallas' => Talla::orderBy('id_talla')->get(),
        ];
    }
}
