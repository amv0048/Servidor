<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Método HTTP que vamos a mandar</label>
        <select name="metodo" id="">
            <option value="GET">GET</option>
            <option value="POST">POST</option>
            <option value="PUT">PUT</option>
            <option value="DELETE">DELETE</option>
        </select>
    
    <!-- Este campo solo para si el metodo es GET-->
    <label for="">Ciudad para el GET</label>
    <input type="text" name="ciudad_filtro" id="">
    <small>Si lo dejas vacio este campo se muestran todas</small>
    <br><br><br>

    <!-- (POST/PUT)-->
     <label for="">Nombre</label>
     <input type="text" name="nombre_desarrolladora">

     <label for="">Ciudad</label>
     <input type="text" name="ciudad">

     <label for="">Año fundacion</label>
     <input type="text" name="anno_fundacion">

     <!-- (POST/PUT)-->
      <label for="">Nombre delete</label>
      <input type="text" name="nombre_desarrolladora_borrar">

      <br>
      <input type="submit" value="Cositas API">
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $metodo = $_POST["metodo"];

            $url = "http://localhost/Tema6/nucleo_api.php";
            
            if ($metodo == "GET"){
                $param_url = "";

                if (isset($_POST["ciudad_filtro"]) && !empty($_POST["ciudad_filtro"])){
                    $param_url = "?ciudad". urlencode($_POST["ciudad_filtro"]);
                }
                $url_completa = $url . $param_url;

                echo "Url completa: ".$url_completa;

                /**
                 * file_get_contents() -> Extraer info de files
                 * y datos de la peticion http
                 * 
                 * Ahora lo usaremos para hacer la peticion http
                 */

                try{
                    $respuesta = file_get_contents($url_completa);
                    echo "Respuesta API <br><pre>$respuesta</pre>";

                }
                catch(Exception $e){
                    echo $e->getMessage();
                }
            }
            else if ($metodo == "POST" || $metodo == "PUT" || $metodo == "DELETE"){
                $datos = [];
                if ($metodo != "DELETE"){
                    $datos = [
                        "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
                        "ciudad" => $_POST["ciudad"],
                        "anno_fundacion" => $_POST["anno_fundacion"]
                    ];
                }
                else{
                    $datos = [
                        "nombre_desarrolladora" => $_POST["nombre_desarrolladora_borrar"],
                        "ciudad" => $_POST["ciudad"],
                        "anno_fundacion" => $_POST["anno_fundacion"]
                    ];
                }
                echo "Datos que enviamos<br><pre>".htmlspecialchars(json_encode($datos), JSON_PRETTY_PRINT)."</pre>";

                /**
                 * stream_context_create() => configurar la peticion HTTP
                 * Como ya sabemos, para enviar datos a traves de los metodos
                 * me hace falta mas opciones que para enviarlos desde GET
                 * 
                 * A esas acciones las llamaremos contexto
                 * El contexto es una "hoja de instrucciones" que le dice a PHP:
                 * - Que metodo HTTP usamos
                 * - Que tipo de datos le pasamos
                 * - Cual es el contenido o cuerpo de la peticion
                 * 
                 * En resumen, estamos preparando el paquete con todas las opciones
                 * antes de mandarlo a la api
                 */

                $opciones = [
                    "http" => [
                        "header" => "ContentType: application/json",
                        "method" => $metodo,
                        "content" => json_decode($datos)
                    ]
                ];

                $contexto = stream_context_create($opciones);
                var_dump($contexto);

                /**
                 * Volvemos a usar file_get_contents() pero ahora le añadimos
                 * también que hemos creado. Como tenemos más datos (u opciones)
                 * que pasarle a la peticion, necesitamos añadir más parámetros
                 * a esta función
                 * 
                 * - la URL
                 * - False
                 * - El contexto
                 * 
                 */

                try {
                    $respuesta = file_get_contents($url, false, $contexto);
                    echo "Respuesta de la API:<br><pre>$respuesta</pre>";
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

            }
        }
    ?>

</body>
</html>