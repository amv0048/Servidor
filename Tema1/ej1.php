<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <h3>Crea un programa que muestre "Hola {aquí tu nombre}" usando 
        una variable donde recojas tu nombre</h3>
    <?php

use Dom\Notation;

        function mostrarNombre($nombre){
            echo "Hola $nombre";
        }
        mostrarNombre("Alvaro");
    ?>
    <h2>Ejercicio 2</h2>
    <h3>Declara dos variables numéricas e imprime su suma, resta, 
        multiplicación, división y módulo (%).
        Además, el mensaje deberá de ser el siguiente: 
        "El resultado de la suma entre {valor variable 1} y 
        {valor variable 2} es: {solucion}"
    </h3>
    <?php 
        $num1 = 20;
        $num2 = 100;

        echo "El resultado de la suma entre $num1 y $num2 es: ".$num1+$num2."<br>";
        echo "El resultado de la resta entre $num1 y $num2 es: ".$num1-$num2."<br>";
        echo "El resultado de la multiplicacion entre $num1 y $num2 es: ".$num1*$num2."<br>";
        echo "El resultado de la division entre $num1 y $num2 es: ".$num1/$num2."<br>";
        echo "El resultado del modulo entre $num1 y $num2 es: ".$num1%$num2."<br>";
    ?>
    <h2>Ejercicio 3</h2>
    <h3>Declara una variable con el valor 5. Imprime su valor antes
        y después de aplicar el incremento y el decremento</h3>
    <?php 
        $num = 5;
        echo $num."<br>";
        $num++;
        echo $num."<br>";
        --$num;
        $num--;
        echo $num."<br>";
    ?>
    <h2>Ejercicio 4</h2>
    <h3>Declara dos variables numéricas y comprueba si: <br>
        1) el primero es mayor que el segundo <br>
        2) ambos son iguales y mayores que 10 <br>
        3) al menos uno es menor que 100
    </h3>
    <?php
        //True sale 1; False no sale nada, seria 0
        $num1 = 5;
        $num2 = 10;
        
        echo "1)".($num1 > $num2 ? "true" : "false")."<br>";
        echo "2)".($num1 == $num2 && $num1 > 10 ? "true" : "false")."<br>";
        echo "3)".($num1 < 100 || $num2 < 100 ? "true" : "false")."<br>";

    ?>
    <h2>Ejercicio 5</h2>
    <h3>Crea una variable fuera de una función e intenta 
        imprimirla dentro de la función sin usar "global". En caso de no conseguirlo, 
        corrige la llamada a la variable.
    </h3>
    <?php 
        $fuera = "Fuera";
        function mostrar(){
            global $fuera;
            echo $fuera;
        }
        mostrar();

    ?>
    <h2>Ejercicio 6</h2>
    <h3>Crea una función con una variable estática llamada "numerito" 
        inicializada a 2.5, la función deberá de multiplicar por dos el 
        valor de la variable estática y mostrarlo en el navegador. 
        ¿Cambia el resultado de la multiplicación si llamamos a la 
        función varias veces?
    </h3>
    <?php 
        function func(){
           static $numerito = 2.5;
           $numerito *= 2;
           echo $numerito."<br>";
        }
        func();
        func();    
    ?>
    <h2>Ejercicio 7</h2>
    <h3>Crea una función con una variable local llamada "numerito2" 
        inicializada a 3.5, la función deberá de dividir por cuatro 
        el valor de la variable local y mostrarlo en el navegador. 
        ¿Cambia el resultado de la división si llamamos 
        a la función varias veces?
    </h3>
    <?php 
        function func2(){
           $numerito2 = 4.5;
           $numerito2 *= 4;
           echo $numerito2;
        }
        func2();
        echo "<br>";
        func2();
    ?>
    <h2>Ejercicio 8</h2>
    <h3>Define una constante llamada PHP con el valor "este 
        lenguaje es precioso". Además, impríme el resultado 
        de la constante dentro de una etiqueta h2
    </h3>
    <?php 
        define("PHP", "Este lenguaje es precioso");
        echo "<h2>".PHP."</h2>";
    ?>

    <h2>Ejercicio 9</h2>
    <h3>Crea variables con un numero entero, un decimal, 
        un número muy grande (haciendo uso de la notación científica), 
        un booleano y un string. Ahora muestra cada variable 
        haciendo uso de la función var_dump()
    </h3>
    <?php 
        $int = 1;
        $flot = 2.6;
        $boo = true;
        $cadena = "Hola mundo";
        $not_cientifica = 2.3e2;
        var_dump($int, $flot, $boo, $cadena, $not_cientifica);
    ?>
    <h2>Ejercicio 10</h2>
    <h3>Declara una variable llamada hobby que contendrá un 
        string con tu pasatiempos favorito,muestra esta cadena 
        dentro de una etiqueta h1 haciendo uso de una etiqueta PHP
        diferente al del resto de ejercicios
    </h3>
    <?php 
        $hobby = "Jiu Jitsu Brasileño";
    ?>
    <h1><?php echo $hobby; ?></h1>
</body>
</html>

