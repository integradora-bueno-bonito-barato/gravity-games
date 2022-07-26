<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>compra</title>
</head>
<body class="bg-dark">

<?php
use myapp\query\select;
require("../vendor/autoload.php");
session_start();
$cliente = $_SESSION['id_cliente'];
$query = new select();
$cadena = "SELECT tarjetas.n_tarjeta,tarjetas.cvv FROM tarjetas WHERE tarjetas.cliente=$cliente;";
$tabla = $query->Seleccionar($cadena);
$resultado ="SELECT tarjetas.id_tarjetas,tarjetas.n_tarjeta,tarjetas.cvv, tarjetas.exp FROM tarjetas inner JOIN cliente on tarjetas.cliente = cliente.id_cliente WHERE cliente.id_cliente = $cliente";
$tabla2 = $query->Seleccionar($resultado);
$resultado2="call gravity_games.subtotal($cliente);";
$tabla3 = $query->Seleccionar($resultado2);
$cadena = "call juegosacomprar($cliente)";
$row = $query->Seleccionar($cadena);

$resultado5 = "SELECT carrito.id_carrito from carrito inner join cliente on cliente.id_cliente = carrito.cliente where cliente.id_cliente = $cliente";
$tabla10 = $query->Seleccionar($resultado5);
$n = 0;

?>

<div class="lista container rounded-3 bg-light p-3 mb-5">
<h1>Confirma tu compra</h1>
            <table class="table table-striped">
                <tr>
                    <th>Juego</th>
                    <th>Plataforma</th>
                    <th>Subtotal</th>
                    <th>Iva</th>
                    <th>Total</th>
                </tr>
           <?php
           foreach($row as $registro)
           {$subtotal = number_format($registro->subtotal, 2);
            $iva = number_format($registro->iva, 2);
            $total = number_format($registro->total, 2);
            
               echo"<tr>";
               echo"<td>".$registro->juego."</td>";
                echo"<td>".$registro->plataforma."</td>";
               echo"<td>".$subtotal."</td>";
               echo"<td>".$iva."</td>";
               echo"<td>".$total."</td>";
               echo"</tr>";
           }
           ?>
            </table>
        </div>
        
<div class="container rounded-3 bg-white">
    <div class="container text-bg-light rounded-3 mb-5 pb-3">
        
         <br><br>
        <?php
        
            ?>
        <div class="row align-items-center justify-content-around"> 
            <?php
            if(isset($_SESSION['color'] )){
                echo"<div class='alert alert-".$_SESSION['color']."'>".$_SESSION['registrado']."</div>";
                unset($_SESSION['color']);
                unset($_SESSION['registrado']);
            }
            ?>  
            <div class="mb-3 col-md-3"><img src="../assets/img/tarjeta_visa.png" alt="" class="img-fluid"></div>
            <div class="mb-3 col-md-5"><a class="btn btn-success  d-block w-100 fs-3" href="agregartarjeta.php">Agregar tarjeta</a></div>
            
            <!-- id cliente/carrito/id_tarjeta -->
            <!-- <div class="mb-3 col-4"> -->
            <?php if($tabla2){?>
                
                <form action="scripts/guardacompra.php" method="post">

                        <label for="tarjeta" class="fs-3">Seleccione su tarjeta</label>
                        <select name="tarjeta" id="" class="form-control">
                            <?php
                                foreach($tabla2 as $registro2)
                                    {  $n++;?>
                                        
                                        <option value="<?php echo $registro2->id_tarjetas;?>"><?php echo "$n - " . $registro2->n_tarjeta;?></option>
                                    
                                        <?php } ?>
                            ?>
                        </select><br>
                        <div class="fs-2"><label for="fechax" class="">Fecha de  Expiracion</label></div>
                <input type="text" maxlength="5" name="fechax" id="" required class="form-control"><br><br>

                <div class="fs-2"><label for="cvv" class="">Codigo de seguridad</label></div>
                <input type="text" maxlength="3" name="cvv" id="" required class="form-control"><br><br>
                <button type="submit" class="btn btn-success  d-block w-100">Comprar</button><br>
                
            </form>
            <?php } ?>
            
            
        <!-- </div> -->
        </div>
        
        
        <?php  ?>        
        
    </div>  

</body>
</html>