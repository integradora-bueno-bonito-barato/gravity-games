
<?php

use MyApp\Query\Select;

require_once('vendor/autoload.php');

$query = new Select();
$chain = "SELECT * FROM lista_juegos";
$result = $query->Seleccionar($chain);
foreach($result as $fila){?>
    <div class="tarjeta my-2 mx-auto mx-md-0 bg-dark d-flex align-items-md-center justify-items-center flex-md-column p-3  text-light rounded-3" style="--bs-bg-opacity: .9;">
    <img class="d-block" src="<?php echo $fila->img?>" alt="">
    <div class="tarjeta-contenido w-100 d-flex flex-column align-items-center align-items-md-start ms-2 ms-0-md">
        <div class="d-md-flex w-100 justify-content-md-between align-items-md-center">
            <h3 class="fs-5"><?php echo $fila->juego ?></h3>
            <p><?php echo "$". $fila->precio ?></p>
        </div>
        <p>Plataforma: </p>
        <p><?php echo $fila->plataforma?></p>
        <a href="elden-ring.php" class="btn btn-success mt-md-2 d-block mt-auto">Añadir al carrito</a>
    </div>
</div>
<?php };?>

?>
<div class="tarjeta my-2 mx-auto mx-md-0 bg-dark d-flex align-items-md-center justify-items-center flex-md-column p-3  text-light rounded-3" style="--bs-bg-opacity: .9;">
    <img class="d-block" src="assets/img-juegos/elden-ring.jpeg" alt="">
    <div class="tarjeta-contenido w-100 d-flex flex-column align-items-center align-items-md-start ms-2 ms-0-md">
        <div class="d-md-flex w-100 justify-content-md-between align-items-md-center">
            <h3 class="fs-5">Elden Ring</h3>
            <p>$899.99</p>
        </div>
        <p>Plataforma:</p>
        <p>Steam</p>
        <a href="elden-ring.php" class="btn btn-success mt-md-2 d-block mt-auto">Añadir al carrito</a>
    </div>
</div>

