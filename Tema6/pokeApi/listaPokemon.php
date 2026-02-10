<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $offset = $_GET["offset"] ?? 20;
        $maxPorPagina = $_GET["limit"] ?? 20;

        $apiURL = "https://pokeapi.co/api/v2/pokemon?". http_build_query([
            "offset" => $offset,
            "limit" => $maxPorPagina
        ]);

        $curl = curl_init(); // Iniciar una sesión cURL. Por qué? Porque cURL requiere de una estructura en memoria para almacenar la información
        curl_setopt($curl, CURLOPT_URL, $apiURL); // Establecer la URL que vamos a consultar
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado de url en vez de imprimirlo
        $res = curl_exec($curl); // Ejecutar la petición y almacenar la respuesta
        curl_close($curl);
        
        $datos = json_decode($res, true);
        //var_dump($datos);
        $pokemons = $datos["results"];

        $actual = htmlspecialchars($_SERVER["PHP_SELF"]);
    ?>


    <div>
        <?php
            if($datos["next"] != null){
                echo "<a href='$actual?offset=".($offset + 20)."&limit=20'>Siguiente</a>";
                echo "<br>";
                echo "<a href='$actual?offset=".$offset."&limit=".(2)."'>Cambiar Limite</a>";
            }
            echo "<br>";
            if($datos["previous"] != null){
                echo "<a href='$actual?offset=".($offset - 20)."&limit=20'>Ir a atras</a>";
            }
        ?>
    </div>
    <div>
        <?php 
            foreach($pokemons as $pokemon){
        ?>
            <h2><?= $pokemon["name"]?></h2>
        <?php 
            $apiPokemon = $pokemon["url"];

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiPokemon);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($curl);
            curl_close($curl);
            $datosPokemon = json_decode($res, true);
        ?>
            <div>
                <h4>Habilidades: </h4>
        <?php 
            foreach($datosPokemon["abilities"] as $ability){
        ?>
                <p>
                    - <?= $ability["ability"]["name"]?>
                </p>
                <?php 
            }
            ?>
            </div>
            
            <div>
                <h4>Formas: </h4>
        <?php 
            
            foreach($datosPokemon["forms"] as $form){
        ?>
                <p>
                    - <?= $form["name"]?>
                </p>
                
                <div>
                    Height: 
                    <p><?= $datosPokemon["height"] ?></p>
                </div>
        <?php
            }
        }
        ?>
        </div>
    </div>


        
</body>
</html>