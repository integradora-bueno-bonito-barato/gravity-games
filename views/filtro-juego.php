<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Seleccionado</title>
</head>
<body class="bg-dark">
<?php
            require_once('../vendor/autoload.php');
            use myapp\query\select;

            extract($_POST);
            
            $select = new select();
            $query = "select * from lista_juegos where id_juego = $juego";
            $result = $select->seleccionar($query);
?>

    <div class=" py-2 px-3">
        <a href="filtros-juegos.php" class="d-block col-md-4 offset-md-4 btn btn-success">Volver</a>
    </div>
    <div class="container-fluid col-md-8">
        <div class="row justify-content-end justify-content-md-start">
            <h1 class="text-light text-center">Juego seleccionado</h1>
            <div class="col-md-8 offset-2">
            <?php foreach($result as $filas) {?>
            <form class=" bg-light text-dark mt-2 p-3" method="post"  action="scripts/agregarjuego.php">
            <div class="row ">
                <div class="col-md-4 align-self-center">
                    <img class="d-block mx-auto img-fluid" src="<?php echo $filas->img?>" alt="IMG PAPU">
                </div>
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div>
                    <div class="mb-2">
                    <h1><?php echo "$filas->juego" ?></h1>
                    </div>
                    <p class=" fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam debitis impedit cumque nihil repudiandae</p>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap">
                    <p class="fs-4">Plataforma: <?php echo "$filas->plataforma" ?></p>
                    <p class="fs-4">Genero: <?php echo "$filas->genero" ?></p>
                    <?php $genero = $filas->id_genero;?>
                    <input type="hidden" name="juego" value="<?php echo $filas->id_juego;?>">
                    
                    <button class="btn btn-success mt-3 w-100" type="submit">Agregar al carrito</button>    
                </div>
                    
                </div>
            </div>
        </form>
        <?php } ?>
            </div>
            
        </div> 
        <div>
            <h2 class="text-white text-center">Juegos relacionados:</h2>
        <div class="d-md-flex ms-1 justify-content-evenly gap-3">
        <?php 
                $select = new select();
                $query = "select * from lista_juegos where id_genero = $genero and id_juego != $juego";
                $result = $select->seleccionar($query);
                foreach($result as $filas) {?>
                    <form method="POST" action="#"  class="tarjeta my-2 mx-auto mx-md-0 bg-light text-dark d-flex align-items-md-center justify-items-center flex-md-column p-3  text-light rounded-3" style="--bs-bg-opacity: .9;">
                        <img class="d-block img-fluid" src="<?php echo $filas->img?>" alt="">
                            <div class="tarjeta-contenido w-100 d-flex flex-column align-items-center align-items-md-start ms-2 ms-0-md">
                                <div class="d-md-flex w-100 justify-content-md-between align-items-md-center">
                                    <h3 class="fs-5"><?php echo $filas->juego ?></h3>
                                    <p><?php echo "$". $filas->precio ?></p>
                                </div>
                                    <p>Plataforma:  </p>
                                    <p><?php echo $filas->plataforma?></p>
                                    <input type="hidden" name="juego" value="<?php echo $filas->id_juego?>">
                                    <button type="submit" class="btn btn-success mt-md-2 d-block w-100 mt-auto">Ver juego</button>
                            </div>
                    </form>
                 <?php } ?>
        </div>
        </div>
        
       
    </div>
    .
</body>
</html>