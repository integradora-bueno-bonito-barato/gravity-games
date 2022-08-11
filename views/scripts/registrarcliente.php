<?php

use MyApp\Query\Registrar;

require_once('../../vendor/autoload.php');
$insert = new Registrar();
extract($_POST);
$hash = password_hash($password, PASSWORD_DEFAULT);