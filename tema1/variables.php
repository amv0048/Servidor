<?php 
/*
    $globalMal = "Fuera";

    function mostrarMal(){
        echo $globalMal;
    }
    
    mostrarMal($globalMal);
*/
    $globalBien = "Fuera 2";

    function mostrarBien(){
        global $globalBien;
        echo $globalBien;
    }

    mostrarBien();
    echo "<br>";

    function contador(){
        static $local = 10;
        $local++;
        echo $local."<br>";
    }

    contador();
    contador();

    


?>