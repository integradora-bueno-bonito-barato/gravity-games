<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
</head>
<body>

    <h1>Dinero gastado por cliente</h1>
    <form action="#" method="POST">
        <label for="tarjetas">tarjetas</label>
        <select name="tarjetas">
            
    <?php
    
    require_once("../../vendor/autoload.php");
    use myapp\query\select;
    $seleccion = new select();
    $qry = "";
    $result = $seleccion->Seleccionar($qry);
    foreach($result as $filas) { ?> 
        <option value="<?php echo $filas->id_tarjetas ?>"><?php echo $filas->n_tarjeta ?></option>
        
   <?php }  ?>   
        </select>
        <button type="ver">Ver</button>
    </form>
    <?php
    if($_POST) {
        extract($_POST);
        echo $tarjetas;
        $qry = "select * from tarjeta where id_tarjeta = $tarjetas";
        $result = $seleccion->Seleccionar($qry);
        foreach($result as $filas) { ?> 
            <p><?php echo "nombre" . $filas->nombre?></p>
            <p><?php echo "apellido" . $filas->apellido?></p>
            <p><?php echo "numero_tarjeta" . $filas->numero_tarjeta?></p>
            <p><?php echo "exp" . $filas->exp?></p>
            <p><?php echo "cvv" . $filas->cvv?></p>
        <?php }?>
    
    
  <?php  } ?>