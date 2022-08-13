<?php

namespace MyApp\Query;
use MyApp\Data\Database;
use PDOException;
use PDO;
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
        if (strlen($pass) < 6 ) {
            session_start();
            $_SESSION['error_contraseña'] = "La contraseña debe tener al menos 6 caracteres";
            header("Location: ../registro.php");
            exit;
        }
        if ($pass != $pass2) {
        session_start();
        $_SESSION['error_contraseña'] = "Las contraseñas no coinciden";
        header('location: ../registro.php');
        }
    }
    public function verificarusuario($usuario, $email){
           
            $cc = new Database("gravity_games", "root", "");
            $objetoPDO = $cc->getPDO();
            $qry = "SELECT * FROM persona WHERE n_usuario = '$usuario' or correo = '$email'";
            $resultado = $objetoPDO->query($qry);
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            if($row){
                session_start();
                $_SESSION['error_contraseña'] = "El usuario o email ya esta en uso";
                header('location: ../registro.php');
            }

    }

    public function crearcliente($nombre, $apellidos, $usuario, $email, $hash){
        $cc = new Database("gravity_games", "root", "");
        $objetoPDO = $cc->getPDO();
        $qry = "call crearcliente('$nombre', '$apellidos', '$usuario', '$email', '$hash')";
        $objetoPDO->query($qry);

        $qry = "SELECT * FROM persona WHERE n_usuario = '$usuario' or correo = '$email'";
        $resultado = $objetoPDO->query($qry);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $n_usuario = $row['n_usuario'];
        $id = $row['id_persona'];
        $qry = "call insertarcliente('$id')";
        $objetoPDO->query($qry);
        $qry= "select * from cliente where persona = '$id'";
        $resultado = $objetoPDO->query($qry);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $qry= "call crearcarrito('$row[id_cliente]'";
        $resultado = $objetoPDO->query($qry);
        session_start();
        $_SESSION['n_usuario'] = $n_usuario;
        $_SESSION['id_cliente'] = $usuario;
        $cc->desconectarDB();
        header('location: ../../index.php');
    }

}