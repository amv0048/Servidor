<?php
session_start(); //Recogemos la sesión
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <?php
    if (!isset($_SESSION["usuario"])) { //si no a iniciado sesion
        header("location:index.php");
        exit();
    }
    if ($_SESSION["admin"]) { //SI no es admin
        header("location:index.php");
        exit();
    }
    require "sesion/conexion.php";
    ?>
</head>

<body>
    <?php
    //consulta para sacar nombres y para validar ;)
    $consulta = "SELECT nombre_estudio FROM estudios";
    $resultado = $_conexion->query($consulta);
    $estudios = [];
    while ($fila = $resultado->fetch_all()) {
        $estudios[] = $fila["nombre_estudios"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Sanitizar y recoger datos
        //Recoger
        $titulo = trim($_POST["titulo"]);
        $nombre_estudio = trim($_POST["nombre_estudio"]??"");
        $anno_estreno = trim($_POST["anno_estreno"]);
        $num_temporadas = trim($_POST["num_temporadas"]);
        $duracion = trim($_POST["duracion"]);

        //Sanitizar 
        $errores = false; //suponemos no hay errores
        //titulo
        if ($titulo == ' ') {
            $err_titulo = "<div class='alert alert-danger'>Inserta un titulo</div>";
            $errores = true;
        } else if (strlen($titulo) < 1 || strlen($titulo) > 80) {
            $err_titulo = "<div class='alert alert-danger'>El tamaño del tito pasa los limites</div>";
            $errores = true;
        }
        //nEstudio
        if (!in_array($nombre_estudio,$estudios) ) {
            $err_nEstudios = "<div class='alert alert-danger'>No esta en la bbdd</div>";
            $errores = true;
        }
        //anno estreno
        if ($anno_estreno == ' ') {
            $err_anno = "<div class='alert alert-danger'>Inserta un anno</div>";
            $errores = true;
        } else if ($anno_estreno< 1900 ||$anno_estreno > 2000 ) {
            $err_anno = "<div class='alert alert-danger'>Anno pasa los limites</div>";
            $errores = true;
        }else if(!filter_var($anno_estreno, FILTER_VALIDATE_INT)){
            $err_anno = "<div class='alert alert-danger'>Anno NO ES NUM entero</div>";
            $errores = true;
        }
        //n Temp
        if ($num_temporadas == ' ') {
            $err_temporadas = "<div class='alert alert-danger'>Inserta una temp</div>";
            $errores = true;
        } else if ($num_temporadas< 1 ||$num_temporadas > 90 ) {
            $err_temporadas = "<div class='alert alert-danger'>temp pasa los limites</div>";
            $errores = true;
        }else if(!filter_var($anno_estreno, FILTER_VALIDATE_FLOAT)){
            $err_temporadas = "<div class='alert alert-danger'>temp NO ES NUM entero o decimal</div>";
            $errores = true;
        }
         //Duracion
        if ($duracion == ' ') {
            $err_duracion = "<div class='alert alert-danger'>Inserta una duracion</div>";
            $errores = true;
        } else if ($duracion< 60) {
            $err_duracion = "<div class='alert alert-danger'>duracion pasa los limites</div>";
            $errores = true;
        }else if(!filter_var($duracion, FILTER_VALIDATE_FLOAT)){
            $err_duracion = "<div class='alert alert-danger'>duracion NO ES NUM entero o decimal</div>";
            $errores = true;
        }

        if(!$errores){
            
        }
    }
    ?>
    <div class="container mt-4">
        <h1 class="fs-1">Crear una peli</h1>

        <!-- Formulario para ingresar datos de la nueva peli-->
        <form action="" method="post">
            <!-- Nombre Peli-->
            <div class="mb-3">
                <label class="form-label">Titulo Peli</label>
                <input type="text" name="titulo" class="form-control">
                <?= $err_titulo ?? "" ?>
            </div>
            <!-- Estudio-->
            <div class="mb-3">
                <label class="form-label"> Estudio</label>
                <select name="nombre_estudio" class="form-select">
                    <option value="" disabled selected>--Elije estudio--</option>
                    <?php
                    foreach ($estudios as $estudio) {
                    ?>
                        <option value="<?= $estudio ?>"> <?= $estudio ?></option>
                    <?php

                    }
                    ?>
                </select>
                <?= $err_nEstudios ?? "" ?>

            </div>
            <!-- Año estreno-->
            <div class="mb-3">
                <label class="form-label">Año de estreno</label>
                <input type="text" name="anno_estreno" class="form-control">
                <?= $err_anno ?? "" ?>
            </div>
            <!-- n Entrega-->
            <div class="mb-3">
                <label class="form-label">Numero de entrega</label>
                <input type="text" name="num_temporadas" class="form-control">
                <?= $err_temporadas ?? "" ?>
            </div>
            <!-- Duracion min-->
            <div class="mb-3">
                <label class="form-label">DUracion minutos</label>
                <input type="text" name="duracion" class="form-control">
                <?= $err_duracion ?? "" ?>
            </div>
            <!-- Boton enviar-->
            <div class="mb-3">
                <input type="submit" value="Crear Peli Boludoo" class="btn btn-succes">
            </div>

        </form>
        <!-- Enlace al menu -->
        <a href="index.php" class="btn btn-secundary">Menu Principaaaaaaal</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>