<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>agregar tarjeta</title>
</head>
<body class="bg-dark">
<div class="container rounded-3 bg-white">
    <div class="container text-bg-light rounded-3 mb-5 pb-3">
        <div class="row"><h1>Agregar tarjeta</h1></div> <br>
        <form action="../views/scripts/guardatarjeta.php" method="post">
        <form class="bg-white text-black p-4 rounded-3 " action="" method="post">
                    <label for="n_tarjeta">Numero de tarjeta</label>
                    <input required type="text" maxlength="16" name="n_tarjeta" id="" placeholder="Introduzca el numero de la tarjeta" class="form-control">
                    <label for="apellidos">fecha de expiracion</label>
                    <input required maxlength="5" min="1" type="text" name="exp" id="" placeholder="Introduzca fecha de expiracion de la tarjeta" class="form-control">
                    <label for="usuario">Codigo de segurdidad (cvv)</label>
                    <input required maxlength="3" type="text" name="cvv" id="usuario" placeholder="Escribe tu codigo de seguridad" class="form-control">
                    
                    <input type="submit" value="guardar">
        </form>
        </form>
    </div>
</div>
</body>
</html>