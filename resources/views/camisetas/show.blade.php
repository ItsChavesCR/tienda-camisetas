@extends('layouts.app')

@section('title', $camiseta->nombre)

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">{{ $camiseta->nombre }}</h1>
            <div class="btn-group btn-group-sm">
                <a href="{{ route('camisetas.edit', $camiseta) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('camisetas.destroy', $camiseta) }}" method="POST" onsubmit="return confirm('Deseas eliminar esta camiseta?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            @if($camiseta->imagen_url)
                <div class="mb-4">
                    <img src="{{ $camiseta->imagen_url }}" alt="{{ $camiseta->nombre }}" class="img-fluid rounded shadow-sm" style="max-height: 420px; object-fit: cover;">
                </div>
            @endif
            <p class="text-muted">{{ $camiseta->descripcion }}</p>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Version:</strong> {{ ucfirst($camiseta->version) }}</p>
                    <p><strong>Genero:</strong> {{ $camiseta->genero }}</p>
                    <p><strong>Temporada:</strong> {{ $camiseta->temporada }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($camiseta->precio, 2) }}</p>
                    <p><strong>Material:</strong> {{ $camiseta->material }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Tipo de manga:</strong> {{ $camiseta->tipo_manga }}</p>
                    <p><strong>Numero:</strong> {{ $camiseta->numero ?? 'N/A' }}</p>
                    <p><strong>Categoria:</strong> {{ $camiseta->categoria->nombre }}</p>
                    <p><strong>Marca:</strong> {{ $camiseta->marca->nombre }}</p>
                    <p><strong>Equipo:</strong> {{ $camiseta->equipo->nombre }} ({{ $camiseta->equipo->liga->nombre }})</p>
                </div>
            </div>
            <p class="mb-0"><strong>Tallas:</strong>
                @forelse($camiseta->tallas as $talla)
                    <span class="badge bg-dark">{{ $talla->codigo }}</span>
                @empty
                    <span class="text-muted">Sin tallas asignadas</span>
                @endforelse
            </p>
        </div>
    </div>
@endsection
