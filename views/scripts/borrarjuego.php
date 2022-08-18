<?php
require_once('../../vendor/autoload.php');
use myapp\query\ejecuta;
use PDOException;
session_start();
extract($_POST);
echo $juego;
echo $carrito;
try {
    $execute = new ejecuta();
$execute->ejecutar("call eliminar_juego($juego,$carrito)");

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

session_start();
$_SESSION['eliminado'] = 'Juego eliminado exitosamente del carrito';
header ('location: ../carrito.php');