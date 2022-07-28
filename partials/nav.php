<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-md-fluid container">
    <a class="navbar-brand d-flex gap-1 align-items-center me-md-4" href="index.php">
      <img class="" src="assets/img/planeta.png" alt="Foto de pizza planeta :v">
      <p class="m-0">Gravity games</p>
      </a>
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
      <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#login">
          Login
      </button> | 
        <a class="btn btn-outline-success" href="signup.php">Register</a>
      </div>
    </div>
  </div>
</nav>
