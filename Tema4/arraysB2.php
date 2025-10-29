<?php 
    $lista = array(
        "Maripepi" => ["Servidor" => 5,
                    "Ingles" => 6,
                    "IP" => 7,
                    "Cliente" => 4,
                    "Ciberseguridad" => 6,
                    "Diseño" => 7],
        "Margarita"=> ["Servidor" => 9,
                    "Ingles" => 10,
                    "IP" => 7,
                    "Cliente" => 10,
                    "Ciberseguridad" => 10,
                    "Diseño" => 9],
        "Cavdevila"=> ["Servidor" => 6,
                    "Ingles" => 8,
                    "IP" => 7,
                    "Cliente" => 5,
                    "Ciberseguridad" => 4,
                    "Diseño" => 9],
    );
?>

<!-- <table border="1" style="text-align: center;">
    <thead>
        <th>Alumno</th>
        <th>Asignatura</th>
        <th>Nota</th>
        <th>Calificaciones</th>
    </thead>
    <?php
    /*
        foreach($lista as $alumno => $asigYNota){
            echo "<tr><td rowspan='7'>$alumno</td></tr>";
            foreach($asigYNota as $asig => $nota){
                echo "<tr>";
                switch($nota){
                    case $nota < 5: 
                        $color = "red";
                        $notaS = "SUSP";
                        break;
                    case $nota < 7:
                        $color = "orange";
                        $notaS = "BN";
                        break;
                    case $nota < 9:
                        $color = "green";
                        $notaS = "NT";
                        break;
                    case $nota > 8:
                        $color = "blue";
                        $notaS = "SB";
                        break;
                }
                echo "<td>$asig</td>";
                echo "<td style='background-color:$color';>$nota</td>";
                echo "<td style='background-color:$color';>$notaS</td>";
                echo "</tr>";
            }
        }
    */?>
</table> -->
<?php
    //EJ-1
    ksort($lista);
    foreach($lista as $alumno => $boletin){
        arsort($lista[$alumno]);
    }


?>

<table border="1" style="text-align: center;">
    <thead>
        <th>Alumno</th>
        <th>Asignatura</th>
        <th>Nota</th>
        <th>Calificaciones</th>
    </thead>
    <?php 
        foreach($lista as $alumno => $asigYNota){
            //EJ-2
            //krsort($asigYNota);

            echo "<tr><td rowspan='7'>$alumno</td></tr>";

            foreach($asigYNota as $asig => $nota){
                echo "<tr>";
                switch($nota){
                    case $nota < 5: 
                        $color = "red";
                        $notaS = "SUSP";
                        break;
                    case $nota < 7:
                        $color = "orange";
                        $notaS = "BN";
                        break;
                    case $nota < 9:
                        $color = "green";
                        $notaS = "NT";
                        break;
                    case $nota > 8:
                        $color = "blue";
                        $notaS = "SB";
                        break;
                }
                echo "<td>$asig</td>";
                echo "<td style='background-color:$color';>$nota</td>";
                echo "<td style='background-color:$color';>$notaS</td>";
                echo "</tr>";
            }
        }
    ?>
</table>