<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Calculadora de IRPF</h2>
        <label for="n">Introduce tu Salario: </label>
        <input type="text" name="n">
        <input type="submit" value="Enviar">
    </form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $salario = $_POST["n"];
        $salario = floatval($salario);
        if ($salario < 0) {
            echo "Mete un positivo my G";
            return;
        }

        $tramos = [
            [0, 12450, 0.19],
            [12451, 20200, 0.24],
            [20201, 35200, 0.30],
            [35201, 60000, 0.37],
            [60001, 300000, 0.45],
            [300001, INF, 0.47]
        ];

        $numTramos = 0;
        $aRestar = 0;

        for ($i = 0; $i < count($tramos); $i++) {
            $inicio = $tramos[$i][0];
            $fin = max($tramos[$i]);
            $tasa = $tramos[$i][2];

            if ($salario > $inicio) {
                $aRestar += (min($salario, $fin) - $inicio) * $tasa;
                $numTramos++;
            }
        }

        echo "Total a pagar: " . $salario-$aRestar;
    }
?>
</body>
</html>