<?php
namespace MyApp\Query;
use PDO;
use PDOException;
use MyApp\Data\Database;



class Select {
    public function Seleccionar($qry){
        try{
            $cc = new Database("gravity_games", "root", "");
            $objetoPDO = $cc->getPDO();
            $resultado = $objetoPDO->query($qry);
            $filas = $resultado->fetchAll(PDO::FETCH_OBJ);
            $cc->desconectarDB();
            return $filas;
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}