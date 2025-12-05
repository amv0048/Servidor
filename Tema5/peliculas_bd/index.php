<?php 
    session_start();
    // AHora si podemos usar el array $_SESSION
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index PHP</title>
</head>
<body>
    <?php 
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        if (!isset($_SESSION["usuario"])){
            header("location: sesion/login.php");
            echo "<script>alert('donde vas churrita')</script>";
            exit();
        }

    ?>
    <h1>Has iniciado sesion, <?= $_SESSION["usuario"]?></h1>
    <a href="sesion/logout.php"></a>
</body>
</html>