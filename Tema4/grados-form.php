<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="grados-form.php" method="POST">
        <label for="n">Introduce un numero: </label>
        <input type="number" name="n">
        <select name="unidad">
            <option value="C">ºC</option>
            <option value="K">Kelvin</option>
            <option value="F">ºF</option>
        </select>
        <p>A convertir en: </p>
        <select name="unidadF">
            <option value="C">ºC</option>
            <option value="K">Kelvin</option>
            <option value="F">ºF</option>
        </select>
        <input type="submit" value="send">
    </form>

    <?php

use function PHPSTORM_META\type;

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $original = $_POST["n"];
            $type = $_POST["unidad"];
            $convert = $_POST["unidadF"];
            echo "SEND: ". $original." ".$convert."<br>";
            if ($type !== $convert){
                if ($type == "C"){
                    if ($convert == "F")
                        $original *= 33.8;
                    else
                        $original *= 274.15;
                }
                else if ($type == "F"){
                    if ($convert == "C")
                        $original *= -17.22;
                    else
                        $original *= 255.928;
                }
                else{
                    if ($convert == "C")
                        $original *= -272.15;
                    else
                        $original *= -457.87;
                }
            }
            echo "CHANGED: ".$original." ".$convert;
        }
    ?>
</body>
</html>