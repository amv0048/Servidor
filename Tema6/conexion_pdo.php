<?php 
    /*
        PDO (PHP DATA OBJECTS) la usaremos para acceder a bdd
        de manera uniforme y segura

        Es un traductor universal que permite hablar al php
        con diferentes bbdd usando el mismo lenguaje

        Problemas de Mysqli:

        -Solo MYSAL/MariaDb
        -Codigo menos trasnportable/reutilizable


        Ventajas PDO:

        -Compatible con muchos tipos de bbdd
        -Consultas preparadas por defecto, mas seguro
        -Se puede manejar errores con excepciones de forma mas robusta
        -Sintaxis consistentes entre diferentes tipos de bbdd
    
    */

    $_server = 'localhost';
    $_bd = 'videojuegos_bd';
    $_user = 'root'; // o MEDAC
    $_pass = '';

    try {
        $_conexion = new PDO(
            "mysql:host=$_server;dbname=$_bd;charset=utf8mb4", //Data Source Name
            $_user,
            $_pass
        );
        //DNS
        //usuario
        //contraseña

        /**
         * :: Es el operador de resolucion de ámbito
         *  Se usa para acceder a miembros estaticos de una clase 
         * (métodos, propiedades, constantes)
         * 
         * PDO es una clase y cosas como PDO::ATTR_ERRMODE son constantes de clase
         * que PDO expone para configurar o interpretar comportamientos del objeto
         */

        //Lanzar Excepciones
        $_conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Para que de manera predeterminada extraigamos la info de las querys
        //en formato array asociativo
        $_conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo 'Conectao';
    } catch (PDOException $e) {
        die("Error conexion: <br>Detalles: {$e->getMessage()}");
    }
?>