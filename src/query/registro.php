<?php
namespace myapp\query;
use myapp\data\database;
use PDOException;
use PDO;
header('Content-Type: text/html; charset=UTF-8');
class registrar {
    
    public function registrar($qry){
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
 
   
   

    public function crearcliente($nombre, $apellidos, $usuario, $email, $pass, $pass2){
       
        $cc = new database("gravity_games", "root", "");
        $objetoPDO = $cc->getPDO();
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
        exit;
        }
        
        $qry = "SELECT * FROM persona WHERE n_usuario = '$usuario'";
        $resultado = $objetoPDO->query($qry);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        if($row){
            session_start();
            $_SESSION['error_contraseña'] = "El usuario ya esta en uso";
            header('location: ../registro.php');
            exit;
        }
        $qry = "SELECT * FROM persona WHERE correo = '$email'";
        $resultado = $objetoPDO->query($qry);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        if($row){
            session_start();
            $_SESSION['error_contraseña'] = "El email ya esta en uso";
            header('location: ../registro.php');
            exit;
        }
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        if (password_verify($pass, $hash)) {
            echo 'ok';

        }
        else {
            echo 'no';
        }
        echo $nombre;
        echo $apellidos;
        echo $usuario;
        echo $email;
        echo $hash;
        $qry = "insert into persona (nombre, apellido, n_usuario, correo, contraseña2) values ('$nombre', '$apellidos', '$usuario', '$email', '$hash')";
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
        $qry= "call crearcarrito('$row[id_cliente]')";
        $resultado = $objetoPDO->query($qry);
        $qry = "select * from carrito where cliente = '$row[id_cliente]'";
        $resultado = $objetoPDO->query($qry);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
    
       
        $cc->desconectarDB();
        header('location: ../../index.php');
    }

}