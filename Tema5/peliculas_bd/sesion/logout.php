<?php 
    session_start();
    $_SESSION = [];
    session_destroy();
    header("location: login.php");
    exit();

    /**
     * 1) Recoger la sesion
     * 2) Limpiar array de la sesion
     * 3) Eliminar datos de la sesion del server
     *  Cookie PHPSESSID sigue existiendo en el navegador
     * 4) Redirigimos al cliente al login
     * 5)exit() para cerrar
     */

?>