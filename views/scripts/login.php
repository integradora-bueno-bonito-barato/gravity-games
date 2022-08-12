<?php
require('../../vendor/autoload.php');
use MyApp\Query\Login;

extract($_POST);
$login = new Login();
$login->verificarusuario($user, $password);