<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $offset = 30;
        $limit = 30;
        $name = $_GET["name"];
        $apiURL = "https://pokeapi.co/api/v2/pokemon/". $name;

        $curl = curl_init(); // Iniciar una sesión cURL. Por qué? Porque cURL requiere de una estructura en memoria para almacenar la información
        curl_setopt($curl, CURLOPT_URL, $apiURL); // Establecer la URL que vamos a consultar
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado de url en vez de imprimirlo
        $res = curl_exec($curl); // Ejecutar la petición y almacenar la respuesta
        curl_close($curl);
        
        $pokemon = json_decode($res, true);

        
    ?>
    <h2>Movimientos de <?=$name ?></h2>
    <ol>
    <?php
        for ($i=0; $i < 20; $i++) {
            ?> 
            <li><?= $pokemon["moves"][$i]["move"]["name"]?></li>     
        <?php
        }

    ?>
    </ol>
    <a href="habilidades.php">Volver a Habilidades</a>
</body>
</html>