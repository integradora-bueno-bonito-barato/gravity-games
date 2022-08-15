<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>compra</title>
</head>
<body class="bg-dark">

<?php
use MyApp\Query\Select;
require("../vendor/autoload.php");
session_start();
$cliente = $_SESSION['id_cliente'];
$query = new select();
$cadena = "SELECT tarjetas.n_tarjeta,tarjetas.cvv FROM tarjetas WHERE tarjetas.cliente=$cliente;";
$tabla = $query->Seleccionar($cadena);
$resultado ="SELECT tarjetas.id_tarjetas,tarjetas.n_tarjeta,tarjetas.cvv FROM tarjetas inner JOIN cliente on tarjetas.cliente = cliente.id_cliente WHERE cliente.id_cliente = $cliente";
$tabla2 = $query->Seleccionar($resultado);
$resultado2="call gravity_games.subtotal($cliente);";
$tabla3 = $query->Seleccionar($resultado2);

?>
<div class="container rounded-3 bg-white">
    <div class="container text-bg-light rounded-3 mb-5 pb-3">
        <div class="row"><h1>Confirma tu compra</h1></div> <br><br>
        <?php
        
            ?>
        <div class="">   
            <div class="mb-3 col-2"><img src="../assets/img/tarjeta_silueta.png" alt="" class="img-fluid"></div>
            <div class="">
            
            <!-- id cliente/carrito/id_tarjeta -->
            <!-- <div class="mb-3 col-4"> -->
            <form action="" method="post">
                
                        <label for="tarjeta" class="fs-3">Seleccione su tarjeta</label>
                        <select name="tarjeta" id="" class="form-control">
                            <?php
                                foreach($tabla2 as $registro2)
                                    {
                                        echo"<option class='' value'".$registro2->id_tarjetas."'>".$registro2->n_tarjeta."</option>";
                                    }
                            ?>
                        </select><br>
                
                <div class="fs-2"><label for="cvv" class="">Codigo de seguridad</label></div>
                <input type="text" maxlength="3" name="cvv" id="" class="form-control"><br><br>
                <button type="submit" class="btn btn-success  d-block w-100">Comprar</button><br>
            </form>
            </div>
            
        <!-- </div> -->
        </div>
        
        
        <?php  ?>        
        
    </div>  

</body>
</html>