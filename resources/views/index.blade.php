<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <div class="cabecera">
        <h2 id="texto-crud">CRUD Productos Laravel</h2>
        <button id="add-button" onclick="cambiarPestana('/productos/agregar')">Agregar nuevo Producto</button>
    </div>

    <div class="buscador-cont">
        <form method="GET" action="/buscar" class="buscador">
            <input id="buscar-inp" type="text" placeholder="Buscar Producto" name="buscar" value="{{ request('buscar') }}">
            <button id="buscar-btn" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>

    <div class="productos-cont">
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @elseif(session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <table id="tabla-productos">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th id="acciones"></th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach recorre cada producto en la variable $productos --}}
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->codigo }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <div class="acciones-btn">
                                <button class="editar-btn" type="button" onclick="cambiarPestana('/productos/{{ $producto->codigo }}/editar')">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                {{-- Envia el codigo del producto a la ruta que lo elimina --}}
                                <form action="/productos/{{ $producto->codigo }}" method="POST">
                                    @csrf
                                    {{-- Laravel interpreta este formulario como una solicitud DELETE --}}
                                    @method('DELETE')
                                    <button class="borrar-btn" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{-- @endforeach Termina el ciclo --}}
            </tbody>
        </table>
    </div>

</body>
</html>
