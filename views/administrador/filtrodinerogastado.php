<?php
require_once('../../vendor/autoload.php');
use myapp\query\select;
$select = new select();
$qry = "select *, (subtotal_vendido * .16) as iva, (subtotal_vendido * .16 + subtotal_vendido) as total from subtotales_vendidos";
$result = $select->Seleccionar($qry);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinero recaudado por clientes</title>
</head>
<body>
    <h1>Dinero Recaudado por cada cliente</h1>
    <table border="1">
        <tr>
            <th>id_cliente</th>
            <th>nombre</th>
            <th>Subtotal</th>
            <th>Iva</th>
            <th>Total</th>
        </tr>
        <?php foreach($result as $clientes) {  ?>
            <tr>
                <td><?php echo $clientes->id_cliente ?></td>
                <td><?php echo $clientes->nombre?></td>
                <td><?php echo $clientes->subtotal_vendido ?></td>
                <td><?php echo $clientes->iva ?></td>
                <td><?php echo $clientes->total ?></td>
            </tr>

            <?php } ?>

   <form action="#" method="POST">
    <select name="clientes">
      
        
    </select>
    <button type="submit">Subir</button>  
   </form>


</body>
</html>