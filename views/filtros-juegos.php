<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver todos los juegos</title>
</head>
<?php


use myapp\query\select;

require_once ("../vendor/autoload.php");
   $select = new select();
    $filtro = new select();
    $query = "select * from genero";
    $filtros = $filtro->Seleccionar($query);
    
   ?>


<body class="bg-dark p-3">
    <div class="container-fluid  bg-white  rounded-3 mt-5 ">
        
      <div class="row p-3">
        <div>
            <a class="btn btn-success fs-3" href="../index.php">Volver</a>
            
        </div>
      </div>
      <div class="row p-3">
        <div class="col-md-4 bg-light border border-success">
            <h1 class="text-center mb-3">Filtros</h1>
            <form class="p-2" method="POST" action="#">
                <label class="form-label fs-5" for="genero">Genero:</label>
                <select class="form-control mb-2" name="genero" >
                    <option value="todos">Todos</option>
                   <?php foreach($filtros as $filas) { ?> 
                    <option value="<?php echo $filas->id_genero ?>"><?php echo $filas->nombre ?></option>
                    <?php }  ?>
                </select>
                <label class="form-label fs-5" for="ordenar">Ordenar:</label>
                <select class="form-control" name="ordenar" >
                   <option value="destacados">Destacados</option>
                   <option value="recientes"> Mas Recientes</option>
                   <option value="asc">Precio mas bajo</option>
                    <option value="desc">Precio mas alto</option>
                </select>
                
                <input type="submit" class="btn btn-success mt-2" value="Buscar">
            </form>
           
               
        </div>
     <div class="col-md-8 wrap gap-3 justify-content-center row ms-1 ms-md-0">
     <?php
        $cadena = "select * from lista_juegos";
        
        
        if($_POST) {
            extract($_POST);
            if($genero != "todos") {
                $cadena =  "select * from lista_juegos where id_genero = $genero";
            } 
            switch ($ordenar) {
                case 'recientes':
                    $cadena .= " order by id_juego desc";
                    break;
                case 'asc':                   
                    $cadena .= " order by precio asc";
                    break;
                case 'desc':
                    $cadena .= " order by precio desc";
                    break;
            }
            
               
        }
       
        $result = $select->Seleccionar($cadena);
        foreach($result as $filas) {?>
        <form method="POST" action="filtro-juego.php"  class="tarjeta my-2 mx-auto mx-md-0 bg-dark d-flex align-items-md-center justify-items-center flex-md-column p-3  text-light rounded-3" style="--bs-bg-opacity: .9;">
            <img class="d-block" src="<?php echo $filas->img?>" alt="">
                <div class="tarjeta-contenido w-100 d-flex flex-column align-items-center align-items-md-start ms-2 ms-0-md">
                    <div class="d-md-flex w-100 justify-content-md-between align-items-md-center">
                        <h3 class="fs-5"><?php echo $filas->juego ?></h3>
                        <p><?php echo "$". $filas->precio ?></p>
                    </div>
                        <p>Plataforma:  </p>
                        <p><?php echo $filas->plataforma?></p>
                        <input type="hidden" name="juego" value="<?php echo $filas->id_juego?>">
                        <button type="submit" class="btn btn-success mt-md-2 d-block mt-auto">Agregar al carrito</button>
                </div>
        </form>
     <?php } ?>
     

     </div>
      </div>
    </div>
</body>
</html>