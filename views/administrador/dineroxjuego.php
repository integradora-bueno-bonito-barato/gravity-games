<?php
require_once('../../vendor/autoload.php');
use myapp\query\select;
$select = new select();
$qry = "select *, (subtotal_vendido * .16) as iva, (subtotal_vendido * .16 + subtotal_vendido) as total from subtotales_vendidos";

$qry2 = "select *, (subtotal_vendido * .16) as iva, (subtotal_vendido * .16 + subtotal_vendido) as total from subtotales_vendidos";
    if (isset($_POST['formjuego'])){
        extract($_POST);
        if($formjuego != "todos") {
            
            echo $formjuego;
            $qry = "select *, (subtotal_vendido * .16) as iva, (subtotal_vendido * .16 + subtotal_vendido) as total from subtotales_vendidos where id_juego = $formjuego";
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
    <title>Dinero recaudado por juego</title>
</head>
<body>
    <h1>Dinero Recaudado por cada juego vendido</h1>
    <table border="1">
        <tr>
            <th>id_juego</th>
            <th>Juego</th>
            <th>Genero</th>
            <th>Subtotal</th>
            <th>Iva</th>
            <th>Total</th>
        </tr>
        <?php foreach($result as $juego) {  ?>
            <tr>
                <td><?php echo $juego->id_juego ?></td>
                <td><?php echo $juego->juego ?></td>
                <td><?php echo $juego->genero ?></td>
                <td><?php echo $juego->subtotal_vendido ?></td>
                <td><?php echo $juego->iva ?></td>
                <td><?php echo $juego->total ?></td>
            </tr>

            <?php } ?>

   <form action="#" method="POST">
    <select name="formjuego">
            <option value="todos">Todos los juegos</option>
        <?php 
        foreach ($result2 as $juego)  { ?>
            <option value="<?php echo $juego->id_juego ?>"><?php echo $juego->juego ?></option>  
            
     <?php } ?>   
        
    </select>
    <button type="submit">Subir</button>  
   </form>


</body>
</html>