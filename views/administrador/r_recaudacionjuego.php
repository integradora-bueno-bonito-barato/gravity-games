<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Reporte de venta</title>
</head>
<body>
    <div class="container">
        <h2>Recaudacion de un juego</h2>
    </div>
    <form action="" method="POST">
        <?php
        use myapp\query\select;
        require_once("../../vendor/autoload.php");
        $query = new select;
        $juegoresultado ="SELECT juego.id_juego, juego.nombre FROM juego;";
        $tabla = $query->Seleccionar($juegoresultado);
        
        
        ?>
        <label for="juego">juego al que se le dara la clave</label>
        <select name="juego" id="" class="form-control">
                            <?php
                                foreach($tabla as $registro)
                                    {  $n++;?>
                                        
                                        <option value="<?php echo $registro->id_juego;?>"><?php echo "$n - " . $registro->nombre;?></option>
                                    <?php } ?>
                            ?>
        </select><br><br>
        <button  type="submit" class="btn text-bg-dark">ver</button>
    </form>
    <?php 
        if($_POST){
            extract($_POST);
        $consulta = new select();
        $cadena="call juegorecaudacion($juego);";
        $tabla=$consulta->Seleccionar($cadena);
    ?>
        <table class="table table-hover text-bg-white ">
        <thead class="table text-bg-success">
            <tr>
                <th>Juego</th><th>Precio</th><th>Recaudacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($tabla as $registro)
            {
                echo"<tr>";
                echo"<td> $registro->nombre </td>";
                echo"<td> $registro->precio</td>";
                echo"<td> $registro->recaudacion</td>";
                echo"</tr>";
            }
            ?>
        </tbody>
        </table>
    <?php } ?>
</body>
</html>