<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
require "conexion_pdo.php";
try{
    $conexion -> beginTransaction();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["repes"] > 0){ // si es mayor que 0 hace todo
            $repeticiones =$_POST["repes"];
            $consultaJuegos = $conexion -> prepare ("SELECT titulo FROM videojuegos WHERE titulo = :name_game");
            $consultaDesarrolladora = $conexion -> prepare( "SELECT nombre_desarrolladora FROM desarrolladoras WHERE nombre_desarrolladora = :name_dev");
            $insertarDesalldora =  $conexion -> prepare("INSERT INTO desarrolladoras (nombre_desarrolladora, ciudad, anno_fundacion) 
                                                VALUES (:nombre, :ciudad, :anno)");
            $insertarJuego =  $conexion -> prepare("INSERT INTO videojuegos (titulo, nombre_desarrolladora, anno_lanzamiento, porcentaje_reseñas,horas_duracion) 
                                                VALUES (:nombre_juego, :dev, :annito , :resennas , :duracion )");                  
            for ($i=0; $i < $repeticiones ; $i++) { 
                $consultaJuegos -> execute(["name_game" => "DemoGenZ$i"]);
                if($consultaJuegos -> rowCount() == 0){ //Si no existe el juego
                    $consultaDesarrolladora -> execute(["name_dev"=> "GenZDes$i"]);
                    if($consultaDesarrolladora -> rowCount() == 0){ //si no hay desarolladoras
                        $nombre = "GenZDes$i";
                        $ciudad = "japon";
                        $anno = 2020;
                        $insertarDesalldora -> bindValue(":nombre",$nombre, PDO::PARAM_STR);
                        $insertarDesalldora -> bindValue(":ciudad",$ciudad, PDO::PARAM_STR);
                        $insertarDesalldora -> bindValue(":anno",$anno, PDO::PARAM_INT);
                        $insertarDesalldora -> execute();
                        echo "Se ha creado la desarrolladora";
                        $insertarJuego->bindValue(":nombre_juego", "DemoGenz$i" , PDO::PARAM_STR);
                        $insertarJuego -> bindValue(":dev","GenZDes$i", PDO::PARAM_STR);
                        $insertarJuego -> bindValue(":annito", 2020, PDO::PARAM_INT);
                        $insertarJuego->bindValue(":resennas", 99.5, PDO::PARAM_STR); 
                        $insertarJuego -> bindValue(":duracion", 100, PDO::PARAM_INT);

                        $insertarJuego->execute();

                        echo "Juego creado correctamente DemoGenz$i <br>";
                    }
                    else{ //Ya existe desarrrolladora

                        $insertarJuego->bindValue(":nombre_juego", "DemoGenz$i" , PDO::PARAM_STR);
                        $insertarJuego -> bindValue(":dev","GenZDes$i", PDO::PARAM_STR);
                        $insertarJuego -> bindValue(":annito", 2020, PDO::PARAM_INT);
                        $insertarJuego->bindValue(":resennas", 99.5, PDO::PARAM_STR); 
                        $insertarJuego -> bindValue(":duracion", 100, PDO::PARAM_INT);
                        $insertarJuego->execute();
                        echo "Juego creado correctamente DemoGenz$i // ADEMAS EXISISTIA SU DESARROLLADORA <br>";
                    }  
                }else{
                    echo "El juego ya esta creado";
                }
            }
                $conexion->commit();
        }
    }

} catch(PDOException $e){
    $conexion -> rollBack();
    echo $e->getMessage();
}

    ?>
<body>
    <form action="" method="post">
        <input type="number" name="repes" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
eud-dzzi-hoe