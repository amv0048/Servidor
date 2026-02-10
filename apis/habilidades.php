<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $offset = $_GET["offset"] ?? 0;
        $limit = 30;

        $apiURL = "https://pokeapi.co/api/v2/ability?". http_build_query([
            "offset" => $offset,
            "limit" => $limit
        ]);

        $curl = curl_init(); // Iniciar una sesión cURL. Por qué? Porque cURL requiere de una estructura en memoria para almacenar la información
        curl_setopt($curl, CURLOPT_URL, $apiURL); // Establecer la URL que vamos a consultar
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado de url en vez de imprimirlo
        $res = curl_exec($curl); // Ejecutar la petición y almacenar la respuesta
        curl_close($curl);
        
        $datos = json_decode($res, true);
        //var_dump($datos);
        $abilities = $datos["results"];

        $actual = htmlspecialchars($_SERVER["PHP_SELF"]);
    ?>

    <div>
        <?php
            if($datos["next"] != null){
                echo "<a href='$actual?offset=".($offset + 20)."&limit={$limit}'>Siguiente</a>";
            }
            echo "<br>";
            if($datos["previous"] != null){
                echo "<a href='$actual?offset=".($offset - 20)."&limit={$limit}'>Ir a atras</a>";
            }
        ?>
    </div>
    <ol>
        <?php 
            foreach ($abilities as $ability) {
        ?>
            <div>
                <h4><?= $ability["name"]?></h4>
            <?php 
            $apiPokemon = $ability["url"];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiPokemon);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($curl);
            curl_close($curl);
            $datosAbility = json_decode($res, true);
            ?>    
            <?php 
                foreach ($datosAbility["effect_entries"] as $entrada) {
                    if ($entrada["language"]["name"] == "en"){
                ?>
                    <p><?= $entrada["short_effect"]?></p>
                
                <?php 

                }
            }
            ?>
                <a href="pokemonsConHabilidad.php?nombreH=<?=$ability['name']?>">Ver Pokemon con esa Habilidad</a>
            
            </div>
        <?php 
            }
        
        ?>
    </ol>
</body>
</html>