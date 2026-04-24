<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        //Consulta TODOS los productos de la base de datos y los guarda en la variable $productos
        $productos = Producto::all();

        //Manda esos productos a la vista productos/index.blade.php para que los muestre en la pantalla
        return view('index', compact('productos'));
    }

    public function create()
    {
        return view('productos.agregar');
    }

    public function edit(string $codigo)
    {
        $producto = Producto::where('codigo', $codigo)->firstOrFail();

        return view('productos.editar', compact('producto'));
    }

    public function buscar(Request $request)
    {
        $buscar = $request->input('buscar');

        $productos = Producto::where('nombre', 'like', "%$buscar%")
            ->orWhere('categoria', 'like', "%$buscar%")
            ->get();

        return view('index', compact('productos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            //El codigo es obligatorio y no se puede repetir porque se usa para buscar el producto al eliminar
            'codigo' => 'required|string|max:50|unique:productos,codigo',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        try {
            Producto::create($datos);

            return back()->with('success', 'Producto guardado');
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo guardar');
        }
    }

    public function update(Request $request, string $codigo)
    {
        $producto = Producto::where('codigo', $codigo)->firstOrFail();

        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        try {
            $producto->update($datos);

            return redirect('/')->with('success', 'Producto actualizado');
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo actualizar');
        }
    }

    public function destroy(string $codigo)
    {
        //Busca el producto por codigo; si no existe, Laravel muestra error 404
        $producto = Producto::where('codigo', $codigo)->firstOrFail();

        try {
            //Elimina el registro encontrado en la tabla productos
            $producto->delete();

            return redirect('/')->with('success', 'Producto eliminado');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'No se pudo eliminar');
        }
    }
}
