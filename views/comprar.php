<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body class="bg-dark">

<?php
use MyApp\Query\Select;
require("../vendor/autoload.php");

$query = new select();
$cadena = "SELECT tarjetas.n_tarjeta,tarjetas.cvv FROM tarjetas WHERE tarjetas.cliente=1;";
$tabla = $query->Seleccionar($cadena);
$cadena2 ="call gravity_games.subtotal_cliente(1);";
$tabla2 = $query->Seleccionar($cadena2);

?>
<div class="container rounded-3 bg-white">
    <div class="container text-bg-light rounded-3 mb-5 pb-3">
        <div class="row"><h1>Confirma tu compra</h1></div> <br><br>
        <?php
        foreach($tabla as $registro){
            ?>
        <div class="row">   
            <div class="mb-3 col-3"><img src="../assets/img/tarjeta_silueta.png" alt="" class="img-fluid"></div>
            <div class="col-2"><div class="fs-2">Tarjeta</div><div><?php echo"$registro->n_tarjeta"; ?></div></div>
            <div class="mb-3 col-4">
            <form action="">
                <label for="cvv" class="fs-2">Codigo de seguridad</label>
                <input type="text" maxlength="3" name="cvv" id="">
                
            </form>
            </div>
            <?php } ?>
            <?php
            foreach($tabla2 as $registro2){
                ?>
            <div class=" col-3"><div class="fs-2">Total</div><div><?php echo"$registro2->subtotal"; ?></div></div>
        </div>
        
        <button type="submit" class="btn btn-secondary  d-block w-100 mt-3">Comprar</button>
        <?php } ?>        
        
    </div>  
</div>
</body>
</html>