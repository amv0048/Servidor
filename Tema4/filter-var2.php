<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "cadena"){
        $cadena = $_POST["cadena"];
        $cadena_sanitizada = filter_var($cadena, FILTER_SANITIZE_ENCODED);
    }
?>

<form action="" method="post">
    <input type="hidden" name="form" value="cadena">
    <label for="cadena">Introduzca una cadena:</label>
    <input type="text" name="cadena" id=""><br>
    <?php 
        if (isset($cadena, $cadena_sanitizada)){
            echo "Cadena original: $cadena<br>";
            echo "Cadena sanitizada: $cadena_sanitizada<br>";
        }
    ?>
    <input type="submit" value="Enviar">
</form>
