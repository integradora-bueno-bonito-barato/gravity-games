<?php
$servidor= "localhost";
$usuario= "root";
$password = "";
$nombreBD= "gravity_games";
$db = new mysqli($servidor, $usuario, $password, $nombreBD);
use PDO;
var_dump(defined(PDO::MYSQL_ATTR_LOCAL_INFILE));

if (isset($db)) {
    echo "Conexión exitosa";
} else {
    echo "Error en la conexión";
}
if ($db->connect_error) {
    die("la conexión ha fallado: " . $db->connect_error);
}
if (!$db->set_charset("utf8")) {
    $db->error;
    exit();
} else {
     $db->character_set_name();
}
?>