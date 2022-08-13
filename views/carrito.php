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
$cadena = "SELECT juego.img, persona.nombre,juego.nombre AS juego,juego.precio FROM juego 
inner JOIN item_carrito on juego.id_juego = item_carrito.juego 
inner JOIN carrito on carrito.id_carrito = item_carrito.carrito 
inner JOIN cliente on carrito.cliente= cliente.id_cliente 
INNER join persona on persona.id_persona=cliente.persona WHERE persona.id_persona=5;
";
$tabla = $query->Seleccionar($cadena);


echo "<div class='container rounded-3 bg-white'>
<div class='container text-bg-light rounded-3 mb-5 pb-3'>";
foreach($tabla as $registro)
{
echo"<hr>";
  // ../assets/...etc
    echo"<div class='row'>";
  echo"<div class='mb-3 col-1'><img src='".$registro->img."' alt='' class='img-fluid'></div>
      <div class='mb-3 col-7 fs-3'>$registro->juego</div>
      <div class='mb-3 col-3 fs-3'>$registro->precio$"."</div>";
      echo"</div class='row'>";
}
echo"</div></div>";
?>


<!-- aqui empieza el contenido del carrito -->

<div class="container rounded-3 bg-white">
    <div class="container text-bg-light rounded-3 mb-5 pb-3">
        contenido
        <hr>
        <div class="row">
            
            <div class="mb-3 col-1"><img src="../assets/img-juegos/elden-ring.jpeg" alt="" class="img-fluid"></div>
            <div class="mb-3 col-7  fs-3">texto</div>
            
        </div>
        <hr>
        <div class="row">
            
            <div class="mb-3 col-2"><img src="../assets/img-juegos/elden-ring.jpeg" alt="" class="img-fluid"></div>
            <div class="mb-3 col-7">texto</div>
            <div class="mb-3 col-3 text-end">texto</div>
            
        </div>



    </div>  
</div>
</body>
</html>