<?php
namespace MyApp\Query;
use MyApp\Data\Database;
use PDO;

class Login {
    public function verificarusuario($usuario, $pass){
        
        $cc = new Database("gravity_games_beta", "root", "");
        $objetoPDO = $cc->getPDO();
        $qry = "SELECT * FROM persona WHERE n_usuario = '$usuario'";
        $resultado = $objetoPDO->query($qry);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        
        echo $usuario;
        echo $row['n_usuario'];
        if($row) {
           
                $qry = "call clientepersona ($row[id_persona])";
      
       $resultado = $objetoPDO->query($qry);
      
        $row2 = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($row2) {
            session_start();
            $_SESSION['n_usuario'] = $row2['n_usuario'];
            $_SESSION['id_cliente'] = $row2['id_cliente'];
            header('location: ../../index.php');
            exit;
        }

        $qry = "SELECT * FROM administrador WHERE persona = '$row[id_persona]'";
        $resultado = $objetoPDO->query($qry);
        $row2 = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($row2) {
            session_start();
            $_SESSION['id_administrador'] = $row2['id_administrador'];
            header('location: ../../index.php');
            exit;
        }
           
        }
        else{
            session_start();
            $_SESSION['error_usuario'] = "El usuario no existe";
            echo 'El usuario no existe';
        }
        
        
}
}