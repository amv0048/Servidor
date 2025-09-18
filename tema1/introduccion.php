<?php 
    /* $edad = 4;
    $altura = 1.70;
    echo "La suma de las variables 
    edad y altura es: ". $edad+$altura; */

use function PHPSTORM_META\type;

    $num1 = 10;
    $num2 = 20;

    echo "La suma es: ".$num1+$num2;
    echo "<br>";
    echo "La resta es: ".$num1-$num2;
    echo "<br>";
    echo "La multiplicacion es: ".$num1*$num2;
    echo "<br>";
    echo "La division es: ".$num1/$num2;
    echo "<br><br>";
    

    echo $num1 += $num2;
    $num1 = 10;
    $num2 = 20;
    echo "<br>";
    echo $num1 -= $num2;
    $num1 = 10;
    $num2 = 20;
    echo "<br>";
    echo $num1 *= $num2;
    $num1 = 10;
    $num2 = 20;
    echo "<br>";
    echo $num1 /= $num2;
    $num1 = 10;
    $num2 = 20;
    echo "<br>";
    echo $num1 %= $num2;
    $num1 = 10;
    $num2 = 20;

    $number = 2;
    $float = 2.3121;
    $string = "Hola mundo";
    $nulo = null;
    $boole = true;
    echo "<br><br>";

    echo gettype($number)."<br>";
    echo gettype($float)."<br>";
    echo gettype($string)."<br>";
    echo gettype($nulo)."<br>";
    echo gettype($boole)."<br>";
    

?>