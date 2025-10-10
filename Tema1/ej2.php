<?php 
    function operaciones($a, $b){
        echo "<h4>Operaciones:</h4>".
        "La suma entre $a y $b es: ". ($a + $b).
        "<br><b> La multiplicacion entre $a y $b es: ". ($a * $b);
        
        if ($a > $b){
            echo "<br> La resta entre $a y $b es: ". ($a - $b).
            "</b><br><b> La division entre $a y $b es: ". ($b / $a).
            "</b><br> El modulo entre $a y $b es: ". ($a % $b);
        }
        else if ($a < $b){
            echo "<br> La resta entre $b y $a es: ". ($b - $a).
            "</b><br><b> La division entre $a y $b es: ". ($a / $b).
            "</b><br> El modulo entre $a y $b es: ". ($b % $a);
        }
        else {
            echo "<br> La resta entre $a y $b es: ". ($a - $b).
            "</b><br><b> La division entre $a y $b es: 1".
            "</b><br> El modulo entre $a y $b es: 1";
        }
    }
    //operaciones(rand(1,10), rand(1,10));
    echo "<br><br><br>";


   


    function operaciones2($a, $b){
        echo "<h4>Operaciones:</h4>".
        "La suma entre $a y $b es: ". ($a + $b).
        "<br><b> La multiplicacion entre $a y $b es: ". ($a * $b);
        switch (true){
            case ($a > $b):
                echo "<br> La resta entre $a y $b es: ". ($a - $b).
                "</b><br><b> La division entre $a y $b es: ". ($b / $a).
                "</b><br> El modulo entre $a y $b es: ". ($a % $b);
                break;
            case ($a < $b):
                echo "<br> La resta entre $b y $a es: ". ($b - $a).
                "</b><br><b> La division entre $a y $b es: ". ($a / $b).
                "</b><br> El modulo entre $a y $b es: ". ($b % $a);
                break;
            case ($a == $b):
                echo "<br> La resta entre $a y $b es: ". ($a - $b).
                "</b><br><b> La division entre $a y $b es: 1".
                "</b><br> El modulo entre $a y $b es: 1";
            break;
        }
    }
    //operaciones2(rand(1,10), rand(1,10));
    mysqli_connect();

    function esMayor($a, $b){
        if ($a === $b) echo "Son iguales";
        else if($a > $b) echo "<u>El numero: $a es mayor que $b</u>";
        else echo "<b>El numero: $b es mayor que $a</b>";
    }
    esMayor(rand(1,10),rand(1,10));
    
    echo "<br><br>";

    function esPar($num){
       if ($num == 0) echo 0;
       else if ($num % 2 == 0) echo "El numero: $num es Par" ;
       else echo "El numero: $num es impar";
    }
    esPar(rand(0,10));

    function enRango($n, $min, $max){
        if ($min > $max) return "Error";
        else{
            if ($n >= $min && $n <= $max){
                $mid = ($max - $min) / 2;

                if ($n > $mid){
                   echo  $n != $max ? "$n esta en el Rango superior [$min,$max]" 
                   : "$n es el Maximo [$min,$max]";
                } 

                else if ($n < $mid){
                    echo  $n != $min ? "$n esta en el Rango Inferior [$min,$max]" 
                    : "$n es el Minimo [$min,$max]";
                }
                else echo "$n Esta en el medio de $min Y $max";
            }
        }
    }
    echo "<br><br>";
    enRango(12, 0 ,30);
    echo "<br><br>";

    function esMultiplo($a, $b){
        if ($a >= $b) echo $a % $b == 0 ? "[$a, $b] Son Multiplos" 
        : "No son multiplos";
        else echo $b % $a == 0 ? "[$a, $b] Son Multiplos" 
        : "No son multiplos";
    }
    esMultiplo(2,4);
?>