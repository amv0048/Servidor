<?php 

function comparador($a, $b, $c){
    if ($a === $b && $a === $c) 
        echo "Los tres numeros son iguales";
    else if ($a === $b || $b === $c || $a === $c) 
        echo "Al menos 2 son iguales";
    else echo "Ningun numero es igual";
}

comparador(1,0,1);
?>