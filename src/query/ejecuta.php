<?php

namespace MyApp\Query;
use MyApp\Data\Database;
use PDOException;

class Ejecuta {
    public function ejecutar($qry){
        try {
            $cc = new Database("gravity_games_beta", "root", "");
            $objetoPDO = $cc->getPDO();
            $objetoPDO->query($qry);
            $cc->desconectarDB();
        }
       catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}