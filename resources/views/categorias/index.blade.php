@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <h1 class="h3 mb-3">Categorias</h1>

    <div class="row g-3">
        @foreach($categorias as $categoria)
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categoria->nombre }}</h5>
                        <p class="card-text text-muted">{{ $categoria->descripcion }}</p>
                        <p class="mb-0"><strong>Productos:</strong> {{ $categoria->camisetas_count }}</p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-outline-primary btn-sm">Ver productos</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">{{ $categorias->links() }}</div>
@endsection
