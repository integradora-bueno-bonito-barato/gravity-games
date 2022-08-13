<?php

extract($_POST);
echo $juego;
session_start();
$persona = $_SESSION['n_usuario'];
$carrito = $_SESSION['id_carrito'];
echo '<br>';
echo $carrito;
echo '<br>';
echo $persona;


