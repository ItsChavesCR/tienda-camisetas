@extends('layouts.app')

@section('title', 'Editar Camiseta')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h1 class="h4 mb-0">Editar Camiseta</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('camisetas.update', $camiseta) }}" method="POST">
                @csrf
                @method('PUT')
                @include('camisetas.partials.form')
            </form>
        </div>
    </div>
@endsection
