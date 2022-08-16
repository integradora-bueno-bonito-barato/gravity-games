<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        $tarjeta=$_POST['tarjeta'];
        $codigocvv=$_POST['cvv'];
        
        echo"num de tarjeta; $tarjeta<br>";
        echo"cvv de la tarjeta; $codigocvv<br>";
        echo"usuario dueño de la tarjeta; $cliente<br>";



        ?>
    </div>
</body>
</html>
</body>
</html>