<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body class="bg-dark">
    <div class="container-fluid  text-white fs-4 p-3">
        <div class="row">
            <div class="navbar-brand d-inline">
            <a class="navbar-brand me-md-4" href="../index.php">
                <img class="" src="../assets/img/planeta.png" alt="Foto de pizza planeta :v">
                <p class="d-inline">Gravity games</p>
            </a>
            </div>
        </div>
        <div class="row align-items-center mt-5">
            <div class=" col-md-6 text-center offset-md-1">
                <img class="img-fluid" src="../assets/img/planeta.png" alt="Foto de pizza planeta :v">
                <h1 class="fs-1">Hola! Es genial conocerte.</h1>
                <h2>Hora de despegar!</h2>
            </div>
            <div class="col-md-4 p-4">
            <?php
                    session_start();
                    if(isset($_SESSION['error_contraseña'])) {
                        echo '<div class="alert alert-danger text-center">'.$_SESSION['error_contraseña'].'</div>';
                        unset($_SESSION['error_contraseña']);
                    } ;
                    ?>
                <form class="bg-white text-black p-4 rounded-3 " action="scripts/registrarcliente.php" method="post">
                    <label for="nombre">Nombre</label>
                    <input required type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre" class="form-control">
                    <label for="apellidos">Apellidos</label>
                    <input required type="text" name="apellidos" id="apellidos" placeholder="Escribe tus apellidos" class="form-control">
                    <label for="usuario">Nombre de usuario</label>
                    <input required type="text" name="usuario" id="usuario" placeholder="Escribe tu nombre de usuario" class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Escribe tu email" class="form-control">
                    <label for="password">Contraseña</label>
                    <input required type="password" name="password" id="password" placeholder="Escribe tu contraseña" class="form-control">
                    <label for="password2">Repite contraseña</label>
                    <input required type="password" name="password2" id="password2" placeholder="Repite tu contraseña" class="form-control">
                    <button type="submit" class="btn btn-warning  d-block w-100 mt-3">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>