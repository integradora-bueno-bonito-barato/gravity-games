<?php 
require_once('../vendor/autoload.php');
use MyApp\Data\Database;

    $cc = new Database("gravity_games", "root", "");
$objetoPDO = $cc->getPDO();
$pass = 'awdxzs5';
$hash = password_hash($pass, PASSWORD_DEFAULT);
$qry = "UPDATE persona SET contraseña2 = '$hash' WHERE n_usuario = 'chiva'; 

$resultado = $objetoPDO->query($qry);
if ($resultado) {
    echo 'ok';
} else {
    echo 'error';
}