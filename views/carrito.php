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
session_start();
$cliente = $_SESSION['id_cliente'];
echo $_SESSION['id_cliente'];
$query = new select();
$cadena = "call carrito_cliente($cliente)";
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

<div class="container">
<h2 class="text-light">

</h2>
</div>
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