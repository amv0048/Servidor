<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <form action="" method="POST">
        <input type="number" name="n">
        <input type="submit" value="SEND">
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $n = $_POST["n"];

            function extraerArray(int $n) : array{
                $res = [];
                while($n > 0){
                    $res[] = $n % 10;
                    $n /= 10;
                    $n = intval($n);
                }
                krsort($res);
                $res = array_values($res);
                return $res;
            }
            print_r(extraerArray($n));
        }
    
    ?>
</body>
</html>