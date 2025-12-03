<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dni</title>
</head>
<body>
    <?php 
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["errors"] == "Enviar"){
            $cad = "TRWAGMYFPDXBNJZSQVHLCKE";
            $_dni = $_POST["dni"];

            if ($_dni == "") {   
                $dni_error = "Formulario Vacio";
            }
            $_dni = trim($_dni);

            if (!preg_match("/^\d{8}[A-Za-z]$/", $_dni)){
                $dni_error = "Introduce un patron Valido";
                echo $dni_error;
            }
            else{
                $num = preg_replace("/\D/", "", $_dni); 
                $_dni = strtoupper($_dni);
                // Si el patron esta bien no haria falta mirar los huecos
                $_dni = str_replace(" ","", $_dni);
                $num = $num % 23;

                if($_dni[8] == $cad[$num]){
                    $dni = $_dni;
                }
                else{
                    $dni_error = "El dni no es Valido";
                }
            }
        }
    ?>


    <form action="" method="post">
        <label for="dni">Introduce tu dni: </label>
        <input type="text" name="dni">
        <?php if (isset($dni_error)) echo $dni_error; ?>
        <input type="submit" value="Enviar" name="errors">
        <?php 
            if (isset($dni)) echo $dni;
         ?>
    </form>
</body>
</html>