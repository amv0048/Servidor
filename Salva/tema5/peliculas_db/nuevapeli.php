<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <?php 
    error_reporting( E_ALL );
    ini_set("displaty_errors" , 1 );

    if(!isset($_SESSION["usuario"])){
        header("location : index.php");
        exit;
    }

    if(!$_SESSION["admin"]){
        header("location: index.php");
        exit;
    }

    require "sesion/conexion.php";
    session_start();
    
    ?>



</head>
<body>
    





    <div class="container mt-4">
        <h1 class="fs-1 ">Crear una peli</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Titulo</label>
                <input type="text" name="titulo" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Estudio</label>
                <select name="nombre_estudio" class="form-select">
                    <option value="" disabled selected>Elija un estudio</option>
                    <?php 
                    $consulta = "SELECT * FROM peliculas";
                    $resultado = $_conexion -> query($consulta);
                    $nombres = [];
                    while($fila = $resultado -> fetch_assoc()){
                        $nombres [] = $fila["nombre_estudio"];
                    }

                    for ($i=0; $i < count($nombres); $i++) { 
                        ?>

                        <option value=<?php echo "{$nombres[$i]}" ?>> <?php echo "{$nombres[$i]}" ?></option>

                        <?php
                    }
                    
                    ?>
                </select>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>