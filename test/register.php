<?php 
require_once('../vendor/autoload.php');
use myapp\data\database;

    $cc = new database("gravity_games", "root", "");
$objetoPDO = $cc->getPDO();
$pass = 'awdxzs5';
$hash = password_hash($pass, PASSWORD_DEFAULT);
$qry = "UPDATE persona SET contraseña2 = '$hash' WHERE n_usuario = 'memo'" ;
$resultado = $objetoPDO->query($qry);
if ($resultado) {
    echo 'ok';
} else {
    echo 'error';
}