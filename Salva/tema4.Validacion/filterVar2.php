<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["form"] == "correo"){
        $email = $_POST["correo"];
        $email_sanitizado = filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    ?>


    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["form"] == "cadena"){
        $cadena = $_POST["cadena"];
        $cadena_sanetizada = filter_var($cadena, FILTER_SANITIZE_ENCODED);
    }
    
    ?> 


    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["form"] == "decimal"){
        $decimal = $_POST["decimal"];
        $decimal_sanitizado = filter_var($decimal, FILTER_SANITIZE_NUMBER_FLOAT, 
        FILTER_FLAG_ALLOW_FRACTION);
    }
    ?>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["form"] == "int"){
        $int = $_POST["int"];
        $int_sanetizado = filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    }
    
    ?>


    
    <form action="" method="post">
    <input type="hidden" name="form" value="correo">
    <label for="correo">Introduzca correo</label>
    <input type="text" name="correo">
    <?php 
    if(isset($email, $email_sanitizado)){
        echo "Email original : $email <br>";
        echo "Email Sanitizado: $email_sanitizado <br> ";
    }
    ?>
    <input type="submit" value="ENVIAR CORREO">

    </form>



    <form action="" method="POST">
    <input type="hidden" name="form" value="cadena">
    <label for="cadena">Introduzca una cadena</label>
    <input type="text" name="cadena">
    <?php 
    if(isset($cadena, $cadena_sanetizada)){
        echo "Cadena original : $cadena <br>";
        echo "Cadena Sanitizado: $cadena_sanetizada <br> ";
    }
    ?>
    <input type="submit" value="ENVIAR cadena" >

    </form>

    <form action="" method="POST">
    <input type="hidden" name="form" value="decimal">
    <label for="decimal">Introduzca una decimal</label>
    <input type="text" name="decimal">
    <?php 
    if(isset($decimal, $decimal_sanitizado)){
        echo "Decimal original : $decimal <br>";
        echo "Decimal Sanitizado: $decimal_sanitizado <br> ";
    }
    ?>
    <input type="submit" value="ENVIAR Decimal" >

    </form>


    <form action="" method="POST">
    <input type="hidden" name="form" value="int">
    <label for="int">Introduzca un INT</label>
    <input type="text" name="int">
    <?php 
    if(isset($int, $int_sanetizado)){
        echo "ENTERO original : $int <br>";
        echo "ENTERO Sanitizado: $int_sanetizado <br> ";
    }
    ?>
    <input type="submit" value="ENVIAR ENTERO">

    </form>





    
</body>
</html>