<?php
require('../../vendor/autoload.php');
use myapp\query\ejecuta;
use myapp\query\select;
session_start();
extract($_POST);
echo $juego;
$select = new select();
$query = "call juego_disponible($juego)";
$result = $select->seleccionar($query);
$persona = $_SESSION['n_usuario'];
if(!isset($persona)){
    $_SESSION["error_sesion"] = "Debes iniciar sesión para poder comprar";
    header("Location: ../../index.php");
    exit;
}
if($result == null) {
    
    $_SESSION['error_contraseña'] = "No hay stock disponible";
    header('location: ../../index.php');
    exit;
}


$carrito = $_SESSION['id_carrito'];
echo '<br>';
echo $carrito;
echo '<br>';
echo $persona;

$insert = new ejecuta();
$sql = "insert into item_carrito (carrito, juego) values ($carrito, $juego);";
$insert->ejecutar($sql);
session_start();
$_SESSION['agregado'] = "Juego agregado al carrito";
header('location: ../../index.php');