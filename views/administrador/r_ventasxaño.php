<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Reportes de venta</title>
</head>
<body>
    <form action="" method="POST">
        <?php
        use myapp\query\select;
        require_once("../../vendor/autoload.php");
        $query = new select;
        
        
        ?>
        <label for="año">Año a elegir:</label>
        <input type="number" name="año" id="" placeholder="ej... 2020" min="01">
        <button  type="submit" class="btn text-bg-dark">Mostrar</button>
    </form>

    <?php 
        if($_POST){
            extract($_POST);
        $consulta = new select();
        $cadena="CALL reportexaño ($año);";
        $tabla=$consulta->Seleccionar($cadena);
    ?>
        <table class="table table-hover text-bg-white ">
        <thead class="table text-bg-success">
            <tr>
                <th>Cliente</th><th>Fecha</th><th>Subtotal</th><th>Iva</th><th>Total</th><th>Genero</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($tabla as $registro)
            {
                echo"<tr>";
                echo"<td> $registro->id_cliente </td>";
                echo"<td> $registro->fecha </td>";
                echo"<td> $registro->subtotal </td>";
                echo"<td> $registro->iva </td>";
                echo"<td> $registro->total </td>";
                echo"<td> $registro->genero </td>";
                echo"</tr>";
            }
            ?>
        </tbody>
        </table>
    <?php } ?>
</body>
</html>