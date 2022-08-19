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
<body class="body">
    
    <div class="menu__side bg-dark" id="menu_side">

        <div class="options__menu">	

            <a href="perfil2.php" class="selected">
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

    <main >
        <h1 class="text-center">Bienvenido! <?php echo "Administardor" ?></h1><br>
		<div class="d-flex mt-5 justify-content-around flex-wrap">
        <a href="ventas.php">
        <div class="tarjeta">
			<div class="titulo">Reporte de ventas</div>
			<div class="cuerpo">
			<img src="ventas.jpg" max-width="400" height="200">
			<p>
               La ultima venta fue: 
			</p>
			</div>
		
		</div>
        </a>
		<a href="">
        <div class="tarjeta">
			<div class="titulo">Gestionar usuarios</div>
			<div class="cuerpo">
			<img src="ventas.jpg" max-width="400" height="200">
			<p>
               Las ventas: Dia 14/08/2022
			</p>
			</div>
		
		</div>
        </a>
        </div>
		
		
    </main>

    <script src="js/script.js"></script>
</body>
</html>