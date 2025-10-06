<?php

    //Formas de hacer un if
    $a = 3;
    //1
    if ($a > 0){
        echo "<p>EL numero es positivo</p>";
    }
      
    //2
    if ($a > 0) echo "<p>EL numero es positivo</p>";

    //3
    if ($a > 0):
        echo "<p>EL numero es positivo</p>";
    endif;

    // if-else
    $b = -3;
    //1
    if ($b < 0){
        echo "<p>EL numero es negativo</p>";
    }
    else echo "<p>EL numero es positivo</p>";

    //2
    if ($b > 0) {
        echo "<p>EL numero es positivo</p>";
    }
    elseif($b == 0){
        echo "<p>EL numero es 0</p>";
    }
    else echo "<p>EL numero es negativo</p>";
    ?>


<h3>Declara dos variables numéricas y comprueba si: <br>
    1) el primero es mayor que el segundo <br>
    2) ambos son iguales y mayores que 10 <br>
    3) al menos uno es menor que 100
</h3>
<?php
    //True sale 1; False no sale nada, seria 0
    $num1 = 5;
    $num2 = 5;

    switch (true) {
        case ($num1 > $num2):
            echo "$num1 es mayor que $num2 ($num1, $num2)";
            break;
        case ($num1 == $num2 && $num1 > 10):
            echo "Ambos son iguales y mayores que 10 ($num1, $num2)";
            break;
        case ($num1 < 100 || $num2 < 100):
            echo "Al menos una menor que 100 ($num1, $num2)";
            break;
        default:
            echo "No se ha registrado";
    }



?>
