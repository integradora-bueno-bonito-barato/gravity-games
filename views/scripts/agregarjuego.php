<?php
require('../../vendor/autoload.php');
use MyApp\Query\Ejecuta;


extract($_POST);
echo $juego;
session_start();
$persona = $_SESSION['n_usuario'];
$carrito = $_SESSION['id_carrito'];
echo '<br>';
echo $carrito;
echo '<br>';
echo $persona;

$insert = new Ejecuta();
$sql = "insert into item_carrito (carrito, juego) values ($carrito, $juego);";
$insert->ejecutar($sql);
session_start();
$_SESSION['agregado'] = "Juego agregado al carrito";
header('location: ../../index.php');