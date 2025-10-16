<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
        }
        th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php 
        $alumnos = rand(15,25);
        $media = 0;
        $i = 0;
        $alumnosR = 0;
        echo "<table>";
        echo "<th colspan='2'>Alumnos </th>";
        echo "<th colspan='2'>Notas </th>";
        echo "<tr></tr>";
        do{
            $nota = rand(1,20);
            if ($nota <= 10){
                $media += $nota;
                $alumnosR++;
            }
            echo "<tr><th colspan='2'>Alumno $i </th>";
            $n = match(true){
               ($nota > 8 && $nota <= 10) => $nota ." Sobresaliente",
               ($nota > 0 && $nota < 5) => $nota ." Suspenso",
               ($nota > 4 && $nota < 7) => $nota ." Aprobado",
               ($nota > 6 && $nota < 9) => $nota ." Notable",
               default => "Nota no disponible"
            };
            echo "<th colspan='2'> $n</th></tr>";
            $i++;
        }while($i < $alumnos);
            echo "<tfoot><tr><td colspan='2'>La media de la clase es de: ".round($media/$alumnosR)."</td></tr></tfoot>";
        echo "</table>";
    ?>
</body>
</html>