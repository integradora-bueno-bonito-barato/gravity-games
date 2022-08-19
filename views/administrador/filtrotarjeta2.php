<?php
  require_once("../../vendor/autoload.php");
  use myapp\query\select;
  $seleccionar = new select();
  $tarjetas= "select persona.id_persona, persona.nombre, persona.apellido from tarjetas right join cliente on cliente.id_cliente = tarjetas.cliente join persona on persona.id_persona = cliente.persona where tarjetas.cliente is null";
  $cliente = $seleccionar->Seleccionar($tarjetas);

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
        <h1>Clientes sin tarjetas</h1>
        <?php
           foreach($cliente as $blackpink)
           { ?>  
              <table border="1">
                <tr>
                    <th>nombre</th>
                    <th>id_cliente</th>
                  
                </tr>
                <tr>
                    <td><?php echo $blackpink->nombre . " " . $blackpink->apellido?></td>
                    <td><?php echo $blackpink->id_persona?></td>
                    
                </tr>
              </table>
             
        
        
        
           <?php } ?>

        
    
</body>
</html>
   
    
    

  