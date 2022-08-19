<?php
require_once('../../vendor/autoload.php');
use myapp\query\ejecuta;
extract($_POST);
echo $id_persona;
echo $nombre;
echo $apellido;
echo $n_usuario;
echo $correo;
echo $contrasena2;
session_start();
extract($_POST);
$execute = new ejecuta();

if (($nombre)) {
    $qry = "UPDATE persona set nombre = $nombre where id_persona = $id_persona";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($apellido) {
    $qry = "UPDATE persona set apellido = '$apellido' where id_persona = $id_persona";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($n_usuario) {
    $qry = "UPDATE persona set n_usuario = '$n_usuario' where id_persona = $id_persona";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($correo) {
    $qry = "UPDATE persona set correo = '$correo' where id_persona = $id_persona";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}
if ($contrasena2) {
    $hash = password_hash($contrasena2, PASSWORD_DEFAULT);
    $qry = "UPDATE persona set contrasena2 = '$hash' where id_persona = $id_persona";
    $execute->ejecutar($qry);
    $_SESSION['actualizado'] = "Valor o Valores actualizados";
}


if (!isset($_SESSION['actualizado'])) {
    $_SESSION['actualizado'] = "No actualizaste ningun valor";
};

header('Location: modificarcliente.php');