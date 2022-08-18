<header class="vh-75 container d-none d-md-block">
    <div class="row align-items-center">
    <figure class="col-md-6 ">
        <img class="img-fluid" src="assets/meteor-rain.gif" alt="">
    </figure>
    <section class="col-md-4 offset-md-1">
    <?php 
        if(isset($_SESSION['error_sesion'])) {
            echo '<div class="alert alert-info text-center mt-3">'.$_SESSION['error_sesion'].'</div>';
            unset($_SESSION['error_sesion']);
        } ;?>
        <h1 class="">Bienvenido a la tienda de juegos</h1>
        <p class="">
            Aquí podrás encontrar los juegos más populares de todos los tiempos.
        </p>
        <div class="">
            <a href="views/filtros-juegos.php" class="btn btn-success">Ver juegos</a>
        </div>
        
    </section>
    </div>
</header>