<?php
  require_once("../../vendor/autoload.php");
  use myapp\query\select;
  $seleccionar = new select();
  $tarjeta = "select tarjetas.nombre, tarjetas.apellido, tarjetas.id_cliente, COUNT(id_tarjetas) as n_tarjetas from(select * from persona join cliente on cliente.persona = persona.id_persona join tarjetas on tarjetas.cliente = cliente.id_cliente ) as tarjetas group by id_cliente";
  $clientes = $seleccionar->Seleccionar($tarjeta);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Cantidad de tarjetas por clientes</h1>
        <?php
           foreach($clientes as $clientes)
           { ?>  
              <table border="1">
                <tr>
                    <th>nombre</th>
                    <th>id_cliente</th>
                    <th>cantidad de tarjetas</th>
                    
                </tr>
                <tr>
                    <td><?php echo $clientes->nombre . " " . $clientes->apellido?></td>
                    <td><?php echo $clientes->id_cliente?></td>
                    <td><?php echo $clientes->n_tarjetas?></td> 
                </tr>
              </table>
             
        
        
        
           <?php } ?>

        
    
</body>
</html>