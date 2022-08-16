<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
  <div class="bg-dark py-5 vh-100">
<div class="container rounded-3 bg-white">

<h1 align="center">Store</h1>
<div class="row">
        <div class="contenedor-tarjeta d-md-flex justify-content-evenly flex-wrap ">
<form action="" method="post">
<?php
use myapp\query\select;

require_once("../vendor/autoload.php");

$db = new select();
$cadena = "SELECT * FROM genero";
$reg = $db->Seleccionar($cadena);
echo "<div>
<label class= 'control-label'>Genero</label>
<select name='genero' class='form-select'>";




foreach($reg as $value)
{
  echo "<option value='".$value->id_genero."'>".$value->nombre."</option>";
}

echo "</select>
</div>";

?>

<center>
  <button type="submit" class="btn btn-lg btn-success">Ver</button>
</center>
</form>

<br><br>


<?php
if($_POST)
{
  extract($_POST);
  $consulta = new select();

  $cadena = "SELECT juego.img, juego.nombre, juego.precio, juego.plataforma, juego.id_juego FROM juego, genero where juego.genero = $genero";
 $result = $consulta->Seleccionar($cadena);
if($result){
 foreach($result as $filas)?>
   
   <form method="POST" action="scripts/agregarjuego.php"  class="tarjeta my-2 mx-auto mx-md-0 bg-dark d-flex align-items-md-center justify-items-center flex-md-column p-3  text-light rounded-3" style="--bs-bg-opacity: .9;">
    <img class="d-block" src="<?php echo $filas->img?>" alt="No se encuentra">
    <div class="tarjeta-contenido w-100 d-flex flex-column align-items-center align-items-md-start ms-2 ms-0-md">
      <div class="d-md-flex w-100 justify-content-md-between align-items-md-center">
        <h3 class="fs-5"><?php echo $filas->nombre ?></h3>
        <p><?php echo "$". $filas->precio ?></p>
        </div>
        <p>Plataforma: </p>
        <p><?php echo $filas->plataforma?></p>
        <input type="hidden" name="juego" value="<?php echo $filas->id_juego;?>">
        <button type="submit" class="btn btn-success mt-md-2 d-block mt-auto">Agregar al carrito</button>
        </div>
        </form>
        <?php };}?> 
 
      </div>

    </div>
  </div>
  
  <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>