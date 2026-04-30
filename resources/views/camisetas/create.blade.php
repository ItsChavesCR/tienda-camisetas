@extends('layouts.app')

@section('title', 'Crear Camiseta')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h1 class="h4 mb-0">Nueva Camiseta</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('camisetas.store') }}" method="POST">
                @csrf
                @include('camisetas.partials.form')
            </form>
        </div>
    </div>
@endsection
