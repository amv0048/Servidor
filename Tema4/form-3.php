<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form-3.php" method="POST">
        <label for="n">Tabla</label>
        <input type="number" name="n">
        <input type="submit" value="send">
    </form>
    <form action="form-3.php" method="GET">
        <label for="n">Tabla</label>
        <input type="number" name="n">
        <input type="submit" value="send">
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $n = $_POST["n"];
            for ($i=1; $i <= $n; $i++) { 
                for ($j=0; $j <= 10; $j++) { 
                    echo $i." * ".$j." = ".($i*$j)."<br>";
                }
            }
        }
        else if($_SERVER["REQUEST_METHOD"] == "GET"){
            $n = $_GET["n"];
            for ($i=1; $i <= $n; $i++) { 
                for ($j=0; $j <= 10; $j++) { 
                    echo $i." * ".$j." => ".($i*$j)."<br>";
                }
            }
        }
    ?>
</body>
</html>