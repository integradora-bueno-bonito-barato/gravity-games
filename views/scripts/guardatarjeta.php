<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
        use MyApp\Query\Ejecuta;
        require("../../vendor/autoload.php");
        session_start();
        $cliente = $_SESSION['id_cliente'];
        $insert = new Ejecuta();
        extract($_POST);
        $cadena = "INSERT INTO tarjetas (n_tarjeta,exp,cvv,cliente) VALUES ('$n_tarjeta','$exp','$cvv',$cliente)";
        $insert->ejecutar($cadena);
        echo"<div class='alert alert-success'>
        tarjeta guardada</div>";
        header("refresh:3; ../comprar.php");
        
        ?>
    </div>
</body>
</html>