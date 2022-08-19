<?php

namespace myapp\query;
use myapp\data\database;
use PDOException;

class ejecuta {
    public function ejecutar($qry){
        try {
            $cc = new database("gravity_games", "root", "");
            $objetoPDO = $cc->getPDO();
            $objetoPDO->query($qry);
            $cc->desconectarDB();
        }
       catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}