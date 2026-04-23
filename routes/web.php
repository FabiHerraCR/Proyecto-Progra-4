<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

//Cuando el usuario entra a "/" o a "/productos, laravel llama al metodo index del ProductoController
//que se encarga de mostrar la lista de productos en la pantalla
Route::get('/', [ProductoController::class, 'index']);
Route::get('/productos', [ProductoController::class, 'index']);

//Cuando el usuario entra a "/productos/agregar", laravel llama al metodo create del ProductoController
//que se encarga de mostrar el formulario para agregar un nuevo producto
Route::get('/productos/agregar', [ProductoController::class, 'create']);

//Cuando el usuario envia el formulario para agregar un nuevo producto, laravel llama al metodo store del ProductoController
//que se encarga de guardar el nuevo producto en la base de datos
Route::post('/productos', [ProductoController::class, 'store']);

//Cuando el usuario presiona el lapiz amarillo, laravel muestra el formulario para editar ese producto
Route::get('/productos/{codigo}/editar', [ProductoController::class, 'edit']);

//Cuando el usuario guarda el formulario de edicion, laravel actualiza el producto
Route::put('/productos/{codigo}', [ProductoController::class, 'update']);

//Cuando el usuario envia la solicitud para eliminar un producto, laravel llama al metodo destroy del ProductoController
//que se encarga de eliminar el producto de la base de datos
Route::delete('/productos/{codigo}', [ProductoController::class, 'destroy']);

Route::get('/buscar', [ProductoController::class, 'buscar']);
