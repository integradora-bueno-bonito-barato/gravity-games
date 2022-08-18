<?php
namespace myapp\query;
use myapp\data\database;
use PDO;
class login {
    public function verificarusuario($usuario, $pass){
        session_start();
        $cc = new database("gravity_games", "root", "");
        $objetoPDO = $cc->getPDO();
        $qry = "SELECT * FROM persona WHERE n_usuario = '$usuario' or correo = '$usuario'";
        $resultado = $objetoPDO->query($qry);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        
        
        $hash =  $row['contrasena2'];
        
        if($row) {
         if(password_verify($pass, $hash)){
            $qry = "call clientepersona ($row[id_persona])";
      
            $resultado = $objetoPDO->query($qry);
             
             $row2 = $resultado->fetch(PDO::FETCH_ASSOC);
             $qry = "select * from carrito where cliente = '$row2[id_cliente]'";
             $resultado = $objetoPDO->query($qry);
             $row3 = $resultado->fetch(PDO::FETCH_ASSOC);
             if ($row2) {
                 
                 $_SESSION['id_carrito'] = $row3['id_carrito'];
                 $_SESSION['n_usuario'] = $row2['n_usuario'];
                 $_SESSION['id_cliente'] = $row2['id_cliente'];
                 header('Location: ../../index.php');
                 exit;
             }
     
             $qry = "call adminpersona ($row[id_persona])";
             $resultado = $objetoPDO->query($qry);
             $row2 = $resultado->fetch(PDO::FETCH_ASSOC);
             $qry = "select * from carrito where administrador = '$row2[id_administrador]'";
             if ($row2) {
                 
                 $_SESSION['id_administrador'] = $row2['id_administrador'];
                 $_SESSION['id_carrito'] = $row3['id_carrito'];
                 $_SESSION['n_usuario'] = $row2['n_usuario'];
                 header('Location: ../../index.php');
                 exit;
             }
                
         } else {
                $_SESSION['error_contraseña'] = "Contraseña incorrecta";
                exit(header("Location: ../../index.php"));
                
         }
         
        }
        else{
          
            $_SESSION['error_usuario'] = "El usuario no existe";
                }
        
        
}
}