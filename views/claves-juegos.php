<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-dark">
    <?php
    use myapp\query\select;
    require("../vendor/autoload.php");
    session_start();
    $cliente = $_SESSION['id_cliente'];
    $query = new select();
    $juegoresultado ="SELECT juego.id_juego, juego.nombre FROM juego;";
    $tabla = $query->Seleccionar($juegoresultado);
    $juegogenero ="SELECT genero.id_genero, genero.nombre FROM genero;;";
    $tabla2 = $query->Seleccionar($juegogenero);
    ?>
    <div class="container p-3">
        <div class="row">
        <a class="btn btn-success col-md-1 col-10 offset-1 offset-md-3  mb-1" href="administrador/gestionjuego.php">Regresar</a>

        </div>
        <!-- formulario para agregar claves -->
    <form action="scripts/guardaclaves.php" class="bg-light offset-md-3  p-3 col-md-6 fs-5 " method="POST">
        <h2>Guardar clave de un  juego</h2>
        <label class="form-label" for="clave">Clave del juego:</label>
        <input class="form-control" placeholder="Ingresa la clave del videojuego" type="text" maxlength="25" name="clave" id="">

        <label for="juego">Juego al que se le dara la clave</label>
        <select name="juego" id="" class="form-control">
                            <?php
                                foreach($tabla as $registro)
                                    {  $n++;?>
                                        
                                        <option value="<?php echo $registro->id_juego;?>"><?php echo "$n - " . $registro->nombre;?></option>
                                    <?php } ?>
                            ?>
        </select>
        <input class="btn btn-info text-dark fs-5 mt-2 w-100" type="submit" value="Guardar">
    </form><br>

    <!-- fomulario para agregar juegos -->
    <form class="bg-light p-3 col-md-6 offset-md-3 fs-5" action="scripts/guardajuegos.php" method="POST">
    <h2>Guardar nuevo juego</h2>

       <label for="nombrej">Nombre del juego</label> 
       <input type="text" class="form-control mb-2" name="nombrej" id="">

       <label for="generoj">Genero del juego</label>
       <select name="generoj" id="" class="form-control mb-3">
                            <?php
                                foreach($tabla2 as $registro2)
                                    {  $n++;?>
                                        
                                        <option value="<?php echo $registro2->id_genero;?>"><?php echo "$n - " . $registro2->nombre;?></option>
                                    <?php } ?>
                            
        </select>

        <label for="clasificacionj">Clasificacion del juego</label>
        <input type="text"  class="form-control mb-3" name="clasificacionj" id="" maxlength="3">

        <label for="desj">Descripcion del juego</label>
        <input type="text" class="form-control mb-3"  name="desj" id="">

        <label for="plataformaj">Plataforma del juego</label>
        <select class="form-control" name="plataformaj" id="">
            <option value="Xbox One">1 - Xbox one</option>
            <option value="Playstation 4">2 - Playstation 4</option>
            <option value="Playstation 5">3 - Playstation 5</option>
            <option value="Xbox Series X">4 - Xbox Series X</option>
            <option value="Steam">5 - Steam</option>
        </select>

        <label for="precioj">Precio del juego:</label>
        <input class="form-control" type="number" step="0.01" name="precioj" id="">$ 

        <label for="imgj">Imagen del juego:</label>
        <input class="form-control" type="text" name="imgj" id="">
        <input class=" btn btn-info text-dark fs-5 mt-2 w-100" type="submit" value="Guardar">
    </form> 
    </div>    
</body>
</html>
