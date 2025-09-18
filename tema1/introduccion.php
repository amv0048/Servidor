<?php 
    /* $edad = 4;
    $altura = 1.70;
    echo "La suma de las variables 
    edad y altura es: ". $edad+$altura; */

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
    echo gettype($boole)."<br><br><br>";

    $caso1 = $num1 < $num2 && 10 != 11;
    echo "Caso 1: ".$caso1."<br>";

    $num1 = 1;
    $num2 = "1";
    $caso1 = $num1 === $num2;
    echo "Caso 2: ".$caso1."<br>";

    echo "Es mayor 14 que 10? ".(14>10)."<br>";


    echo "Es 21 igual a 13 y es 14 menor o igual que 20? ".
    (21 === 13 && 14 <= 20)."<br>";

    echo "Es 14 mayor o igual a 2 o es 21 menor que 20? ".
    (14 >= 2 || 21 < 20)."<br><br><br>";

    //Declarar una constante
    define("PI", 3.1459);
    echo PI."<br>";

    // De X a String strval()
    $numerito = 1;
    echo "Numero entero: ";
    var_dump($numerito);
    echo "<br>";

    var_dump(strval($numerito));
    echo "<br>";
    echo "<br>";
    $cadena = "12";
    var_dump($cadena);
    var_dump(intval($cadena));

    
?>