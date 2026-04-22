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
        <div class="buscador">
            <input id="buscar-inp" type="text" placeholder="Buscar Producto" name="Buscar">
            <button id="buscar-btn" type="button">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
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
                <!-- @foreach recorre cada producto en la variable $productos, y la manda al controlador -->
                @foreach($productos as $producto)
                    <tr>
                        <!-- Muestra cada atributo del producto en una celda de la tabla -->
                        <td>{{ $producto->codigo }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <div class="acciones-btn">
                                <button class="editar-btn" type="button">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <form action="/productos/{{ $producto->codigo }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="borrar-btn" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <!-- @endforeach Termina el ciclo de $productos -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="acciones-btn">
                                <button class="editar-btn" type="button">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="borrar-btn" type="button">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
