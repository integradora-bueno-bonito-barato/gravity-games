<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="paginaprincipal.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body class="body bg-dark">
    
    <div class="menu__side bg-success d-none d-md-block" id="menu_side">

        <div class="options__menu">	

            <a href="paginaprincipal.php" class="selected">
                <div class="option">
                    <i class="fas fa-user" title="Perfil"></i>
                    <h4>Peril</h4>
                </div>
            </a>

            <a href="ventas.php">
                <div class="option">
					<i class="fas fa-magnifying-glass-dollar"></i>
                    <h4>Ventas</h4>
                </div>
            </a>
            
            <a href="comentarios.php">
                <div class="option">
                    <i class="fas fa-comments" title="Cursos"></i>
                    <h4>Comentarios</h4>
                </div>
            </a>

            <a href="../scripts/ver_clientes.php">
                <div class="option">
					<i class="fas fa-address-book"></i>
                    <h4>Ventas</h4>
                </div>
            </a>

            <a href="../../index.php">
                <div class="option">
					<i class="fas fa-paper-plane"></i>
                    <h4>Ventas</h4>
                </div>
            </a>
		</div>

    </div>

    <main  >
        <h1 class="text-light text-center">Bienvenido! <?php echo "Administrador" ?></h1><br>
		<div class="d-flex flex-column align-items-center  me-5 gap-5 me-md-0 mt-5">
        <a href="../claves-juegos.php">
        <div class="tarjeta1">
			<div class="titulo">Agregar videojuegos / claves</div>
			<div class="cuerpo">
			<img src="ventas.jpg" max-width="400" height="200">
			
			</div>
		
		</div>
        </a>
		<a href="modificarjuego.php">
        <div class="tarjeta1">
			<div class="titulo">Modificar videojuegos</div>
			<div class="cuerpo">
			<img src="ventas.jpg" max-width="400" height="200">
			
			</div>
		
		</div>
        </a>
        
        </div>
		
		
    </main>

    <script src="js/script.js"></script>
</body>
</html>