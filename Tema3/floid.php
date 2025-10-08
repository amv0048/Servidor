<?php 
    function floid($n){
        echo "<pre>";
        $cont = 1;
        for ($i = 1; $i <= $n; $i++){
            for($j = 1; $j <= $i; $j++){
                echo $cont." ";
                $cont++;
                if ($j == $cont) echo $cont*$i;
            }
            echo "\n";
        }
        echo "</pre>";
    }
    floid(5);



    function floid2($n){
        echo "<pre>";
        $cont = 0;
        for ($i = 1; $i <= $n; $i++) {
            for ($j = $i; $j <= $n; $j++){
                echo "  ";
            }
            for ($k = 1; $k <= $i; $k++) {
                
                echo " $cont ";
                $cont++;
                echo " ";

            }
            echo "\n";
        }

        echo "</pre>";
    }
    //floid2(5);


    //Floid con primos por linea 
    //y despues piramide invertida

    function esPrimo($num){
        for ($i = 2; $i <= 12; $i++){
            if (is_float($num / $i)){
                return true;
            } 
        }
    }

    function floidP($n){
        echo "<pre>";
        $cont = 1;
        for ($i = 1; $i <= $n; $i++){
            for($j = 1; $j <= $i; $j++){
                echo $cont." ";
                if (esPrimo($cont) && $j == $cont){
                    echo $cont*$i;
                } 
                $cont++;
            }
            echo "\n";
        }
        echo "</pre>";
    }
?>