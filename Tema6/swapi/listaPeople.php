<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
    ?>
</head>
<body>
    <h1>Primeros 20 personajes</h1>
    <!--
    Mostrar por pantalla:
        - Nombre
        - Altura
        - Peso
        - Genero
        La info de cada personaje estará dentro de un contenedor
    -->
    <?php

    ?>

    <?php
        for ($i=1; $i <= 1 ; $i++) {

            $apiURL = "https://swapi.info/api/people/$i";

            $curl = curl_init(); 

            curl_setopt($curl, CURLOPT_URL, $apiURL); // Establecer la URL que vamos a consultar
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado de url en vez de imprimirlo
            $res = curl_exec($curl); // Ejecutar la petición y almacenar la respuesta
            curl_close($curl);

            $datos = json_decode($res, true);
        ?>
        <div border="2px solid black">
        <?= "<h1>Nombre: ".$datos["name"]."</h1>" ?>
        <ul>
        <?= "<li>Altura: ".$datos["height"]."</li>" ?>
        <?= "<li>Peso: ".$datos["mass"]."</li>" ?>
        <?= "<li>Genero: ".$datos["gender"]."</li>" ?>
        </ul>    
        <h3>Nombre del planeta natal</h3>
        <?php
            $apiURLplaneta = $datos["homeworld"];

            $curl = curl_init(); 

            curl_setopt($curl, CURLOPT_URL, $apiURLplaneta); // Establecer la URL que vamos a consultar
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado de url en vez de imprimirlo
            $res = curl_exec($curl); // Ejecutar la petición y almacenar la respuesta
            curl_close($curl);

            $datosPlaneta = json_decode($res, true);
            echo "<p>".$datosPlaneta["name"]."</p>";


        ?>
        <h4>Peliculas: </h4>
        <?php 
        $pelis = $datos["films"];
            foreach($peli as $pelis){
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $peli);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($curl);
                $datosfilms = json_decode($res, true);
        ?>
                <ul>
                    <li>Nombre Pelicula: <?= $peli["title"] ?></li>
                </ul>
        <?php    
            }
            foreach($naves as $datos["starship"]){
                $apiURLPelis = "https://swapi.info/api/starships/$naves";
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $apiURLPelis);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($curl);

                $datosfilms = json_decode($res, true);

            }


        ?>
        <?php } ?>
    </div>
</body>
</html>