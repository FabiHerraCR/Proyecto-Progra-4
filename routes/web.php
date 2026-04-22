<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('index');
});
Route::get('/productos', function () {
    return "Productos aún no listados";
});
Route::get('/productos/agregar', [ProductoController::class, 'create']);
Route::post('/productos', [ProductoController::class, 'store']);
