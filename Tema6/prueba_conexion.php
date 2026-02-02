<?php 
    require 'conexion_pdo.php';

    try{
        $res = $_conexion->query('SELECT * FROM desarrolladoras');
    
        /* while($fila = $res->fetch()){
            echo "Desarrolladora: {$fila['nombre_desarrolladora']}<br>";
        } */

    }
    catch(PDOException $e){
        echo "ERROR: {$e->getMessage()}";
    }


    //Segunda forma: Con prepare y execute pero con consultas preparadasç
    try{
        $res = $_conexion->prepare('SELECT * FROM videojuegos WHERE
        nombre_desarrolladora = :nombre'); // :nombre es dinamico
        $res->execute([
            "nombre" => "Nintedo"
        ]);

        $fila = $res->fetch();
        if ($fila){
            while($fila = $res->fetch()){
                echo "Desarrolladora: {$fila['titulo']}<br>";
            }    
        }
        //else echo 'No hay nada';
    }
    catch(PDOException $e){
        echo "Consulta mal hecha {$e->getMessage()}";
    }

    //Tercera forma con prepare y execution
    try{
        $res = $_conexion->prepare("SELECT * FROM desarrolladoras WHERE
        nombre_desarrolladora = 'Nintendo'");

        $res->execute();

        $desarrolladoras = $res->fetchAll();


    }
    catch(PDOException $e){
        echo "Consulta mal hecha {$e->getMessage()}";
    }

    //Insertar con consulta preparada
    /* try{
        $res = $_conexion->prepare("INSERT INTO videojuegos
        (titulo, nombre_desarrolladora, anno_lanzamiento, porcentaje_reseñas, horas_duracion)
        VALUES (:titulo, :desarrolladora, :anno, :resenas, :horas)");
        $res->execute([
            "titulo" => "gta6",
            "desarrolladora" => "Valve",
            "anno" => 2026,
            "resenas" => 10,
            "horas" => 3000
        ]);
        echo 'Juego insertado';
    }
    catch(PDOException $e){
        echo "ERROR: {$e->getMessage()}";
    } */

    //Borrar datos
    /**
     * Con un form , segun el numero que entre en el formulario se borraran ese numero de juegos
     * Usar consulta preparada con tantos execute como numeros entren
     */

    if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        $res = $_conexion->prepare('DELETE FROM videojuegos 
        WHERE id_videojuego = :number');
        $number = $_conexion->prepare("SELECT MIN(id_videojuego) FROM videojuegos");
        $number->execute();
        $num = intval($number->fetchAll()[0]["MIN(id_videojuego)"]);
        
        for ($i = $num; $i < ($_POST["n"]+$num); $i++) { 
            $res->execute([
                "number" => $i
            ]);
        }
    }

    try{
        $_conexion->beginTransaction();
        $_consulta = $_conexion->prepare("INSERT INTO desarrolladoras 
        (nombre_desarrolladora, ciudad, anno_lanzamiento) VALUES 
        (:nombre, :city, :anno)");

        $consulta->execute([
            "nombre" => "DawDes1",
            "city" => "DawCity",
            "anno" => 4
        ]);

        $_conexion->commit();
        echo "INSERTADO CORRECTAMENTE";
    }
    catch(PDOException $e){
        $_conexion->rollBack();
        echo "ERROR: {$e->getMessage()}";
    } 
?>
<form action="" method="post" >
    <input type="number" name="n" id="" min="1">
    <input type="submit" value="Enviar">
</form>