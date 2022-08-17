<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    use MyApp\Query\Select;
    require("../vendor/autoload.php");
    session_start();
    $cliente = $_SESSION['id_cliente'];
    $query = new select();
    $juegoresultado ="SELECT juego.id_juego, juego.nombre FROM juego;";
    $tabla = $query->Seleccionar($juegoresultado);
    $juegogenero ="SELECT genero.id_genero, genero.nombre FROM genero;;";
    $tabla2 = $query->Seleccionar($juegogenero);
    ?>

    

    <!-- formulario para agregar claves -->
    <form action="scripts/guardaclaves.php" method="POST">
        <label for="clave">clave del juego:</label>
        <input type="text" maxlength="25" name="clave" id=""><br><br>

        <label for="juego">juego al que se le dara la clave</label>
        <select name="juego" id="" class="form-control">
                            <?php
                                foreach($tabla as $registro)
                                    {  $n++;?>
                                        
                                        <option value="<?php echo $registro->id_juego;?>"><?php echo "$n - " . $registro->nombre;?></option>
                                    <?php } ?>
                            ?>
        </select><br><br>
        <input class="btn btn-info text-dark fs-5 mt-2 w-100" type="submit" value="Guardar">
    </form><br><br><br>

    <!-- fomulario para agregar juegos -->
    <form action="scripts/guardajuegos.php" method="POST">
       <label for="nombrej">nombre del juego</label> 
       <input type="text" name="nombrej" id=""><br><br>

       <label for="generoj">genero del juego</label>
       <select name="generoj" id="" class="form-control">
                            <?php
                                foreach($tabla2 as $registro2)
                                    {  $n++;?>
                                        
                                        <option value="<?php echo $registro2->id_genero;?>"><?php echo "$n - " . $registro2->nombre;?></option>
                                    <?php } ?>
                            ?>
        </select><br><br>

        <label for="clasificacionj">clasificacion del juego</label>
        <input type="text" name="clasificacionj" id="" maxlength="3"><br><br>

        <label for="desj">descripcion del juego</label>
        <input type="text" name="desj" id=""><br><br>

        <label for="plataformaj">plataforma del juego</label>
        <select name="plataformaj" id="">
            <option value="Xbox One">1 - Xbox one</option>
            <option value="Playstation 4">2 - Playstation 4</option>
            <option value="Playstation 5">3 - Playstation 5</option>
            <option value="Xbox Series X">4 - Xbox Series X</option>
            <option value="Steam">5 - Steam</option>
        </select><br><br>

        <label for="precioj">precio del juego:</label>
        <input type="number" step="0.01" name="precioj" id="">$ <br><br>

        <label for="imgj">direccion de la imgagen del juego</label>
        <input type="text" name="imgj" id=""><br><br>
        <input class="btn btn-info text-dark fs-5 mt-2 w-100" type="submit" value="Guardar">
    </form> 
</body>
</html>