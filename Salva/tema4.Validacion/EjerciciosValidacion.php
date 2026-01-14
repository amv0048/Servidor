<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    ?>
    <style>
        .error{
            color: red;
        }
        .success{
            color: green;
        }
    </style>
</head>
<body>



    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["ej"] == "1"){
            $tmp_script = $_POST["cadena"];
            $tmp_scriptO = $tmp_script;
            if($tmp_script == ""){
                $err_script = "<span class='error'> Introduce algo <span>";
            }else{
                $tmp_script = trim($tmp_script);
                $tmp_script = filter_var($tmp_script, FILTER_SANITIZE_SPECIAL_CHARS);
                if(strlen($tmp_script) < 5 or strlen($tmp_script) > 70){
                    $err_script = "<span class='error'>La longitud no puede ser menor a 5 o mayor a 70<span>";
                }else{
                    $script = $tmp_script;
                }
            }
        }

        if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["ej"] == "2"){
            $tmp_dni = $_POST["dni"];
            $tmp_dniO = $tmp_dni;
            
            if($tmp_dni == ""){
                $err_dni  = "<span class='error'> Introduce algo <span>";
            }else{
                $tmp_dni = strtoupper($tmp_dni);
                $tmp_dni = str_replace(" ","", $tmp_dni);
                if(preg_match("/^\d{8}[A-Z]$/ " , $tmp_dni)){
                    $letra = $tmp_dni[8];
                    //$num = 
                }else{
                    $err_dni = "<span class='error'>El formato no es de DNI<span>";
                }
            }
            


        }
        
        




    ?>



    <form action="" method="POST">
        <input type="hidden" name="ej" value="1">
        <label for="cadena">Escribe una cadena: </label>
        <input type="text" name="cadena">
        <?php 
        if(isset($err_script)) echo $err_script;
        ?>
        <input type="submit" value="Enviar">
        <?php if(isset($script)) echo "<br> Mensaje original: $tmp_scriptO <br> Mensaje sanitizado: $script"; ?>
    </form>

    
    <form action="" method="POST">

        <input type="hidden" name="ej" value="2">
        <label for="dni"> Escribe un Dni valido</label>
        <input type="text" name="dni">
        <input type="submit" value="Enviar">

    </form>

    





    
</body>
</html>