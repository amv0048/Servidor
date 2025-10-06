<?php 

function matrizGraciosa($n){
    echo "<pre>";
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $n; $j++){
            if ($i == $j) echo "*";
            else if ($i + $j % 2 == 0) echo "+";
            else echo "-";
        }
        echo "\n";
    }
    echo "</pre>";
}
matrizGraciosa(5);

?>