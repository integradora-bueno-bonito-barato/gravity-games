<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAJNDJKA</title>
</head>
<body>

    <h1>Ventas por Cliente</h1>
    <form action="#" method="POST">
        <label for="cliente">Cliente</label>
        <select name="cliente">
            
    <?php
    
    require_once("../../vendor/autoload.php");
    use myapp\query\select;
    $seleccion = new select();
    $qry = "select * from cliente join persona on persona.id_persona = cliente.persona join carrito on carrito.cliente = cliente.id_cliente join orden_venta on orden_venta.carrito = carrito.id_carrito";
    $result = $seleccion->Seleccionar($qry);
    foreach($result as $filas) { ?> 
        <option value="<?php echo $filas->id_cliente ?>"><?php echo $filas->nombre . " " . $filas->apellido?></option>
        
   <?php }  ?>   
        </select>
        <button type="submit">Subir</button>
    </form>
    <?php
    if($_POST) {
        extract($_POST);
        echo $cliente;
        $qry = "select * from orden_venta1 where id_cliente = $cliente";
        $result = $seleccion->Seleccionar($qry);
        foreach($result as $filas) { ?> 
            <p><?php echo "orden_venta " . $filas->id_orden_venta ?></p>
            <p><?php echo "Clave " . $filas->id_clave_vendida ?></p>
            <p><?php echo "Subtotal " . $filas->subtotal ?></p>
            <p><?php echo "Iva " . $filas->iva ?></p>
            <p><?php echo "Total " . $filas->total ?></p>
            <p><?php echo "Fecha " . $filas->fecha ?></p>
            <p><?php echo "id_cliente " . $filas->id_cliente ?></p>
            <p><?php echo "Plataforma " . $filas->plataforma ?></p>
            <p><?php echo "Genero " . $filas->genero ?></p>
    
        
         <?php }?>
    
    
  <?php  } ?>
 
            

    
    
</body>
</html>