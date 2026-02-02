<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        /**
         * CURL, es un recurso que mantiene la confi de la peticion URL:
         * en la url podemos especificar metodos GET/POST, headers, timeouts,
         * si te devuelve las respuestas como string, etc..
         */

        $apiUrl = "https://api.jikan.moe/v4/top/anime";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiUrl); // Establecer que vamos a consultar
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado de url
        $res = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($res, true);
        $animes = $datos["data"];
        
    ?>

    <table>
        <thead>
            <tr>
                <td>Posicion</td>
                <td>Titulo</td>
                <td>Nota</td>
                <td>Imagen</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($anime as $animes){
                ?>    
                <tr>
                    <td><?= $anime["rank"] ?></td>
                    <td><?= $anime["title"] ?></td>
                    <td><?= $anime["score"] ?></td>
                    <td> <img src="<?= $anime['img'] ?>"></td>
                </tr>
            <?php
                }

            ?>
        </tbody>
    </table>
</body>
</html>