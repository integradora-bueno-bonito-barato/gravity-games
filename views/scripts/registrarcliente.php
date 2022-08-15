<?php

use MyApp\Query\Registrar;
require_once('../../vendor/autoload.php');
require_once('../../src/query/registro.php');

$insert = new Registrar();
extract($_POST);

$insert->crearcliente($nombre, $apellidos, $usuario, $email, $password, $password2);
?>