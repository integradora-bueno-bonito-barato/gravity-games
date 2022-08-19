<?php
require_once('../../vendor/autoload.php');
use myapp\query\ejecuta;

session_start();
extract($_POST);
$execute = new ejecuta();

if (($genero)) {
    $qry = "UPDATE juego set genero = $genero where id_juego = $id_juego";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($nombre) {
    $qry = "UPDATE juego set nombre = '$nombre' where id_juego = $id_juego";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($plataforma) {
    $qry = "UPDATE juego set plataforma = '$plataforma' where id_juego = $id_juego";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($precio) {
    $qry = "UPDATE juego set precio = '$precio' where id_juego = $id_juego";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($descripcion) {
    $qry = "UPDATE juego set descripcion = '$descripcion' where id_juego = $id_juego";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($img) {
    $qry = "UPDATE juego set img = '$img' where id_juego = $id_juego";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}

if (!isset($_SESSION['actualizado'])) {
    $_SESSION['actualizado'] = "No actualizaste ningun valor";
}

header('Location: modificarjuego.php');