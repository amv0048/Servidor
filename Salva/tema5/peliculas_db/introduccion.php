<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set("display_errors", 1);
    require "sesion/conexion.php";

    ?>
</head>
<body>

    <?php 
        $consulta = "SELECT * FROM peliculas";
        $resultado = $_conexion -> query($consulta);
        /**
         * Aqui guardamos un objeto de mysqli_result, es decir el resultado de la consulta
         * Incluye todas las filas devueltas por el SELECT y mantienen un puntero interno
         * en la siguiente fila por leer.
         */
    
        var_dump($resultado);
    /*
        while($fila = $resultado -> fetch_assoc()){
            echo "<pre>";
            print_r($fila);
            echo "</pre>";
        }
        var_dump($fila);
    */
    
    ?>
        
        <table border="1px">
        
        <?php
        $primera = true;
        while ($fila = $resultado -> fetch_assoc()) {
            if($primera){
                echo "<tr>";
                foreach ($fila as $key => $value) {
                    if($key != "id_pelicula" && $key != "num_temporadas"){
                        echo "<td> $key </td>";
                    } 
                } 
                echo "</tr>";
            }
            $primera = false;
           

            echo "<tr>";
            foreach ($fila as $campo => $value) {
                if($campo != "id_pelicula" && $campo != "num_temporadas"){
                    echo "<td>". $value  ."</td>";
                }
            }
            echo "</tr>";
            
        }        
        ?>
        </table>



        <?php 
        $resultado = $_conexion -> query($consulta); # reseteamos consulta

        echo "<br> <br>";
        ?>

        <table border="1px">

        <thead>
            <?php 
            $fila = $resultado -> fetch_assoc();
            foreach ($fila as $key => $value) {
                if($key != "id_pelicula" && $key != "duracion"){
                    echo "<td> $key </td>";
                } 
            }
            ?> 
        </thead>
        <tbody>
            <?php 
            $resultado = $_conexion -> query($consulta); # reseteamos consulta
            $fila = $resultado -> fetch_all();
            for ($i=0; $i < count($fila); $i++) { 
                if($fila[$i][4] > 2){
                    echo "<tr>";
                    for ($j=0; $j < count($fila[$i]); $j++) { 
                        if($j != 0 && $j != 5){
                            echo "<td>". $fila[$i][$j] ."</td>";
                        }
                    }
                    echo "</tr>";
                }
                
            }
            ?>
        </tbody>



        </table>



    
</body>
</html>