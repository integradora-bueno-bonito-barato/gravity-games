<?php
require_once('../../vendor/autoload.php');
use myapp\query\select;

$clientes = new select();
$qry = "select * from persona join cliente on cliente.persona = persona.id_persona left join tarjetas on tarjetas.cliente = cliente.id_cliente where id_tarjetas is null";
$result = $clientes->Seleccionar($qry);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente con tarjeta no registrada</title>
</head>
<body>
    <h1>Cliente con tarjeta no registrada</h1>
    <?php 
    foreach($result as $cliente) { ?> 
        <table border="1">
        <td><?php echo $cliente->nombre ?></td>
       
        </table>
    <?php } ?>
</body>
</html>