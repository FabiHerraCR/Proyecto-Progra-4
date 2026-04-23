<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <title>Editar Producto</title>
</head>
<body>
    <div class="AgregarP-Fondo">
        <div class="NuevoProducto-Form">
            <h2 id="NuevoProducto-Txt">Modificar Producto</h2>

            <form action="/productos/{{ $producto->codigo }}" method="POST">
                @csrf
                @method('PUT')

                <div class="campo-form">
                    <label for="id_producto">ID</label>
                    <input id="id_producto" class="input-readonly" type="text" value="{{ $producto->id }}" readonly>
                </div>

                <div class="campo-form">
                    <label for="codigo_producto">Codigo</label>
                    <input id="codigo_producto" class="input-readonly" type="text" value="{{ $producto->codigo }}" readonly>
                </div>

                <div class="campo-form">
                    <label for="nombre">Producto</label>
                    <input id="nombre" type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                </div>

                <div class="campo-form">
                    <label for="categoria">Categoria</label>
                    <input id="categoria" type="text" name="categoria" value="{{ old('categoria', $producto->categoria) }}" required>
                </div>

                <div class="campo-form">
                    <label for="precio">Precio</label>
                    <input id="precio" type="number" name="precio" value="{{ old('precio', $producto->precio) }}" min="0" step="0.01" required>
                </div>

                <div class="campo-form">
                    <label for="stock">Cantidad (Stock)</label>
                    <input id="stock" type="number" name="stock" value="{{ old('stock', $producto->stock) }}" min="0" required>
                </div>

                <input type="submit" value="Guardar Cambios">
            </form>

            <input id="Cancelar-btn" onclick="cambiarPestana('/')" type="button" value="Cancelar">

            @if($errors->any())
                <div class="Mensaje-Guardado">
                    <div>
                        @foreach($errors->all() as $error)
                            <h4>{{ $error }}</h4>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="Mensaje-Guardado">
                    <h4>{{ session('success') }}</h4>
                </div>
            @elseif(session('error'))
                <div class="Mensaje-Guardado">
                    <h4>{{ session('error') }}</h4>
                </div>
            @endif
        </div>
    </div>

</body>
</html>
