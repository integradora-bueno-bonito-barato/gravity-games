<?php

use MyApp\Query\Registrar;
require_once('../../vendor/autoload.php');
require('../../src/query/registro.php');

$insert = new Registrar();
extract($_POST);

$insert->verificarpassword($password, $password2);
$hash = password_hash($password, PASSWORD_DEFAULT);

?>