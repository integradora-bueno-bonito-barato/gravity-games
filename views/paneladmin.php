<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin vista</title>
</head>
<body>
<?php
   
   use MyApp\Query\Select;
   require("../vendor/autoload.php");
   session_start();
   $cliente = $_SESSION['id_cliente'];
   $query = new select();
   $cadena = "SELECT persona.nombre,rol.nombre as rol, administrador.rfc from persona inner join administrador on persona.id_persona = administrador.persona inner join rol on rol.id_rol = administrador.rol where administrador.id_administrador = 4;";
   $tabla = $query->Seleccionar($cadena);
   $resultado ="call gravity_games.reportexfecha(08, 2022);";
   $tabla2 = $query->Seleccionar($resultado);
   
?>
<form action="" method="POST">
     
</form>

<?php 
echo"$cliente";
foreach($tabla2 as $registro)
{
    echo "<br>";
    echo "<td> $registro->fecha </td>";
    echo "<td> $registro->total </td>";
    echo "<td> $registro->genero </td>";
    echo "</br>";
}
foreach($tabla as $registro2)
{
 echo"$registro2->nombre,$registro2->rol,$registro2->rfc";
}
?>



</body>
</html>