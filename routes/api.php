<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CamisetaApiController;
use App\Http\Controllers\Api\CatalogoApiController;

Route::get('/camisetas', [CamisetaApiController::class, 'index']);
Route::get('/camisetas/{camiseta}', [CamisetaApiController::class, 'show']);
Route::post('/camisetas', [CamisetaApiController::class, 'store']);
Route::put('/camisetas/{camiseta}', [CamisetaApiController::class, 'update']);
Route::delete('/camisetas/{camiseta}', [CamisetaApiController::class, 'destroy']);

Route::get('/categorias', [CatalogoApiController::class, 'categorias']);
Route::get('/marcas', [CatalogoApiController::class, 'marcas']);
Route::get('/equipos', [CatalogoApiController::class, 'equipos']);
Route::get('/ligas', [CatalogoApiController::class, 'ligas']);
Route::get('/tallas', [CatalogoApiController::class, 'tallas']);