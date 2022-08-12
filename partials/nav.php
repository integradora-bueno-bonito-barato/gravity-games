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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="d-flex mt-2 mt-md-0" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>  
      <div class="session ms-auto mt-2 mt-md-0">
      <?php include('partials/modals.php'); ?>
      <div class="sesiones">
      
        <?php 
        
        if(isset($_SESSION['id_cliente'])  ) { ?>
        <a class="btn btn-outline-success" href="views/scripts/logout.php">Logout</a>
        <?php } else { ?> 
          <button type="button" class="btn my-1 btn-outline-success" data-bs-toggle="modal" data-bs-target="#login">
          Login
      </button>
        <a class="btn btn-outline-success" href="views/registro.php">Register</a>
          <?php } ?> 
      </div>


      </div>
    </div>
  </div>
  
</nav>
