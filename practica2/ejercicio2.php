<?php 
    error_reporting(E_ALL);
    ini_set("display_errors", true);

    $estudiantes = [
        [
            "nombre" => "Ana García",
            "edad" => 20,
            "nota" => 8.5,
            "ciudad" => "Madrid",
            "curso" => "2º DAW"
        ],
        [
            "nombre" => "Carlos Pérez",
            "edad" => 22,
            "nota" => 6.8,
            "ciudad" => "Barcelona",
            "curso" => "2º DAW"
        ],
        [
            "nombre" => "Laura Martínez",
            "edad" => 19,
            "nota" => 9.2,
            "ciudad" => "Valencia",
            "curso" => "1º DAW"
        ],
        [
            "nombre" => "David López",
            "edad" => 21,
            "nota" => 7.5,
            "ciudad" => "Sevilla",
            "curso" => "2º DAW"
        ],
        [
            "nombre" => "Elena Rodríguez",
            "edad" => 20,
            "nota" => 8.9,
            "ciudad" => "Madrid",
            "curso" => "1º DAW"
        ],
        [
            "nombre" => "Miguel Sánchez",
            "edad" => 23,
            "nota" => 5.5,
            "ciudad" => "Barcelona",
            "curso" => "2º DAW"
        ],
        [
            "nombre" => "Sara Fernández",
            "edad" => 19,
            "nota" => 9.8,
            "ciudad" => "Valencia",
            "curso" => "1º DAW"
        ],
        [
            "nombre" => "Javier Gómez",
            "edad" => 22,
            "nota" => 7.2,
            "ciudad" => "Madrid",
            "curso" => "2º DAW"
        ]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    <form action="" method="post">
        <h3>Gestión de Estudiantes</h3>
        <label for="form">Acción a realizar: </label>
        <select name="form" id="">
            <option disabled selected>-- Selecciona una opción --</option>
            <option value="nombres_AZ">Ordenar por Nombres (A-Z)</option>
            <option value="ciudad_ZA">Ordenar por Ciudad (Z-A)</option>
            <option value="extract">Extraer Nombres y Notas</option>
            <option value="calcularMedia">Calcular Nota media</option>
        </select>
        <input type="submit" value="Procesar">
    </form>
    <?php 

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if ($_POST["form"] === "nombres_AZ"){

                foreach ($estudiantes as $alumno => $value) {
                    $copia[] = array_values($value);
                    $nombresORD = array_column($copia, 0);
                }
                array_multisort($nombresORD, SORT_ASC, $copia);

                echo "<table width='100%' cellpading='15'border='2'>";
                echo "<tr>";
                    echo "<td>Nombre</td>";
                    echo "<td>Edad</td>";
                    echo "<td>Nota</td>";
                    echo "<td>Ciudad</td>";
                    echo "<td>Curso</td>";
                echo "</tr>";

                foreach ($copia as $num => $value) {
                    echo "<tr>";
                    foreach ($value as $dato) {
                        echo "<td>".$dato."</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($_POST["form"] === "ciudad_ZA"){

                foreach ($estudiantes as $alumno => $value) {
                    $copia[] = array_values($value);
                    $ciudadORD = array_column($copia, 3);
                }

                array_multisort($ciudadORD, SORT_DESC, $copia);

                echo "<table width='100%' cellpading='15'border='2'>";
                echo "<tr>";
                    echo "<td>Nombre</td>";
                    echo "<td>Edad</td>";
                    echo "<td>Nota</td>";
                    echo "<td>Ciudad</td>";
                    echo "<td>Curso</td>";
                echo "</tr>";

                foreach ($copia as $num => $value) {
                    echo "<tr>";
                    foreach ($value as $dato) {
                        echo "<td>".$dato."</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            else if($_POST["form"] === "extract"){
                foreach ($estudiantes as $alumno => $value) {
                    $copia[] = array_values($value);
                    $nombres = array_column($copia, 0);
                    $notas = array_column($copia, 2);
                }

                echo "<ul>";
                for($i = 0; $i < count($estudiantes); $i++) {
                    echo "<li>".$nombres[$i]." - ".$notas[$i]."</li>";
                }
                echo "</ul>";
            }
            else{

                foreach ($estudiantes as $alumno => $value) {
                    $copia[] = array_values($value);
                    $notas = array_column($copia, 2);
                }

                echo "<table width='100%' cellpading='15'border='2'>";
                    echo "<tr>";
                        echo "<td>Nombre</td>";
                        echo "<td>Edad</td>";
                        echo "<td>Nota</td>";
                        echo "<td>Ciudad</td>";
                        echo "<td>Curso</td>";
                    echo "</tr>";

                foreach ($estudiantes as $num => $value) {
                    echo "<tr>";
                    foreach ($value as $dato) {
                        echo "<td>".$dato."</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";

                $suma = 0;
                foreach ($notas as $nota) {
                    $suma += $nota;
                }
                echo "Nota media: ". ($suma/count($notas));
            }
        }
    ?>
</body>
</html>