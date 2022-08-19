<?php

use myapp\data\database;
use myapp\query\select;

        require("../../vendor/autoload.php");
        session_start();
        $cliente = $_SESSION['id_cliente'];

        extract($_POST);

   
        echo "$tarjeta"; 
        echo "$cliente";
        $cc = new database("gravity_games", "root", "");
        $objetoPDO = $cc->getPDO();
        $query = "select * from cliente join carrito on cliente.id_cliente = carrito.cliente join tarjetas on tarjetas.cliente = cliente.id_cliente where cliente.id_cliente = $cliente";
        $result = $objetoPDO->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $carrito = $row['id_carrito'];
        $cvv2 = $row['cvv'];
        // if($cvv2 != $cvv){
        //     session_start();
        //     $_SESSION['color'] = "danger";
        //     $_SESSION['registrado'] = "CVV incorrecto";
        //     header('location: ../comprar.php');

        //     exit;
        // }
        echo "$carrito";
        $query = "select * from orden_venta where carrito = $carrito";
        $result = $objetoPDO->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row == null){
            $query = "insert into orden_venta (carrito, tarjeta) values ($carrito, $tarjeta)";
            $result = $objetoPDO->query($query);
            echo "insertado";
        }
        $query = "select * from orden_venta where carrito = $carrito";
        $result = $objetoPDO->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $orden = $row['id_orden_venta'];
        echo "$orden";
        $seleccionar = new select();
        $query = "call claves_listas($carrito)";
        $result = $seleccionar->seleccionar($query);
        foreach($result as $row){
            $juegowo = $row->id_juego;
            $clave = $row->id_clave;
            echo $clave;
            $query = "insert into claves_vendidas (orden_venta, clave) values ($orden, $clave)";
            $result = $objetoPDO->query($query);
            echo "insertado";
        }
        $_SESSION['compra'] = "Compra realizada";
        header('location: ../../index.php');
?>
