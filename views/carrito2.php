<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
use MyApp\Query\Select;
require("../vendor/autoload.php");

$query = new select();
$cadena = "SELECT tarjetas.n_tarjeta,tarjetas.cvv FROM tarjetas WHERE tarjetas.cliente=$cliente;";
$tabla = $query->Seleccionar($cadena);
$resultado ="SELECT tarjetas.id_tarjetas,tarjetas.n_tarjeta,tarjetas.cvv FROM tarjetas inner JOIN cliente on tarjetas.cliente = cliente.id_cliente WHERE cliente.id_cliente = $cliente";
$tabla2 = $query->Seleccionar($resultado);

?>
<table>
    <tr>
        <th>tarjeta</th>
    </tr>
    <tr>
        <td>
            <select name="tarjeta" id="">
                <?php
                    foreach($tabla2 as $registro2)
                    {
                        echo"<option value'".$registro2->id_tarjetas."'>".$registro2->n_tarjeta."</option>";
                    }
                ?>
            </select>
        </td>
    </tr>
</table>

</body>
</html>