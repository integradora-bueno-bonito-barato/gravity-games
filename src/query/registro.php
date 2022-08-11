<?php

namespace MyApp\Query;
use MyApp\Data\Database;
use PDOException;

class Registrar {
    public function ejecutar($qry){
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
        echo "Las contraseñas no coinciden";
        header('refresh:2 ../registro.php');
        }
    }

}