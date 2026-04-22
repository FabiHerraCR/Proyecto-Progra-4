<!DOCTYPE html>
<html lang="en">
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


            <form action= "/productos" method="POST">
                @csrf
                <input type="text" placeholder="Codigo" name= "codigo">
                <input type="text" placeholder= "Producto" name= "nombre">
                <input type="text" placeholder="Categoria" name= "categoria">
                <input type="number" placeholder="Precio" name= "precio">
                <input type="number" placeholder="Cantidad (Stock)"  name= "stock">
                <input type="submit" value="Guardar Producto">
            </form>
            <input id="Cancelar-btn" onclick = "cambiarPestaña('/')" type="button" value="Cancelar">

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