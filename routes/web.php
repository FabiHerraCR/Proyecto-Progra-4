<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/agregar', [ProductoController::class, 'create']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::delete('/productos/{codigo}', [ProductoController::class, 'destroy']);
