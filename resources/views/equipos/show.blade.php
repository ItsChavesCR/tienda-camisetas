@extends('layouts.app')

@section('title', $equipo->nombre)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-0">{{ $equipo->nombre }}</h1>
            <small class="text-muted">Liga: {{ $equipo->liga->nombre }}</small>
        </div>
        <a href="{{ route('equipos.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </div>

    <div class="row g-4">
        @forelse($camisetas as $camiseta)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $camiseta->nombre }}</h5>
                        <p class="text-muted small">{{ $camiseta->categoria->nombre }} - {{ $camiseta->marca->nombre }}</p>
                        <p class="fw-bold text-success">${{ number_format($camiseta->precio, 2) }}</p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ route('camisetas.show', $camiseta) }}" class="btn btn-outline-primary btn-sm">Detalle</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No hay camisetas para este equipo.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">{{ $camisetas->links() }}</div>
@endsection
