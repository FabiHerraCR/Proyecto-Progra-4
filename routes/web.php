<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

//Cuando el usuario entra a "/" o a "/productos, laravel llama al método index del ProductoController
//que se encarga de mostrar la lista de productos en la pantalla
Route::get('/', [ProductoController::class, 'index']);
Route::get('/productos', [ProductoController::class, 'index']);

//Cuando el usuario entra a "/productos/agregar, laravel llama al método create del ProductoController
//que se encarga de mostrar el formulario para agregar un nuevo producto
Route::get('/productos/agregar', [ProductoController::class, 'create']);

//Cuando el usuario envía el formulario para agregar un nuevo producto, laravel llama al método store del ProductoController
//que se encarga de guardar el nuevo producto en la base de datos
Route::post('/productos', [ProductoController::class, 'store']);

//Cuando el usuario envía la solicitud para eliminar un producto, laravel llama al método destroy del ProductoController
//que se encarga de eliminar el producto de la base de datos
Route::delete('/productos/{codigo}', [ProductoController::class, 'destroy']);

Route::get('/buscar', [ProductoController::class, 'buscar']);