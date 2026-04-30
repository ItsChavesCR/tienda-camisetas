@extends('layouts.app')

@section('title', 'Catalogo de Camisetas')

@section('content')
    <style>
        .card img {
            transition: transform 0.3s;
        }

        .card:hover img {
            transform: scale(1.05);
        }
    </style>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-0">Catalogo de Camisetas</h1>
            @isset($categoriaActual)
                <small class="text-muted">Filtrando por categoria: {{ $categoriaActual->nombre }}</small>
            @endisset
        </div>
        <a href="{{ route('camisetas.create') }}" class="btn btn-primary">Nueva Camiseta</a>
    </div>

    <form method="GET" action="{{ route('camisetas.index') }}" class="row g-2 mb-4 p-3 bg-white border rounded shadow-sm">
        <div class="col-md-3">
            <input type="text" name="q" class="form-control" placeholder="Buscar por nombre o descripcion" value="{{ $search ?? request('q') }}">
        </div>
        <div class="col-md-3">
            <select name="id_categoria" class="form-select">
                <option value="">Todas las categorias</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}" @selected(($idCategoria ?? request('id_categoria')) == $categoria->id_categoria)>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="id_liga" class="form-select">
                <option value="">Todas las ligas</option>
                @foreach(($ligas ?? collect()) as $liga)
                    <option value="{{ $liga->id_liga }}" @selected(($idLiga ?? request('id_liga')) == $liga->id_liga)>
                        {{ $liga->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="id_marca" class="form-select">
                <option value="">Todas las marcas</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id_marca }}" @selected(($idMarca ?? request('id_marca')) == $marca->id_marca)>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="id_equipo" class="form-select">
                <option value="">Todos los equipos</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id_equipo }}" @selected(($idEquipo ?? request('id_equipo')) == $equipo->id_equipo)>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="version" class="form-select">
                <option value="">Todas las versiones</option>
                @foreach($versiones as $versionItem)
                    <option value="{{ $versionItem }}" @selected(($version ?? request('version')) == $versionItem)>
                        {{ ucfirst($versionItem) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <input type="number" name="precio_min" class="form-control" min="0" step="0.01" placeholder="Precio minimo" value="{{ $precioMin ?? request('precio_min') }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="precio_max" class="form-control" min="0" step="0.01" placeholder="Precio maximo" value="{{ $precioMax ?? request('precio_max') }}">
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-outline-dark">Filtrar</button>
        </div>
        <div class="col-md-2 d-grid">
            <a href="{{ route('camisetas.index') }}" class="btn btn-outline-secondary">Limpiar</a>
        </div>
    </form>

    <div class="row g-4">
        @forelse($camisetas as $camiseta)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $camiseta->imagen_url ?? 'https://via.placeholder.com/400x500' }}"
                         class="card-img-top"
                         alt="{{ $camiseta->nombre }}"
                         style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $camiseta->nombre }}</h5>
                        <p class="card-text text-muted small mb-1">{{ $camiseta->equipo->nombre }} - {{ $camiseta->marca->nombre }}</p>
                        <p class="card-text mb-2">{{ \Illuminate\Support\Str::limit($camiseta->descripcion, 90) }}</p>
                        <span class="badge bg-secondary">{{ ucfirst($camiseta->version) }}</span>
                        <span class="badge bg-info text-dark">{{ $camiseta->temporada }}</span>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-success">${{ number_format($camiseta->precio, 2) }}</span>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('camisetas.show', $camiseta) }}" class="btn btn-outline-primary">Ver</a>
                            <a href="{{ route('camisetas.edit', $camiseta) }}" class="btn btn-outline-warning">Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No hay camisetas para mostrar.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $camisetas->links() }}
    </div>
@endsection
