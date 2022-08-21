<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="paginaprincipal.css">
    <title>Reportes de venta</title>
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
    <form action="" method="POST">
        <?php
        use myapp\query\select;
        require_once("../../vendor/autoload.php");
        $query = new select;
        
        
        ?>
        <label for="fi">Año inicial:</label>
        <input type="date" name="fi" id="" placeholder="ej... 2020" min="01" class="form-control">

        <label for="ff">Año final:</label>
        <input type="date" name="ff" id="" placeholder="ej... 2020" min="01" class="form-control"><br>
        <button  type="submit" class="btn text-bg-success">Mostrar</button>

    </form>
    <br>
    <?php 
        if($_POST){
            extract($_POST);
        $consulta = new select();
        $cadena="CALL reportexfecha ('$fi','$ff');";
        $tabla=$consulta->Seleccionar($cadena);
    ?>
        <table class="table table-hover text-bg-dark ">
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
</main>
    <script src="js/script.js"></script>
</body>
</html>