<?php 
    /**
     * Vamos a crear una conexion entre PHP y la bbdd mysql
     * usando la clase mysqli
     * 
     * new mysqli() es el constructor, inicializa un obj que representa
     * la conexion a la bbdd
     * 
     * Si se produce la conexion, la variable donde guardamos el obj,
     * contendrá un obj de la clase mysqli, que podemos usar con la
     * bbdd (realizar consultas, manejar errores...)
     * 
     * Si se produce un fallo al conectarse, sera el metodo connect_error
     * el que contendrá la info del error
     */


    $_servidor = "localhost";
    $_usuario = "MEDAC";
    $_contraseña = "MEDAC";
    $_nombre_bd = "peliculas_bd"; // Case sensitive, ===

    $_conexion = new mysqli($_servidor, $_usuario, $_contraseña, $_nombre_bd);

    if($_conexion->connect_error){
        die("Error en la conexion: ".$_conexion->connect_error);
    }
    //var_dump($_conexion->connect_error);
    //echo "Conexion realizada con exito";
    /* echo "<br>".$_conexion->host_info;
    echo "<br>".$_conexion->server_info;
    echo "<br>".$_conexion->server_version; */
    /**
     * El fichero php lo hace al finalizar el fichero
     * Buena practica sobretodo si trabajamos con varias bbdd
     */
    //$_conexion->close();

?>

