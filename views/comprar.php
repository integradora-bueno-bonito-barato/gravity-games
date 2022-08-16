<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body class="bg-dark">

<?php
use MyApp\Query\Select;
require("../vendor/autoload.php");
session_start();
$cliente = $_SESSION['id_cliente'];
$query = new select();
$cadena = "SELECT tarjetas.n_tarjeta,tarjetas.cvv FROM tarjetas WHERE tarjetas.cliente=$cliente;";
$tabla = $query->Seleccionar($cadena);
$resultado ="SELECT tarjetas.id_tarjetas,tarjetas.n_tarjeta,tarjetas.cvv FROM tarjetas inner JOIN cliente on tarjetas.cliente = cliente.id_cliente WHERE cliente.id_cliente = $cliente";
$tabla2 = $query->Seleccionar($resultado);
$resultado2="call gravity_games.subtotal($cliente);";
$tabla3 = $query->Seleccionar($resultado2);
$cadena = "call juegosacomprar($cliente)";
$row = $query->Seleccionar($cadena);
var_dump($row)

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
        
        <div class="row"></div> <br><br>
        <?php
        foreach($tabla2 as $registro){
            ?>
        <div class="row">   
            <div class="mb-3 col-2"><img src="../assets/img/tarjeta_silueta.png" alt="" class="img-fluid"></div>
            <div class="col-3">
            <table>
    <tr>
        <td class="fs-3">seleccione su tarjeta</td>
    </tr>
    <tr>
        <td>
            <select name="tarjeta" id="">
                <?php
                    foreach($tabla2 as $registro2)
                    {
                        echo"<option class='' value'".$registro2->id_tarjetas."'>".$registro2->n_tarjeta."</option>";
                    }
                ?>
            </select>
        </td>
    </tr>
</table>
   
            </div>
            <div class="mb-3 col-4">
            <form action="">
                <label for="cvv" class="fs-2">Codigo de seguridad</label>
                <input type="text" maxlength="3" name="cvv" id="">
                
            </form>
            </div>
            <?php } ?>
            <?php
            foreach($tabla3 as $registro3){
                ?>
                <div class="col-2 fs-3"><div>Total</div><div><?php echo"$registro3->subtotal"; ?></div></div>
        </div>
        </div>
        
        <button type="submit" class="btn btn-success  d-block w-100">Comprar</button><br>
        <?php } ?>        
        
    </div>  

</body>
</html>