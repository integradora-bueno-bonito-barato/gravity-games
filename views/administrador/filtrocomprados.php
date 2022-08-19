<?php
require_once('../../vendor/autoload.php');
use myapp\query\select;
$select = new select();
$qry = "select  count(id_clave_vendida) as claves_vendidas,id_cliente from juego join clave on clave.juego = juego.id_juego join genero on genero.id_genero = juego.genero join claves_vendidas on claves_vendidas.clave = clave.id_clave join orden_venta on orden_venta.id_orden_venta = claves_vendidas.orden_venta join carrito on carrito.id_carrito = orden_venta.carrito join cliente on cliente.id_cliente = carrito.cliente group by id_cliente";

$qry2 = "select  count(id_clave_vendida) as claves_vendidas,id_cliente from juego join clave on clave.juego = juego.id_juego join genero on genero.id_genero = juego.genero join claves_vendidas on claves_vendidas.clave = clave.id_clave join orden_venta on orden_venta.id_orden_venta = claves_vendidas.orden_venta join carrito on carrito.id_carrito = orden_venta.carrito join cliente on cliente.id_cliente = carrito.cliente group by id_cliente";
    if (isset($_POST['formjuego'])){
        extract($_POST);
        if($formcompra != "todos") {
            
            echo $formcompra;
            $qry = "select  count(id_clave_vendida) as claves_vendidas,id_cliente from juego join clave on clave.juego = juego.id_juego join genero on genero.id_genero = juego.genero join claves_vendidas on claves_vendidas.clave = clave.id_clave join orden_venta on orden_venta.id_orden_venta = claves_vendidas.orden_venta join carrito on carrito.id_carrito = orden_venta.carrito join cliente on cliente.id_cliente = carrito.cliente group by id_cliente";
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
            <th>claves_vendidas</th>
          
        </tr>
        <?php foreach($result as $compra) {  ?>
            <tr>
                <td><?php echo $compra->id_cliente ?></td>
                <td><?php echo $compra->claves_vendidas?></td>
               
            </tr>

            <?php } ?>

   <form action="#" method="POST">
    <select name="formcompra">
            <option value="todos">seleccionar</option>
        <?php 
        foreach ($result2 as $juego)  { ?>
            <option value="<?php echo $juego->id_cliente ?>"><?php echo $juego->claves_vendidas?></option>  
            
     <?php } ?>   
        
    </select>
    <button type="submit">Subir</button>  
   </form>


</body>
</html>