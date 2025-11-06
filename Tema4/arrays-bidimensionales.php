<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
        //Nombre, Categoria, Precio
        $videojuegos = [
            ["FIFA 26", "Deportes", 90],
            ["Hollow Knight", "Plataformas", 30],
            ["Dark Souls III", "Soulslike", 20]
        ];

        
        /* foreach($videojuegos as $juego){
            foreach($juego as $elemento){
                echo $elemento." ";
                }
                echo "<br>";
                } 
        */
       /* $nombres = array_column($videojuegos,0);
       echo "<ol>";
       foreach($nombres as $nombre){
        echo "<li>$nombre</li>";
       }
       echo "</ol>"; */
    ?>

    <?php 
       
        //Nombre, Categoria, Precio
        $videojuegos = [
            ["FIFA 26", "Deportes", 90],
            ["Hollow Knight", "Plataformas", 30],
            ["Dark Souls III", "Soulslike", 20]
        ];

       //array_column almacena en una variable una columna de un array
       $categoria = array_column($videojuegos, 1);
       $precio = array_column($videojuegos, 2);
       //array_multisort permite ordenar las columnas de forma independiente
       array_multisort(
        $_categoria, SORT_ASC,
        $_precio, SORT_ASC,
        $videojuegos);

        /**
         * 1: Ordenar por el precio de barato a caro
         * 2: Ordenar por categoria en orden alfabetico inverso
         * 3: Ordenar por categoria y si son iguales ordena por precio desc
         */
    ?>

    <h1>EJ1</h1>
    <table border="1">
        <thead>
            <td>Nombre</td>
            <td>Categoria</td>
            <td>Precio</td>
        </thead>
        <?php 

            $_precio = array_column($videojuegos, 2);
            array_multisort($_precio, SORT_ASC,
                $videojuegos);
            foreach($videojuegos as $juego){
                echo "<tr>";
                foreach($juego as $campo){
                    echo "<td>".$campo."</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

    <h1>EJ2</h1>
    <table border="1" style="margin-top: 20px;">
        <thead>
            <td>Nombre</td>
            <td>Categoria</td>
            <td>Precio</td>
        </thead>
        <?php 

            $videojuegos[] = ["Dark Souls I", "Soulslike", 300];

            $_categoria = array_column($videojuegos, 1);
            $_precio = array_column($videojuegos, 2);
            array_multisort($_categoria, SORT_DESC,
                $_precio, SORT_DESC,
                $videojuegos);
            foreach($videojuegos as $juego){
                echo "<tr>";
                foreach($juego as $campo){
                    echo "<td>".$campo."</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

    <h1>EJ3</h1>
    <table border="1" style="margin-top: 20px;">
        <thead>
            <td>Nombre</td>
            <td>Categoria</td>
            <td>Precio</td>
        </thead>
        <?php
            $_categoria = array_column($videojuegos, 1);
            array_multisort($_categoria, SORT_DESC,
                $videojuegos);
            foreach($videojuegos as $juego){
                echo "<tr>";
                foreach($juego as $campo){
                    echo "<td>".$campo."</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>


