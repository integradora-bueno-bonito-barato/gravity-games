<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img
        {

            width: 100%;
            height: 300px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver clientes</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container rounded-3 bg-white">
    <header class="vh-75 container d-none d-md-block">
   

           

            <?php

use myapp\query\select;

require_once('../vendor/autoload.php');

$query = new select();
$chain = "SELECT * FROM juego";
$result = $query->Seleccionar($chain);
foreach($result as $filas){?>
    <form method="POST" action="scripts/agregarjuego.php"  class="tarjeta my-2 mx-auto mx-md-0 bg-dark d-flex align-items-md-center justify-items-center flex-md-column p-3  text-light rounded-3" style="--bs-bg-opacity: .9;">
    <img class="d-block" src="<?php echo $filas->img?>" alt="">
    <div class="tarjeta-contenido w-100 d-flex flex-column align-items-center align-items-md-start ms-2 ms-0-md">
        <div class="d-md-flex w-100 justify-content-md-between align-items-md-center">
            <h3 class="fs-5"><?php echo $filas->nombre ?></h3>
            <p><?php echo "$". $filas->precio ?></p>
        </div>
        <p>Plataforma: </p>
        <p><?php echo $filas->plataforma?></p>
        <input type="hidden" name="juego" value="<?php echo $filas->id_juego;?>">
        <button type="submit" class="btn btn-success mt-md-2 d-block mt-auto">Agregar al carrito</button>
    </div>
</form>
<?php };?>
                </div>
                </div>
                </div>
                </div>
           

                

<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>