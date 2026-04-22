
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!--Libreria de iconos-->
    <script></script>
</head>
<body>

    <div class="cabecera">
        <h2 id="texto-crud">CRUD Productos Laravel</h2>
        <button id="add-button" onclick= "cambiarPestaña('/productos/agregar') ">Agregar nuevo Producto</button>
    </div>

    <div class="buscador-cont">
        <div class="buscador">
            <input id="buscar-inp"   type="text" placeholder="Buscar Producto" name="Buscar">
            <button id="buscar-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>

    <div class="productos-cont">
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
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>
                <div class="acciones-btn">
                    <button class="editar-btn">
                        <i class="fa-solid fa-pen"></i> <!-- Icono de Lapiz-->
                    </button>
                    <button class="borrar-btn">
                        <i class="fa-solid fa-trash"></i> <!-- Icono de Basura-->
                    </button>
                </div>
            </th>
         


        </tr>
    </tbody>
    </table>
    </div>

    <?php


    ?>



</body>
</html>