<?php 
    function operaciones($a, $b){
        echo"<h4>Operaciones:</h4>
        La suma entre $a y $b es: ". $a + $b.
        "<br> La resta entre $a y $b es: ". $a - $b.
        "<br><b> La multiplicacion entre $a y $b es: ". $a * $b.
        "</b><br><b> La division entre $a y $b es: ". $a / $b.
        "</b><br> La modulo entre $a y $b es: ". $a % $b;
    }
    operaciones(10, 20);
    echo "<br><br><br>";


    function esMayor($a, $b){
        return $a > $b ? "<u>El primero es mayor</u>" : "<b>El segundo es mayor</b>";
    }
    echo esMayor(6,4);
?>