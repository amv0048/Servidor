<?php 

    $_server = "localhost";
    $_user = "MEDAC";
    $_pass = "MEDAC";
    $_bbdd = "videojuegos_bd";

    $_conexion = new mysqli($_server, $_user, $_pass, $_bbdd);

    if ($_conexion->connect_error) die("Error en la conexion" .$_conexion->connect_error);
?>