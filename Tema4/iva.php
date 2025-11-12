<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["price"])){
                $err_price = "<p>Introduce un precio Válido</p>";
            }
            else if (empty($_POST["iva"]))
                $err_iva = "<p>Introduce una opcion perro</p>";
            else if (intval(($_POST["price"])) <= 0)
                $err_iva = "<p>Introduce un numero positivo</p>";
            else{
                $price = $_POST["price"];
                echo "<p>". $price + ($price * floatval( "0.".$_POST["iva"]))."</p>";
            }
        }
    ?>
<body>
    <form action="" method="POST">
        <label for="price">Precio: </label>
        <input type="number" name="price">
        <?php if (isset($err_price)) echo $err_price;?>
        <select name="iva"> 
            <option disabled selected>Selecciona</option>
            <option value="21">General</option>
            <option value="10">Reducido</option>
            <option value="04">Superreducido</option>
        </select>
        <?php if (isset($err_iva)) echo $err_iva;?>
        <input type="submit" value="Calcular">
    </form>

    
</body>
</html>