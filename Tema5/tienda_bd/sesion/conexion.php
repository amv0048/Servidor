<?php 

$_servidor = "localhost";
    $_usuario = "MEDAC";
    $_contraseña = "MEDAC";
    $_nombre_bd = "tienda_bd"; // Case sensitive, ===

    $_conexion = new mysqli($_servidor, $_usuario, $_contraseña, $_nombre_bd);

    if($_conexion->connect_error){
        die("Error en la conexion: ".$_conexion->connect_error);
    }
    else echo "<h1>Conexion exitosa</h1>";

?>
