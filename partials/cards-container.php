<div class="container">
    <div class="row">
        <div class="p-3 mt-5 d-none d-md-block col-md-4 bg-light rounded-3">
            <h2>Filtros</h2>
            <div class="form-group">
                <label for="">Plataforma</label>
                <select class="form-control " id="">
                    <option value="todas">Todas</option>
                    <option value="#">Steam</option>
                    <option value="#">Playstation 4</option>
                    <option value="#">Playstation 5</option>
                    <option value="#">Xbox one</option>
                    <option value="#">Xbox Series X</option>
                </select>
            </div> <br>

            <div class="form-group">
                <label for="">Genero</label>
                <select class="form-control " id="">
                    <option value="todas">Todas</option>
                    <option value="#">Aventura</option>
                    <option value="#">Terror</option>
                    <option value="#">Arcade</option>
                    <option value="#">Simulador</option>
                    <option value="#">Estrategia</option>
                </select>
            </div> <br>

            <div class="form-group">
                <label for="">Caracteristicas</label>
                <select class="form-control " id="">
                    <option value="todas">Todas</option>
                    <option value="#">Un solo jugador</option>
                    <option value="#">Dos jugadores</option>
                    <option value="#">Hasta 4 jugadores de manera local</option>
                    <option value="#">En linea</option>
                </select>
            </div>
            
        </div>
        <div class="col-12 col-md-8">
            <h1 class="text-center text-md-start">Recomendaciones</h1>
            <div class="contenedor-tarjeta d-md-flex justify-content-evenly flex-wrap ">
                <?php include('partials/cards.php');?>
            </div>
        </div>
    </div>
</div>