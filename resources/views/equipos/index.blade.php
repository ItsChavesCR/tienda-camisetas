@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
    <h1 class="h3 mb-3">Equipos</h1>

    <div class="table-responsive">
        <table class="table table-striped align-middle bg-white shadow-sm">
            <thead>
            <tr>
                <th>Equipo</th>
                <th>Liga</th>
                <th>Productos</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->liga->nombre }}</td>
                    <td>{{ $equipo->camisetas_count }}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="{{ route('equipos.show', $equipo) }}">Ver</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $equipos->links() }}</div>
@endsection
