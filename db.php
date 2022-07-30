
<!-- Conexion a nuestra base de datos -->
<?php
$conn = new mysqli("localhost", "root", "", "gravity_games");


// Verificar si la conexión es correcta, de ser asi 
// comenta el siguiente script
// affagdddddddddddddddd
if ($conn->connect_error) {
    die("Conexion Fallo: " . $conn->connect_error);
} else {
    echo "Conexion Exitosa";
}

?>