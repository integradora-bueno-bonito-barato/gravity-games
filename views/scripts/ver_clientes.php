<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver clientes</title>
    <link rel="stylesheet" href="../../css 2.0/bootstrap.min.css">
</head>
<body>
        <div class="container">
            <h1 align="center">Clientes</h1>
            <?php


use MyApp\query\select;
        require("../../vendor/autoload.php");
        
        $query = new select();
        $cadena =  "SELECT * FROM persona,cliente where persona.id_persona = cliente.persona order by fecha_creacion desc";
        $tabla = $query->Seleccionar($cadena);
        
        echo "<table class='table table-striped'>
        <head class='table-dark'>
        <tr>
        <th>id_persona</th><th>Nombre</th><th>Apellido</th><th>nombre de usuario</th><th>Correo</th><th>Telefono</th><th>fecha de creacion</th>
        </tr>
        </head>
        <tbody>";
        
        foreach($tabla as $registro)
        {
            echo "<tr>";
            echo "<td> $registro->id_persona </td>";
            echo "<td> $registro->nombre </td>";
            echo "<td> $registro->apellido </td>";
            echo "<td> $registro->n_usuario </td>";
            echo "<td> $registro->correo </td>";
            echo "<td> $registro->telefono </td>";
            echo "<td> $registro->fecha_creacion</td>";
            echo "</tr>";
        }
        
        echo "</tbody>
        </table";
        
        ?>


</div>

<script src="../../js/bootstrap.bundle.js"></script>
</body>
</html>