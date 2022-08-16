<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis claves</title>
</head>
<body class="bg-dark">
    
    <div class="container rounded-3 bg-white">
    <a href="../index.php" class="btn btn-primary w-100 mt-2 fs-4">Volver</a>
    <h1>Mis claves</h1>
        <div class="contenedor-tarjeta d-md-flex justify-content-evenly flex-wrap">
        <?php
        session_start();
        $cliente = $_SESSION['id_cliente'];
use myapp\query\select;
        if (!isset($cliente)) {
            header("Location: ../index.php");
            exit;
        }
        
        require_once("../vendor/autoload.php");
        $query = new select();
        $cadena = "select juego.nombre as juego, plataforma, img, 
        clave.clave from juego join clave on clave.juego = juego.id_juego 
        join claves_vendidas on claves_vendidas.clave = clave.id_clave 
        join orden_venta on orden_venta.id_orden_venta = claves_vendidas.orden_venta 
        join carrito on carrito.id_carrito = orden_venta.carrito join cliente on cliente.id_cliente = 
        carrito.cliente where cliente = $cliente";
        $result = $query->Seleccionar($cadena);
        
foreach($result as $filas){?>
    <div class="row">
    <div class="tarjeta col-md-8 my-2 mx-auto mx-md-0 bg-dark d-flex align-items-md-center justify-items-center flex-md-column p-3  text-light rounded-3" style="--bs-bg-opacity: .9;">
    <img class="d-block img-fluid" src="<?php echo $filas->img?>" alt="">
    <div class="tarjeta-contenido w-100 d-flex flex-column align-items-center align-items-md-start ms-2 ms-0-md">
        <div class="d-md-flex w-100 justify-content-md-between align-items-md-center">
            <h3 class="fs-5"><?php echo $filas->juego ?></h3><br>
            <p><?php echo "Clave: ". $filas->clave ?></p>
        </div>
        <p>Plataforma: </p>
        <p><?php echo $filas->plataforma?></p>
        
    </div>
</div>
    </div>
<?php };?>
        </div>
        
    </div>
</body>
</html>