<?php 

    function calculadora($operacion,$a, $b){
        $result = match ($operacion){
            ("suma") => "La suma de: $a y $b es : ". ($a + $b),
            ("resta") => "La resta de: $a y $b es : ". ($a - $b),
            ("multiplicacion") => "La multiplicacion de: $a y $b es : ". ($a * $b),
            ("division") => "La division de: $a y $b es : ". ($a / $b),
            ("modulo") => "El modulo de: $a y $b es : ". ($a % $b),
            default => "ERROR"
        };
        return $result."<br>";
    }

    function numR(){
        $op = rand(1,5);
        switch ($op){
            case 1:
                $op = "suma";
                break;
            case 2:
                $op = "resta";
                break;
            case 3:
                $op = "multiplicacion";
                break;
            case 4:
                $op = "division";
                break;
            case 5:
                $op = "modulo";
                break;
        }
        return $op;
    }
    


   echo calculadora(numR(),rand(1,50),rand(1,50));


?>