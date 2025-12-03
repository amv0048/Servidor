<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 

/*
    El php de errores va arriba porque se crea antes del form
    Poner nombre al submit para comprobar errores.
    
    - htmlspecialchars($variable)
    - filter_var($variable, FILTER_SANITIZE_SPECIAL_CHARS)

     * 1- Ver si esta vacio
     * 2- Trim()
     * 3- Sanitizar
     * 4- Comprobar reglas/formato
*/ 
?>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["errors"] == "Enviar"){
            $commentO = $_POST["comment"];
            $tmp_comment = $_POST["comment"];
            if ($tmp_comment == ""){
                $err_comment = "Introduzca un mensaje";
            }
            else{
                $tmp_comment = trim(filter_var($tmp_comment, FILTER_SANITIZE_SPECIAL_CHARS));
                if (strlen($tmp_comment) > 70 || strlen($tmp_comment) < 5) 
                    $err_comment = "Longitud Invalida, 5 a 70 caracteres";
                else{
                    $comment = $tmp_comment;
                }
            }
        }
    ?>

    <form action="" method="post">
        <label for="comment">Introduce un comentario</label>
        <input type="text" name="comment">
        <?php  
            if (isset($tmp_comment)) echo $err_comment;
        ?>
        <input type="submit" name="errors" value="Enviar">
        <?php 
            if (isset($comment)){
                echo "Mensaje original: $commentO<br>";
                echo "Mensaje sanitizado $comment<br>";
                echo "Numero de caracteres ".strlen($comment);
            } 
        ?>
    </form>
<?php 

?>
</body>
</html>
