<?php 

   //EJERCICIO 1: Mostrar los números pares del 1 al 100
    //EJERCICIO 2: Dado un número guardado en una variable, mostrar la tabla de multiplicar de dicho número con el siguiente formato
        //      num x 1 = ..
        //      num x 2 = ..
    //EJERCICIO 3: Muestra los múltiplos de 3 y 5 entre el 1 y el 100.

    //EJERCICIO 4: declara una variable llamada suma que sea igual a cero y suma todos los números del 1 al 100 creando una suma acumulada.
    //EJERCICIO 5: declara una función con un argumento, dicho argumento servirá para indicar el factorial de qué numero se calculará
    //EJERCICIO 6: haz la suma acumulada de todos los número pares e imprímela por pantalla. También deberá de aparecer la suma acumulada de los impares
    //EJERCICIO 7: Empezando por el número 100, recorre hacia abajo todos los número hasta encontrar el primer múltiplo de 12. Deberá
        // de aparecer por pantalla el primer múltiplo encontrado y a cuantas posiciones estaba del número 100.


    function cuadradoHueco($n){
        echo "<pre>";
        for ($i=0; $i < $n; $i++) {
            for ($j=0; $j < $n ; $j++) { 
                if ($i == 0 || $i == $n-1
                || $j == 0 || $j == $n-1)
                    echo "*";
                else echo " ";   
            }
            echo "\n";
        }

        echo "</pre>";
    }
    //cuadradoHueco(10);


    function divisor($n){
        echo "<pre>";
        for ($i = 1; $i <= $n; $i++){
            for($j = 1; $j <= $n; $j++){
                if ($i == $j)
                    echo "\\";
                else if ($i > $j) echo "- ";
                else echo " +";
            }
            echo "\n";
        }
        echo "</pre>";
    }
    //divisor(4);

    function divisor2($n){
        echo "<pre>";
        $contN = 1;
        $contI = $n;
        for ($i = 1; $i <= $n; $i++){
            for($j = 1; $j <= $n; $j++){
                if ($i == $j)
                    echo "\\";
                else if ($i == $contN && $j == $contI){
                    echo "/";
                }
                else echo " ";
            }
            $contN++;
            $contI--;
            echo "\n";
        }
        echo "</pre>";
    }
    //divisor2(10);

    function matrizPorSectores($n){
        echo "<pre>";
        $contN = 1;
        $contI = $n;
        for ($i = 1; $i <= $n; $i++){
            for($j = 1; $j <= $n; $j++){
                if ($n % 2 != 0 && $i == floor($n / 2)+1 && $j == floor($n / 2)+1){
                    echo "X";
                }
               else if ($i == $j) echo "\\";
                //Diagonal inversa
                else if ($i == $contN && $j == $contI) echo "/";
                else if ($i > $j && ($j < $n/2) && ($j + $i <= $n)) echo "*";
                else if ($i < $j  && ($i + $j <= $n) && $i < $n/2) echo "+";
                else if (($i > $j) && ($i + $j >= $n) && $i > $n/2) echo "-";
                else if(($j > $i) && ($i > 1 && $i < $n) && $j + $i >= $n) echo "%";
                else echo " ";

            }
            $contN++;
            $contI--;
            echo "\n";
        }
        echo "</pre>";
    }
<<<<<<< HEAD
    matrizPorSectores(5);
=======
    //matrizPorSectores(5);

    
>>>>>>> cf91e3c (actualizar)
?>