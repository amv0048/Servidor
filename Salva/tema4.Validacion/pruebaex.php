<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border: 1px solid black;
        }

        tr, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>


    <?php 
    $pelis = [
        "Shrek" => ["genero" => "niños", "precio_dia" => 3.2, "duracion" => 180 ],
        "LOTR" => ["genero" => "chads", "precio_dia" => 7.7, "duracion" => 3000 ],
    ];
    
    
    ?> 


    <form action="" method="POST">

        <label for="shrek">Shrek: </label>
        <input type="number" name="shrek"><br>
        <label for="lotr">LOTR: </label>
        <input type="number" name="lotr"><br>
        <input type="submit" value="ENVIAR"><br>

    </form>


    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $incluir = [
            "Shrek" => $_POST["shrek"],
            "LOTR" => $_POST["lotr"]
        ];
        
    }
    
     
    ?>


    <table>
        <tr>
            <td>PELICULA</td>
            <td>GENERO</td>
            <td>PRECIO POR DIA</td>
            <td>DURACION</td>
            <td>DIAS</td>
            <td>SUBTOTAL</td>
        </tr>


    <?php 
    foreach ($pelis as $nombre => $datos) {
        if ($incluir[$nombre] > 0){
             echo "<tr>";
             echo "<td> $nombre  </td>";
            foreach ($datos as $dato => $valor) {
                echo "<td> $valor </td>";
            }
            echo "<td>". $incluir[$nombre] ."</td>";
            echo "<td>". ($incluir[$nombre]*$datos["precio_dia"]) ."</td>";

             echo "</tr>";
        }


    }
    
    
    
    
    ?>
    </table>



    
</body>
</html>