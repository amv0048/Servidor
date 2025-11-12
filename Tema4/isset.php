<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="name">Nombre: </label>
        <input type="text" name="name"><br>

        <label for="edad">Edad: </label>
        <input type="number" name="edad"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            var_dump($_POST);
            if (isset($_POST["name"])){
                echo $_POST["name"];
            }
            else echo "Nombre vacio";
        }
    ?>
</body>
</html>