<?php
require_once('../../vendor/autoload.php');
use myapp\query\select;
$select = new select();
$qry = "select *, (subtotal_vendido * .16) as iva, (subtotal_vendido * .16 + subtotal_vendido) as total from subtotales_vendidos";

$qry2 = "select *, (subtotal_vendido * .16) as iva, (subtotal_vendido * .16 + subtotal_vendido) as total from subtotales_vendidos";
    if (isset($_POST['formjuego'])){
        extract($_POST);
        if($formcompra != "todos") {
            
            echo $formcompra;
            $qry = "select *, (subtotal_vendido * .16) as iva, (subtotal_vendido * .16 + subtotal_vendido) as total from subtotales_vendidos where id_juego = $formcompra";
        } 
    }  

$result = $select->Seleccionar($qry);
$result2 = $select->Seleccionar($qry2);   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>juego recaudado por compra</title>
</head>
<body>
    <h1>juego Recaudado por cada cliente por compra</h1>
    <table border="1">
        <tr>
        <th>id_cliente</th>
            <th>nombre</th>
            <th>Subtotal</th>
            <th>Iva</th>
            <th>Total</th>
        </tr>
        <?php foreach($result as $compra) {  ?>
            <tr>
                <td><?php echo $compra->id_cliente ?></td>
                <td><?php echo $compra->nombre?></td>
                <td><?php echo $compra->subtotal_vendido ?></td>
                <td><?php echo $compra->iva ?></td>
                <td><?php echo $compra->total ?></td>
            </tr>

            <?php } ?>

   <form action="#" method="POST">
    <select name="formjuego">
            <option value="todos">Todos las compras</option>
        <?php 
        foreach ($result2 as $juego)  { ?>
            <option value="<?php echo $juego->id_cliente ?>"><?php echo $juego->nombre?></option>  
            
     <?php } ?>   
        
    </select>
    <button type="submit">Subir</button>  
   </form>


</body>
</html>