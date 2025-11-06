<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" name="n1">
        <input type="number" name="n2">
        <input type="number" name="n3">
        <input type="number" name="n4">
        <input type="number" name="n5">
        <input type="number" name="n6">
        <input type="submit" value="SEND">
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = [];
            for ($i=1; $i <= 6; $i++) { 
                array_push($user, $_POST["n$i"]);
            }
            sort($user);
            
            $premio = [];
            $numInt = 0;
            /* do {
                $numInt++;
                do {
                    $repetido = false;
                    for ($i = 0; $i < 6; $i++) {
                        $n = rand(1,20);
                        $flag = false;
                        print_r($premio);
                        for ($i=0; $i < count($premio); $i++) { 
                            if ($premio[$i] == $n)
                                $flag = true;
                        }
                        if (!$flag)
                            array_push($premio, $n);
                        else $repetido = true;
                    }
                } while ($repetido);
                sort($premio);
            } while ($premio != $user);
            echo $numInt; 
            
            
            
            
            */
            
        }

    ?>
</body>
</html>