<?php
namespace MyApp\Query;
use MyApp\Data\Database;
use PDO;

class Login {
    public function verificarusuario($usuario, $pass){
        
        $cc = new Database("gravity_games", "root", "");
        $objetoPDO = $cc->getPDO();
        $qry = "SELECT * FROM persona WHERE n_usuario = '$usuario' or correo = '$usuario'";
        $resultado = $objetoPDO->query($qry);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        if($row){
            if(password_verify($pass, $row['contraseña'])){
                $qry = "SELECT * FROM cliente WHERE persona = '$row[id_persona]'";
      
       $resultado = $objetoPDO->query($qry);
      
        $row2 = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($row2) {
            session_start();
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
                $_SESSION['error_contraseña'] = "La contraseña es incorrecta";
                header('location: ../../index.php');
            }
        }
        else{
            session_start();
            $_SESSION['error_usuario'] = "El usuario no existe";
            header('location: ../../index.php');
        }
        
        echo 'No encontre nada';
}
}