<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>

    <link rel="stylesheet" href="paginaprincipal.css">
	

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body class="body">
    
    <div class="menu__side" id="menu_side">

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

    <main>
        <h1>Bienvenido Administrador</h1><br>
		<div class="tarjeta">
			<div class="titulo">Ventas</div>
			<div class="cuerpo">
			<img src="ventas.jpg" width="400" height="200">
			<p>
               Las ventas: Dia 14/08/2022
			</p>
			</div>
		<div class="pie">
			<a class="boton2" href="ventas.php">Más informaciòn</a>
		</div>
		</div><br>
		<div class="tarjeta2">
			<div class="titulo2">Comentarios</div>
			<div class="cuerpo2">
			<img src="comentarios1.png" width="400" height="200">
			<p>
               Los comentarios del dia 14/08/2022
			</p>
			</div>
			<div class="pie2">
			<a class="boton" href="comentarios.php">Más información</a>
			</div>
		</div><br>
		
		
    </main>

    <script src="js/script.js"></script>
</body>
</html>