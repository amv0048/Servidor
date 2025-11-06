<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        function suma($n1,$n2){
            return $n1+$n2;
        }

        $dado1 = rand(1,6);
        $dado2 = rand(1,6);

        $suma = suma($dado1,$dado2);
        if ($suma == 7 ||$suma == 11)
            echo "Ganamos";
        else if ($suma == 2 || $suma == 12)
            echo "Perdemos";
        else echo "PUNTO";
        echo "<br>";
        $cont = 0;
        
        do {
            $cont++;
            $dado1 = rand(1,6);
            $dado2 = rand(1,6);
            $suma = suma($dado1,$dado2);
        } while ($suma != 5 && $suma != 7);

        if ($suma == 5) echo "GANAR";
        else echo "PERDER";
        echo "<br>$cont";
    ?>
</body>
</html>