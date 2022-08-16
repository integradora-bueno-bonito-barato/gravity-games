<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Ventas</title>
    <link rel="stylesheet" href="../../css 2.0/bootstrap.min.css">
</head>
<body>
        <div class="container">
        <a class="btn btn-primary" href="paginaprincipal.php">Regresar</a> 
   
            <h1 align="center">Orden de Venta</h1>
            <?php


use MyApp\query\select;
        require("../../vendor/autoload.php");
        
        $query = new select();
        $cadena =  "SELECT * FROM orden_venta";
        $tabla = $query->Seleccionar($cadena);
        
        echo "<table class='table table-striped'>
        <head class='table-dark'>
        <tr>
        <th>id_orden_venta</th><th>Carrito</th><th>Fecha</th><th>Tarjeta</th>
        </tr>
        </head>
        <tbody>";
        
        foreach($tabla as $registro)
        {
            echo "<tr>";
            echo "<td> $registro->id_orden_venta </td>";
            echo "<td> $registro->carrito </td>";
            echo "<td> $registro->fecha </td>";
            echo "<td> $registro->tarjeta </td>";
            echo "</tr>";
        }
        
        echo "</tbody>
        </table";
        
        ?>


</div>

<script src="../../js/bootstrap.bundle.js"></script>
</body>
</html>