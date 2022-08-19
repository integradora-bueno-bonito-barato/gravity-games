<?php
        use myapp\query\select;
        require_once("../../vendor/autoload.php");
        $query = new select;
        
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="paginaprincipal.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body class="body bg-dark">
    
    <div class="menu__side bg-success d-none d-md-block" id="menu_side">

        <div class="options__menu">	

            <a href="paginaprincipal.php" class="selected">
                <div class="option">
                    <i class="fas fa-user" title="Perfil"></i>
                    <h4>Peril</h4>
                </div>
            </a>

            <a href="ventas.php">
                <div class="option">
					<i class="fas fa-magnifying-glass-dollar"></i>
                    <h4>Ventas</h4>
                </div>
            </a>
            
            <a href="comentarios.php">
                <div class="option">
                    <i class="fas fa-comments" title="Cursos"></i>
                    <h4>Comentarios</h4>
                </div>
            </a>

            <a href="../scripts/ver_clientes.php">
                <div class="option">
					<i class="fas fa-address-book"></i>
                    <h4>Ventas</h4>
                </div>
            </a>

            <a href="../../index.php">
                <div class="option">
					<i class="fas fa-paper-plane"></i>
                    <h4>Ventas</h4>
                </div>
            </a>
		</div>

    </div>

    <main  >
   <div class="row">
    <h1 class="text-white text-center mb-3">Reporte de ventas por mes </h1>

   </div>

    
    <div class="row">
    <div class="col-md-8 offset-md-2 bg-light border border-success">
            <h1 class="text-center mb-3">Filtros</h1>
            <form class="p-2" method="POST" action="#">
                 
        <label class=" fs-5" for="mes">Mes a elegir:</label>
        <div class="d-flex mb-3 gap-1">
        <select class="form-control" name="mes">
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
            
                <input type="submit" class="btn btn-success mt-2" value="Buscar">
            </form>
           
               
        </div>
        
        <table class="table table-hover text bg-white ">
        <thead class="table text-bg-success">
            <tr>
                <th>Cliente</th><th>Fecha</th><th>Subtotal</th><th>Iva</th><th>Total</th><th>id_orden_venta</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        if($_POST){
            extract($_POST);
        $consulta = new select();
        $cadena="CALL reportexmes ($mes);";
        $tabla=$consulta->Seleccionar($cadena);
    ?>  
    
            <?php
            foreach($tabla as $registro)
            {   
                $iva = number_format($registro->iva, 2);
                $total = number_format($registro->total, 2);
                echo"<tr>";
                echo"<td> $registro->id_cliente </td>";
                
                echo"<td> $registro->fecha </td>";
                echo"<td> $registro->subtotal </td>";
                echo"<td> $iva </td>";
                echo"<td> $total </td>";
                echo"<td> $registro->id_orden_venta </td>";
                echo"</tr>";
            }
            ?>
        </tbody>
        </table>
       
    </div>
    <?php } ?>

    </main>

    <script src="js/script.js"></script>
</body>
</html>