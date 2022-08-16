<?php

use myapp\query\registrar;
require_once('../../vendor/autoload.php');
require_once('../../src/query/registro.php');

$insert = new registrar();
extract($_POST);

$insert->crearcliente($nombre, $apellidos, $usuario, $email, $password, $password2);
?>