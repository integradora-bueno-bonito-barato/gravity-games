<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img
        {
            object-fit: cover;
            width: 100%;
            height: 300px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver clientes</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="bg-dark p-md-3">
<div class="container rounded-3 bg-white">
    
    <div class="container">
    <div class="row">
        <div class="p-3 mt-5 d-none d-md-block col-md-4 bg-light rounded-3">
            <h2>Filtros</h2>
            <div class="form-group">
                <label for="">Plataforma</label>
                <select class="form-control " id="">
                    <option value="todas">Todas</option>
                    <option value="#">Steam</option>
                    <option value="#">Playstation 4</option>
                    <option value="#">Playstation 5</option>
                    <option value="#">Xbox one</option>
                    <option value="#">Xbox Series X</option>
                </select>
            </div> <br>

            <div class="form-group">
                <label for="">Genero</label>
                <select class="form-control " id="">
                    <option value="todas">Todas</option>
                    <option value="#">Aventura</option>
                    <option value="#">Terror</option>
                    <option value="#">Arcade</option>
                    <option value="#">Simulador</option>
                    <option value="#">Estrategia</option>
                </select>
            </div> <br>
            
        </div>
        <div class="col-12 col-md-8">
            <h1 class="text-center text-md-start">Store</h1>
            <div class="contenedor-tarjeta d-md-flex justify-content-evenly flex-wrap ">

                </div>
                </div>
                </div>
                </div>
            <?php


        use MyApp\Query\Select;
        require("../vendor/autoload.php");

        $query = new select();
        $cadena = "SELECT * FROM mostrar_todos_los_juegos";
        $tabla = $query->seleccionar($cadena);

        echo "<div class='table-responsive'>
        <table class='table'>
        <head class='table-dark'>
        <tr>
        <th>nombre</th><th>genero</th><th>clasificacion</th><th>plataforma</th><th>precio</th>
        </tr>
        </head>
        <tbody>";

        foreach($tabla as $registro)
        {
            echo "<tr>";
            echo "<td> $registro->nombre </td>";
            echo "<td> $registro->genero </td>";
            echo "<td> $registro->clasificacion </td>";
            echo "<td> $registro->plataforma </td>";
            echo "<td> $ $registro->precio </td>";?>
            <td> <a href="elden-ring.php" class="btn btn-success mt-md-2 d-block mt-auto">Añadir al carrito</a> </td>
            <?php
        }

        echo "</tbody>
        </table
        </div>";

        ?>
                

<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>