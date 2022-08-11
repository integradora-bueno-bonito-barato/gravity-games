<?php

namespace MyApp\Query;
use MyApp\Data\Database;
use PDOException;

class Registrar {
    public function registrar($qry){
        try {
            $cc = new Database("gravity_games", "root", "");
            $objetoPDO = $cc->getPDO();
            $objetoPDO->query($qry);
            $cc->desconectarDB();
        }
       catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }   
 
    public function verificarpassword($pass, $pass2) {
        if ($pass != $pass2) {
        session_start();
        $_SESSION['error_contraseña'] = "Las contraseñas no coinciden";
        header('location: ../registro.php');
        }
    }

}