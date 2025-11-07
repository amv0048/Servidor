<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" 
        && isset($_POST["num"]) && !isset($_POST["arr"])) {

            $numeroInputs = (int)$_POST["num"];
            for ($i = 0; $i < $numeroInputs; $i++) { 
                echo "<input type='number' name='arr[]'><br>";
            }
            echo "<input type='submit' value='Enviar valores'>";
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "POST" 
        && isset($_POST["arr"])) {

            $lista = $_POST["arr"];
            print_r($lista);
        } 
        else {
            echo '<label>Introduce un número: </label>';
            echo '<input type="number" name="num" min="1">';
            echo '<input type="submit" value="Enviar">';
        }
        ?>
    </form>

    
</body>
</html>