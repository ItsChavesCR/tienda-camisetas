@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
        <div class="container-fluid py-3">
            <h1 class="display-6 fw-bold">Tienda de Camisetas Deportivas</h1>
            <p class="col-md-8 fs-5">Explora el catalogo y administra tus productos con CRUD completo.</p>
            <a href="{{ route('camisetas.index') }}" class="btn btn-primary btn-lg">Ver catalogo</a>
        </div>
    </div>
@endsection
