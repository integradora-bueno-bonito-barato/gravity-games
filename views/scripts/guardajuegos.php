
        <?php
        use MyApp\Query\Ejecuta;
        require("../../vendor/autoload.php");
        session_start();
        $cliente = $_SESSION['id_cliente'];
        
        $insert = new Ejecuta();
        extract($_POST);
        $cadena = "CALL insertar_juego('$nombrej', $generoj, '$clasificacionj', '$desj', '$plataformaj', $precioj, '$imgj')";
        $insert->ejecutar($cadena);
            $_SESSION['color'] = "success";
            $_SESSION['registrado'] = "Clave Registrada";
            header("Location: ../claves-juegos.php");
            exit;
    
        echo"<div class='alert alert-success'>
        tarjeta guardada</div>";
       
       
      
        ?>