<?php
require_once("../../vendor/autoload.php");
use myapp\query\select;
$select = new select();
$qry = "SELECT id_juego, nombre FROM juego";
$juegos = $select->Seleccionar($qry);
$qry = "SELECT * FROM GENERO";
$generos = $select->Seleccionar($qry);

?><!DOCTYPE html>
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
        <div class="row ">
            <h1 class="text-white">Seleccionar un juego para modificar</h1>
    
        </div>
      <div class="row">
      <form class="col-md-4 bg-light p-3 rounded-3" action="#" method="POST">
        <label for="juego" class="form-label">Juego</label>
        <select class="form-control" name="juego">
            <?php foreach($juegos as $juego){ ?>
                <option value="<?php echo $juego->id_juego; ?>"><?php echo $juego->nombre; ?></option>
        <?php } ?>
        </select>
        <button class="btn btn-success mt-2" type="submit">Seleccionar</button>
      </form>
      <?php 
      if(isset($_POST['juego'])){  
        extract($_POST);
        $qry = "SELECT * FROM juego WHERE id_juego = $juego";
        $juegos = $select->Seleccionar($qry);

        ?>
       <form class=" offset-md-1 col-md-6 bg-light p-3 rounded-3" action="cambiarjuego.php" method="POST">
        <input type="hidden" value="<?php echo $juego?>" name="id_juego">
        <label for="genero" class="form-label">Genero</label>
        <select class="form-control" name="genero">
            <?php foreach($generos as $genero){ ?>
                <option value="<?php echo $genero->id_genero; ?>"><?php echo $genero->nombre; ?></option>
        <?php } ?>
        
        </select>
        <?php foreach($juegos as $fila) {?> 
        <label for="nombre">Titulo: </label>
        <input class="form-control mb-3" name="nombre" type="text" placeholder="<?php echo $fila->nombre ?>"> 
        <label for="nombre">Plataforma: </label>
        <input class="form-control mb-3" name="plataforma" type="text" placeholder="<?php echo $fila->plataforma ?>"> 
        <label for="precio">Precio: </label>
        <input class="form-control mb-3" name="precio" type="text" placeholder="<?php echo $fila->precio ?>"> 
        <label for="precio">Descripcion: </label>
        <input class="form-control mb-3" name="descripcion" type="text" placeholder="<?php echo $fila->descripcion ?>"> 
        
            
            
        
        <?php } ?>
        <button class="btn btn-success mt-2" type="submit">Modificar</button>
      </form>

      <?php } ?>
      </div>
    </main>

    <script src="js/script.js"></script>
</body>
</html>