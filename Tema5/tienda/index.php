<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <?php 
        error_reporting(E_ALL);
        ini_set("display errors", 1);
        if (!isset($_SESSION['user'])){
            header('Location: sesion/login.php');
            exit();
        }
    ?>
</head>
<body>
    <?php 
        if ($_SESSION["admin"]){
    ?>
        <div class="container text-center mt-5">
            <h1>Zona admins, bienvenid@ <?= $_SESSION['user'] ?></h1>
            <p class="mt-5">Elija una de las operaciones:</p>
            <div class=" d-grid col-7 mx-auto mt-4 gap-3">
                <a href="" class="btn btn-secondary btn-admin">Añadir Productos Electronicos</a>
                <a href="" class="btn btn-secondary btn-admin">Añadir Productos Hogar</a>
                <a href="" class="btn btn-secondary btn-admin">Añadir Productos Ropa</a>
     
                <a href="lista_electronicos.php" class="btn btn-primary">Ir a Productos Electronicos</a>
                <a href="lista_hogar.php" class="btn btn-primary">Ir a Productos Hogar</a>
                <a href="lista_ropa.php" class="btn btn-primary">Ir a Productos Ropa</a>
                <a href="lista_ropa2.php" class="btn btn-primary">Ir a Productos Ropa 2</a>
    
                <a href="sesion/logout.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>

    <?php
        }
        else{
    ?>
         <div class="container text-center mt-5">
            <h1>Bienvenid@ <?= $_SESSION['user'] ?></h1>
            <p class="mt-5">Elija una de las operaciones:</p>
            <div class=" d-grid col-4 mx-auto mt-4 ">
                <a href="" class="btn btn-primary">Ir a Productos Electronicos</a>
                <a href="" class="btn btn-primary">Ir a Productos Hogar</a>
                <a href="" class="btn btn-primary">Ir a Productos Ropa</a>
    
                <a href="sesion/logout.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>

    <?php
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>