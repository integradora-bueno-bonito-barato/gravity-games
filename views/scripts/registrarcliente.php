<?php

use MyApp\Query\Registrar;
require_once('../../vendor/autoload.php');
require('../../src/query/registro.php');

$insert = new Registrar();
extract($_POST);

$insert->verificarpassword($password, $password2);
$insert->verificarusuario($usuario, $email);
$hash = password_hash($password, PASSWORD_DEFAULT);
$insert->crearcliente($nombre, $apellidos, $usuario, $email, $hash);
?>