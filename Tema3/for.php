<?php 
    function ej1(){
        for ($i=0; $i <= 10; $i++) { 
            if ($i != 0)
                echo "--".$i;
            else echo $i;
        }
    }
    //ej1();

    function ej2(){
        echo "<pre>";
        for ($i = 0; $i <= 10; $i++){
            for($j = 0; $j <= 10; $j++){
                if ($i == $j)
                    echo "$j\n";
                else echo "     ";
            }
            echo "\n";
        }
        echo "</pre>";
    }
    //ej2();


    function ej3(){
        for($i = 1; $i <= 100; $i++){
            if ($i % 2 == 0) echo "$i<br>";
        }
    }
    //ej3();

    function ej4($num){
        for ($i = 0; $i <= 10; $i++){
            echo "$num * $i = ".($num*$i)."<br>";
        }
    }
?>