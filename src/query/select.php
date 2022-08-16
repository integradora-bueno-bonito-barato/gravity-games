<?php
namespace myapp\query;
use PDO;
use PDOException;
use myapp\data\database;



class select {
    public function Seleccionar($qry){
        try{
            $cc = new Database("gravitygames", "root", "");
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