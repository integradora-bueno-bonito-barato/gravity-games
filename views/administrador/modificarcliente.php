<?php
require_once("../../vendor/autoload.php");
use myapp\query\select;
$select = new select();
$qry = "SELECT * from persona";
$personas = $select->Seleccionar($qry);

?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de usuarios</title>
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
            <h1 class="text-white">Seleccionar cliente</h1>
            <?php if(isset($_SESSION['actualizado'])) { 
            echo '<div class="alert alert-danger text-center">'.$_SESSION['actualizado'].'</div>';
            unset($_SESSION['actualizado']);  } ?>
        </div>
      <div class="row">
      <form class="col-md-4 bg-light p-3 rounded-3" action="#" method="POST">
        <label for="cliente" class="form-label">Cliente</label>
        <select class="form-control" name="cliente">
            <?php foreach($personas as $persona){ ?>
                <option value="<?php echo $persona->id_persona; ?>"><?php echo $persona->nombre; ?></option>
        <?php } ?>
        </select>
        <button class="btn btn-success mt-2" type="submit">Seleccionar</button>
      </form>
      <?php 
      if(isset($_POST['cliente'])){  
        extract($_POST);
        $qry = "SELECT * FROM persona WHERE id_persona = $cliente";
        $persona = $select->Seleccionar($qry);

        ?>
       <form class=" offset-md-1 col-md-6 bg-light p-3 rounded-3" action="cambiarcliente.php" method="POST">
        
        <input type="hidden" value="<?php echo $cliente?>" name="id_persona">
        <?php foreach($persona as $fila) {?> 
        <label for="nombre">Nombre : </label>
        <input class="form-control mb-3" name="nombre" type="text" placeholder="<?php echo $fila->nombre?>"> 
        <label for="apellido">Apellidos : </label>
        <input class="form-control mb-3" name="apellido" type="text" placeholder="<?php echo $fila->apellido ?>"> 
        <label for="n_usuario">Nombre de usuario: </label>
        <input class="form-control mb-3" name="n_usuario" type="text" placeholder="<?php echo $fila->n_usuario ?>"> 
        <label for="correo">Correo Electronico: </label>
        <input class="form-control mb-3" name="correo" type="text" placeholder="<?php echo $fila->correo ?>"> 
        <label for="contrasena">password: </label>
        <input class="form-control mb-3" name="contrasena2" type="text" placeholder="<?php echo $fila->contrasena2 ?>"> 
        
            
            
        
        <?php } ?>
        <button class="btn btn-success mt-2" type="submit">Modificar</button>
      </form>

      <?php } ?>
      </div>
    </main>

    <script src="js/script.js"></script>
</body>
</html>