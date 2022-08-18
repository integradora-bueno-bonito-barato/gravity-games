<?php
require('../../vendor/autoload.php');
use myapp\query\login;

extract($_POST);
$login = new login();

$login->verificarusuario($user, $password);