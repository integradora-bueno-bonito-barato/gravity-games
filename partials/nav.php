<nav class="navbar navbar-light navbar-expand-lg bg-light">
  <div class="container-md-fluid container">
    <a class="navbar-brand d-flex gap-1 align-items-center me-md-4" href="index.php">
      <img class="" src="assets/img/planeta.png" alt="Foto de pizza planeta :v">
      <p class="m-0">Gravity games</p>
      </a>
      <?php
           if(isset($_SESSION['error_usuario'])) {
            echo '<div class="alert alert-danger text-center">'.$_SESSION['error_usuario'].'</div>';
            unset($_SESSION['error_usuario']);
        } ;       
                    if(isset($_SESSION['error_contraseña'])) {
                        echo '<div class="alert alert-danger text-center">'.$_SESSION['error_contraseña'].'</div>';
                        unset($_SESSION['error_contraseña']);
                    } ;
                    ?>
                    <?php
                    if(isset($_SESSION['compra'])) {
                      echo '<div class="alert alert-success text-center">'.$_SESSION['compra'].'</div>';
                      unset($_SESSION['compra']);
                  } ;?>
                   <?php
                    if(isset($_SESSION['agregado'])) {
                      echo '<div class="alert alert-success text-center">'.$_SESSION['agregado'].'</div>';
                      unset($_SESSION['agregado']);
                  } ;?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    
<form class="d-flex gap-1" method="post">
  <div class="form-row align-items-center">
      <input required name="PalabraClave" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese palabra clave">  
      <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
    </div>
    <div class="col-auto">
   
      <button type="submit" class="btn btn-success mb-2">Buscar</button>
    </div>
                  </form>
                  
                  <div class="session ms-auto mt-2 mt-md-0">
  <?php include('partials/modals.php'); ?>
  <div class="sesiones">
  <a href="views/misclaves.php" class="btn btn-info ms-2">Mis claves</a>
    <?php 

            if(isset($_SESSION['id_cliente'])  ) { ?>
            <a class="btn btn-outline-success" href="views/carrito.php"><img src="assets/img/agregar-carrito.png" width="30px"></a>
            <a class="btn btn-outline-success" href="views/scripts/logout.php">Logout</a>
            <p class="d-inline-block fs-5">Bienvenido <?php echo $_SESSION['n_usuario'] ?></p>

        <?php }  elseif(isset($_SESSION['id_administrador'])  ) { ?>
<a class="btn btn-outline-success" href="views/scripts/ver_clientes.php">Ver clientes</a>

<a class="btn btn-outline-success" href="views/scripts/logout.php">Logout</a>

<p class="d-inline-block fs-5">Bienvenido admin  <?php echo $_SESSION['n_usuario'] ?></p> <img src="assets/middle/administrator.png" width="30px">

<?php }   else { ?> 
  <button type="button" class="btn my-1 btn-outline-success" data-bs-toggle="modal" data-bs-target="#login">
            Login
          </button>
          <a class="btn btn-outline-success" href="views/registro.php">Register</a>

          <?php } ?> 
        </div>
        
        
      </div>
                </div>


    </div>
  </div>
  
</nav>


            <?php
            
            
            //AQUI EMPIEZA CODIGO PHP DEL BUSCADOR
            if(!empty($_POST))
            {
              extract($_POST);
                  $aKeyword = explode(" ", $_POST['PalabraClave']);
                  $query ="SELECT * FROM juego WHERE nombre like '%" . $aKeyword[0] . "%' OR precio like '%" . $aKeyword[0] . "%'";
                  
                 for($i = 1; $i < count($aKeyword); $i++) {
                    if(!empty($aKeyword[$i])) {
                        $query .= " OR precio like '%" . $aKeyword[$i] . "%'";
                    }
                  }
                 
                 $result = $db->query($query);
                 echo '<div class="container bg-light p-0">';
                 
                                 
                 if(mysqli_num_rows($result) > 0) {
                    $row_count=0;
                    
                    echo "<table class='table table-striped'>";
                    echo "<tr>";
                        echo "<th></th><th>NOMBRE</th><th>PRECIO</th><th></th>";
                        echo "</tr>";
                    While($row = $result->fetch_assoc()) {   
                        $row_count++;                         
                        
                        echo "<tr><td> $row_count.- </td>";
                        echo "<td>". $row['nombre'] ."</td>";
                        echo "<td>$". $row['precio'] ."</td>";
                        ?>
                          <form action="views/scripts/agregarjuego.php" method="post">
                            <input type="hidden" name="id_juego" value="<?php echo $row['id_juego'] ?>">

                          <td> <button type="submit"  class="btn btn-success d-block">Añadir al carrito</button> </td></tr>
                          </form>
                        
                        <?php


                    }
                    echo "</table>";
              
                }
                else {
                    echo "<br>Resultados encontrados: Ninguno";
                
                }
                echo "</div>";
            }
            //AQUI TERMINA EL CODIGO PHP DEL BUSCADOR
            ?>
