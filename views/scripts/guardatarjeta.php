
        <?php
        use MyApp\Query\Ejecuta;
        require("../../vendor/autoload.php");
        session_start();
        $cliente = $_SESSION['id_cliente'];
        
        $insert = new Ejecuta();
        extract($_POST);
        $cadena = "INSERT INTO tarjetas (n_tarjeta,exp,cvv,cliente) VALUES ('$n_tarjeta','$exp','$cvv',$cliente)";
        $insert->ejecutar($cadena);
            $_SESSION['color'] = "success";
            $_SESSION['registrado'] = "Tarjeta registrada";
            header("Location: ../comprar.php");
            exit;
    
        echo"<div class='alert alert-success'>
        tarjeta guardada</div>";
       
       
      
        ?>