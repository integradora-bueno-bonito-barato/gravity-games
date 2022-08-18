
<?php

use myapp\query\select;

require_once('vendor/autoload.php');

$query = new select();
$chain = "SELECT * FROM juego";
$result = $query->Seleccionar($chain);
foreach($result as $filas){?>
    <form method="POST" action="views/juego.php"  class="tarjeta my-2 mx-auto mx-md-0 bg-dark d-flex align-items-md-center justify-items-center flex-md-column p-3  text-light rounded-3" style="--bs-bg-opacity: .9;">
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

