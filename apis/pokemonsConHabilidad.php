<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $name = $_GET["nombreH"];
        $offset = $_GET["offset"] ?? 0;
        $limit = 30;

        $apiURL = "https://pokeapi.co/api/v2/ability/$name";
        $curl = curl_init(); // Iniciar una sesión cURL. Por qué? Porque cURL requiere de una estructura en memoria para almacenar la información
        curl_setopt($curl, CURLOPT_URL, $apiURL); // Establecer la URL que vamos a consultar
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado de url en vez de imprimirlo
        $res = curl_exec($curl); // Ejecutar la petición y almacenar la respuesta
        curl_close($curl);
        
        $datosAbility = json_decode($res, true);
        $actual = htmlspecialchars($_SERVER["PHP_SELF"]);
        

        foreach ($datosAbility["effect_entries"] as $entrada) {
            if ($entrada["language"]["name"] == "en"){
        ?>
            <div>
                <h2>
                    <?= $name?>
                </h2>
                <p><?= $entrada["effect"]?></p>
            </div>
        <?php
            }
        }
    ?>
    <div>
        <h2>Pokemon con esta Habilidad: (Primeros 10)</h2>
        <div>
        <?php 
            $apiURL = "https://pokeapi.co/api/v2/pokemon?offset=100&limit=100";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiURL);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($curl);
            curl_close($curl);
            $datosPokemon = json_decode($res, true);
            $pokemons = $datosPokemon["results"];

            //Para controlar que solo sean 10
            $cont = 0;
            $lapislazuli = 100;
            while($cont <= 10){
                foreach ($pokemons as $pokemon) {
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $pokemon["url"]);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $res = curl_exec($curl);
                    curl_close($curl);
                    $infoPokemon = json_decode($res, true);
                   
                    foreach ($infoPokemon["abilities"] as $ability) {
                        if (isset($ability["ability"]["name"]) && $ability["ability"]["name"] == $name){
                                $cont++;
                            ?>
                                <p><?= $pokemon["name"]?></p>
                                <p>Altura: <?=$infoPokemon["height"] ?></p>
                                <p>Altura: <?=$infoPokemon["weight"] ?></p>
                                <a href="movimientos.php?name=<?=$pokemons['name'] ?>">Ver movimientos</a>
                            <?php 
                        }
                    }
                }
                $apiURL = "https://pokeapi.co/api/v2/pokemon?offset=".($lapislazuli+=100)."&limit=100";
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $apiURL);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($curl);
                curl_close($curl);
                $infoPokemon = json_decode($res, true);
            }
            echo $cont;
        ?>
        </div>
    </div>

    
</body>
</html>