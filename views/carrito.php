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
use MyApp\Data\Database;
use MyApp\Query\Select;
require("../vendor/autoload.php");
session_start();
$cliente = $_SESSION['id_cliente'];
echo $_SESSION['id_cliente'];
$query = new select();

$cadena = "call carrito_cliente($cliente)";
$tabla = $query->Seleccionar($cadena);
$cc = new Database("gravity_games", "root", "");
$objetoPDO = $cc->getPDO();
$cadena2 ="call subtotal($cliente);";
$result = $objetoPDO->query($cadena2);
$row = $result->fetch(PDO::FETCH_ASSOC);
$subtotal = $row['subtotal'];
$subtotal = number_format($subtotal, 2);
echo "<div class='container rounded-3 bg-white'>
<div class='container text-bg-light rounded-3 mb-5 pb-3'>";
echo"<div class='text-end pt-4'><a class='btn btn-success' href='../'>Volver</a></div>";
foreach($tabla as $registro)
{
echo"<hr>";
  // ../assets/...etc
    echo"<div class='row'>";
  echo"<div class='mb-3 col-1 d-none d-md-block'><img src='".$registro->img."' alt='' class='img-fluid'></div>
      <div class='mb-3 col-7 fs-3'>$registro->juego</div>
      <div class='mb-3 col-3 fs-3'>$registro->precio$"."</div>";
      
      echo"</div>";
}


    echo"<div class='row'>";
    echo"<div class='fs-3 col-1 offset-4 offset-md-10 '><div>Subtotal:</div><div>$subtotal</div></div>";
    echo"</div>";

echo"<a class='btn btn-outline-success w-100' href='comprar.php'>Continuar compra</a>";
echo"</div></div>";
?>

<!-- aqui empieza el contenido del carrito -->


</body>
</html>