<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        $maxPorPagina = 25;
        $pagina = isset($_GET["page"]) ? $_GET["page"] : 1;

        $apiURL = "https://api.jikan.moe/v4/top/manga?". http_build_query([
            "page" => $pagina,
            "limit" => $maxPorPagina
        ]);
        $curl = curl_init(); // Iniciar una sesión cURL. Por qué? Porque cURL requiere de una estructura en memoria para almacenar la información

        //curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $apiURL); // Establecer la URL que vamos a consultar
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado de url en vez de imprimirlo
        $res = curl_exec($curl); // Ejecutar la petición y almacenar la respuesta
        curl_close($curl);

        //var_dump($res);

        // vamos a sacar en una tabla el ranking, el título, titulo en japo, nota, imagen de portada
        $datos = json_decode($res, true);

        $mangas = $datos["data"];

        $paginacion = $datos["pagination"];

    $paginaActual = $paginacion["current_page"] ?? $pagina;
    $ultPagina = $paginacion["last_visible_page"] ?? $pagina;
    $tieneSiguiente = $paginacion["has_next_page"] ?? false;

    // para construir un enlace a la misma página usaremos $_SERVER
    $actual = htmlspecialchars($_SERVER["PHP_SELF"]);

    ?>
    <div>
        <?php
            if($paginaActual > 1){
                echo "<a href='$actual?page=".($paginaActual-1)."'>Ir atrás</a>";
            }       
            echo "Página ".$paginaActual." de ".$ultPagina." (".$maxPorPagina." animes por página)";  
            if($tieneSiguiente){
                echo "<a href='$actual?page=".($paginaActual+1)."'>Siguiente</a>";
            }         
        ?>
    </div> 
    <table border="1px solid black">
        <thead style="text-align: center;">
            <tr>
                <td>Nombre</td>
                <td>Imagen de portada</td>
                <td>Nota</td>
                <td>Numero de volumenes</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($mangas as $manga){
            ?>
            <tr>
                <td width="100px"><?= $manga["title"] ?></td>
                <td>
                    <img src="<?= $manga["images"]["jpg"]["image_url"] ?>" alt="">
                </td>
                <td width="100px" style="text-align: center;"><?= $manga["score"] ?></td>
                <td style="text-align: center;"><?= $manga["volumes"] ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    
    ?>
</body>
</html>