<?php 
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>

<?php 
    $carton = [];
    $cont = 0;
    for ($i=0; $i < 10; $i++) { 
        $carton[$i] = [];
        for ($j=0; $j < 3; $j++) {
            if ($j == 2){
                do{
                    $carton[$i][$j] = rand(0, 9) + $cont;
                }while(!repetido($carton, $i, $j));
            }
        }
        $cont+=10;
    }

    //var_dump($carton);
    
    function repetido($carton, $i, $j): bool{
        return ($carton[$i][$j] != $carton[$i][$j-1] 
        || $carton[$i][$j] != $carton[$i][$j-2]);
    }


    function mostrar($arr){
        foreach($arr as $fila){
            foreach($fila as $col => $number){
                echo "[".$number."] ";
            }
            echo "<br>";
        }
    }

   mostrar($carton);
?>