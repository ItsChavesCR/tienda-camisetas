<?php

use App\Http\Controllers\CamisetaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/camisetas');

Route::resource('camisetas', CamisetaController::class);
Route::resource('categorias', CategoriaController::class)->only(['index', 'show']);
Route::resource('equipos', EquipoController::class)->only(['index', 'show']);
