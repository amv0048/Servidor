<?php 

/**
 * Conjunto de reglas que permiten que un programa
 * se comunique con otro sin conocer su implementacion interna
 * 
 * ¿Qué se puede pedir?
 * ¿Cómo?
 * ¿Qué se devuelve?
 * 
 * 
 * API REST
 * Tipo de api que sigue la arquitectura web (REPRESENTATIONAL STATE TRANSFER)
 * 
 * - Usa el HTTP como estandar de comunicacion
 * 
 * Caracteristicas clave de api rest
 * - No se guarda el estado
 * - Formato JSON como estándar
 * - Separación del back y front
 * - Uso de verbos http y status code
 */

error_reporting(E_ALL);
ini_set("display errors", true);

/**
 * header() => funcion para enviar info al nav
 * valor: Content-Type: application/JSON
 * Le decimos al cliente que lo que va a llegar esta en JSON
 * Importante para trabajar con JS
 */

header("Content-Type: application/JSON");

/**
 * Carga el archivo de conexion a la bbdd PERO SI FALLA NO PETA
 */
include "../conexion_pdo.php";

$method = $_SERVER["REQUEST_METHOD"];

//Recoje el JSON, la funcion saca datos de un fichero
$entrada = file_get_contents('php://input');

$entrada = json_decode($entrada, true);

switch($method){
    case "GET":
        controlGet($_conexion);
        break;
    case "POST":
        controlPost($_conexion, $entrada);
        break;
    case "GET":
        controlPut($_conexion, $entrada);
        break;
    case "DELETE":
        controlDelete($_conexion);
        break;
    default:
        echo json_encode([
            "estado" => "error",
            "mensaje" => "No se ha identificado el método"
        ]);
        break;
}
 
/**
 * leemos datos segun lo que me llegue, buscamos los datos en la BBDD,
 * filtramos por ciudad
 * 
 * Si el cliente no envia ninguna ciudad, respondo con todas las desarrolladoras
 */
function controlGet($_conexion){
    try{
        if (isset($_GET["ciudad"]) && $_GET["ciudad"] != ''){
            $query = "SELECT * FROM desarrolladoras WHERE ciudad = :ciu";
            $res = $_conexion->prepare($query);
            $res->bindValue("ciu", $_GET["ciudad"], PDO::PARAM_STR);

            $res->execute();
        }
        else{
            $query = "SELECT * FROM desarrolladoras";
            $res = $_conexion->prepare($query);
            $res->execute();
        }

        $res = $res->fetchAll();
        echo json_encode($res);
    }
    catch(PDOException $e){
        echo json_encode([
            "error" => "Error en la consulta",
            "detalles" => $e->getMessage()
        ]);
    }
}

function controlPut($_conexion, $entrada){
    $nombre = $entrada["nombre_desarrolladora"];
    $ciu = $entrada["ciudad"];
    $ano = $entrada["anno_lanzamiento"];

    $query = "UPDATE desarrolladoras SET 
    ciudad = :ciu,
    anno_fundacion = :anno WHERE nombre_desarrolladora = :nombre";

    $query = $_conexion->prepare();
    $query->bindValue("nombre", $nombre, PDO::PARAM_STR);
    $query->bindValue("ciu", $ciu, PDO::PARAM_STR);
    $query->bindValue("anno", $ano, PDO::PARAM_STR);

    $bien = $query->execute();

    if ($bien && $query->rowCount() == 1){
        echo json_encode([
            "estado" => "exito",
            "mensaje" => "Se ha podido actualizar la desarrolladora"
        ]);
    }
    else{
        echo json_encode([
            "estado" => "error",
            "mensaje" => "Algo falla"

        ]);
    }
    
}

function controlPost($_conexion, $entrada){
    if (!isset($entrada["nombre_desarrolladora"]) || $entrada["nombre_desarrolladora"] === ""){
        echo json_encode([
            "estado" => "error", "mensaje" => "Falta la primary key (nombre_desarrolladora)"]
        );
        return;
    }
    $nombre = $entrada["nombre_desarrolladora"];
    $ciudad = $entrada["ciudad"] ?? "";
    $anno = $entrada["anno_fundacion"] ?? 0;

    try{
        $query = "INSERT INTO desarrolladoras (
        nombre_desarrolladora,
        ciudad,
        anno_fundacion)
        VALUES(
            :viento,
            :lluvia,
            :muerte
        )";
        $query = $_conexion->prepare();

        $query->bindValue("viento", $nombre, PDO::PARAM_STR);
        
        $query->bindValue("lluvia", $ciudad, PDO::PARAM_STR);
        $query->bindValue("muerte", $anno, PDO::PARAM_STR);

        $query->execute();
        echo json_encode([
            "estado" => "exito",
            "mensaje" => "La desarrolladora se metió correctamente"
        ]);
    } catch(PDOException $e){

    }

}


function controlDelete($_conexion){
    
}

?>