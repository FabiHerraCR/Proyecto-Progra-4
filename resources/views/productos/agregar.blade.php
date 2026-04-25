<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <title>Agregar Producto</title>
</head>
<body>
    <div class="AgregarP-Fondo">
        <div class="NuevoProducto-Form">
            <h2 id="NuevoProducto-Txt">Nuevo Producto</h2>

            <form action="/productos" method="POST">
                @csrf
                <input type="text" placeholder="Codigo" name="codigo" value="{{ old('codigo') }}" required>
                <input type="text" placeholder="Producto" name="nombre" value="{{ old('nombre') }}" required>
                <input type="text" placeholder="Categoria" name="categoria" value="{{ old('categoria') }}" required>
                <input type="number" placeholder="Precio" name="precio" value="{{ old('precio') }}" min="0" step="0.01" required>
                <input type="number" placeholder="Cantidad (Stock)" name="stock" value="{{ old('stock') }}" min="0" required>
                <input type="submit" value="Guardar Producto">
            </form>

            <input id="Cancelar-btn" onclick="cambiarPestana('/')" type="button" value="Regresar a inicio">

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
