
        <?php
        use myapp\query\ejecuta;
        require("../../vendor/autoload.php");
        session_start();
        $cliente = $_SESSION['id_cliente'];
        
        $insert = new Ejecuta();
        extract($_POST);
        $cadena = "INSERT INTO clave (clave,juego) VALUES ('$clave','$juego')";
        $insert->ejecutar($cadena);
            $_SESSION['color'] = "success";
            $_SESSION['registrado'] = "Clave Registrada";
            header("Location: ../claves-juegos.php");
            exit;
    
        echo"<div class='alert alert-success'>
        tarjeta guardada</div>";
       
       
      
        ?>