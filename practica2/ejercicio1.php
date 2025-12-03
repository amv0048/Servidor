<?php 
    error_reporting(E_ALL);
    ini_set("display_errors", true);

    $productos = [
        [
            "nombre" => "Camiseta",
            "precio" => 15.99,
            "cantidad" => 10
        ],
        [
            "nombre" => "Pantalón",
            "precio" => 29.99,
            "cantidad" => 5
        ],
        [
            "nombre" => "Zapatos",
            "precio" => 49.99,
            "cantidad" => 8
        ],
        [
            "nombre" => "Gorra",
            "precio" => 12.50,
            "cantidad" => 15
        ],
        [
            "nombre" => "Chaqueta",
            "precio" => 59.99,
            "cantidad" => 3
        ]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <form action="" method="post">
        <h3>Inventario de Tienda</h3>
        <label for="form">Formato de visualización: </label>
        <input type="text" name="form" placeholder="tabla, listaO o listaN">
        <input type="submit" value="Mostrar">
        <hr>
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            
            //Introduzco subtotal, calculo cantidad y precio Total
            $subtotal = 0;
            $cantidadT = 0;
            $totales = 0;
            foreach ($productos as $arr => &$product) {
                if ($product["cantidad"] > 0){
                    $subtotal = $product["cantidad"] * $product["precio"];
                    $cantidadT += $product["cantidad"];
                }
                else $subtotal = $product;
                $product["subtotal"] = $subtotal;
                $totales += $product["subtotal"];
            }

            if ($_POST["form"] == "tabla"){
                echo "<table width='100%' cellpading='15'border='2'>";
                    echo "<tr>";
                        echo "<td>Producto</td>";
                        echo "<td>Precio(€)</td>";
                        echo "<td>Cantidad</td>";
                        echo "<td>Subtotal</td>";
                    echo "</tr>";
                foreach ($productos as $arr => $product) {
                    echo "<tr>";
                    foreach ($product as $el ) {
                        echo "<td>$el</td>";
                    }
                    echo "</tr>";
                }
                echo "<td colspan='2'><b>Total</b></td>";
                echo "<td><b>$cantidadT</b></td>";
                echo "<td><b>$totales €</b></td>";
                echo "</table>";
            }
            else if($_POST["form"] == "listaO"){
                echo "<ol>";
                foreach ($productos as $arr => $product) {
                    echo "<li>";
                    foreach ($product as $el => $dato ) {
                        if ($dato == "Camiseta")
                            echo $el . " : " .$dato." - ";
                        else if ($el == "subtotal")
                            echo $el. ": " .$dato."€";
                        else echo $el. ": " .$dato." - ";
                    }
                    echo "</li>";
                }
                echo "</ol>";
                echo "<p><b>Total productos: $cantidadT</b></p>";
                echo "<p><b>Valor total: $totales €</b></p>";
            }
            else{
                echo "<ul>";
                foreach ($productos as $arr => $product) {
                    echo "<li>";
                    foreach ($product as $el => $dato ) {
                        if ($dato == "Camiseta")
                            echo $el . " : " .$dato." - ";
                        else if ($el == "subtotal")
                            echo $el. ": " .$dato."€";
                        else echo $el. ": " .$dato." - ";
                    }
                    echo "</li>";
                }
                echo "</ul>";
                echo "<p><b>Total productos: $cantidadT</b></p>";
                echo "<p><b>Valor total: $totales €</b></p>";
            }
        }
    ?>
</body>
</html>