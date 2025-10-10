<?php

function numeroSecreto($num){;
    $cont = 0;
    do {
        $rand = rand(1,20);
        $cont++;
    } while ($num != $rand);
    echo $cont;
}

//numeroSecreto(9);
function multiplos($num){
    echo "<ol>";
    $i = 1;
    do{
        echo "<li>".$i * $num."</li>";
        $i++;
    }while($i <= 20);
    echo "</ol>";
}

//multiplos(7);
$num = 7;
$i = 1;
?>
<ol>
    <?php 
    /*
    do{
        echo "<li>".$i * $num."</li>";
        $i++;
    }while($i <= 20);
    */
    ?>
</ol>

<?php
    /*
    $cont = 0;
    $numero = rand(300,1000);
    echo $numero."<br>";
    while ($numero > 1){
        $numero /= 10;
        $cont++;
    }
    echo $numero .":  ".$cont;
    */
/* 
    function exponente($base, $exp){
        $tmp = $base;
        while($exp > 1){
            $base *= $tmp;
            $exp--;
        }
        return $base;
    }
    echo pow(7,5)."<br>";
    echo exponente(7,5); */


    function tabla(){
        $i = 1;
        $cum = 0;
        echo "<table>";
        do{
            $num = rand(1,10); 
            echo "<th colspan='2'>Intento: ". $i."</th>";
            $i++;
            $cum += $num;
            echo "<tr><td>Num: ".$num."</td><td>Acum: ".$cum."</tr></td>";
        }while($cum <= 100);
        echo "</table>";
    }
    tabla();
?>

<style>
    table{
        border-collapse: collapse;
        text-align: center;
        border: 2px solid black;
    }
    th{
        border: 2px solid black;
        
    }
    td{
        border: 2px solid black;
    }
</style>

