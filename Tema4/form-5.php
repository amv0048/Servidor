<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="num">Introduce un numero: </label>
        <input type="number" name="num">
        <input type="submit" value="Enviar">
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $numeroInputs = $_POST["num"];
            for ($i=0; $i < $numeroInputs; $i++) { 
                echo "<input type='number'"." name='arr'>";

            }
            $lista = [];
            if ($_POST["arr"]){
                
                foreach($_POST["arr"] as $i){
                    $lista[] = $i;
                }
                //print_r($lista);
            }

            
        }
    ?>
</body>
</html>