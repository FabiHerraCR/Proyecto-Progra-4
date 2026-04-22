<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->get();

        return view('index', compact('productos'));
    }

    public function create()
    {
        return view('productos.agregar');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
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

    public function destroy(string $codigo)
    {
        $producto = Producto::where('codigo', $codigo)->firstOrFail();

        try {
            $producto->delete();

            return redirect('/')->with('success', 'Producto eliminado');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'No se pudo eliminar');
        }
    }
}
