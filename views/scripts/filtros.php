<?php
  extract($_POST);
echo $genero;
session_start();
if ($genero = "todos") {
    $_SESSION['postgenero'] = "select * from lista_juegos";
} 


$_SESSION['postgenero'] = "select * from lista_juegos where id_genero = $genero";

echo $_SESSION['postgenero'];
