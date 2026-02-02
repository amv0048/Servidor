<?php 
    require "conexion_pdo.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["borrar"])){
        $num = intVal($_POST["borrar"]);
        try{

            $query = "DELETE FROM videojuegos ORDER BY 
            id_videojuego ASC LIMIT :limite";

            $consulta->$_conexion->prepare($query);

            $consulta->bindValue("limite", $num, PDO::PARAM_INT);

            /* $consulta->execute([
                "limite" => $num
            ]); */

            $consulta->execute();

            $borrados = $consulta->;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

?>

<form action="" method="post">
    <input type="text" name="borrar">
    <input type="submit" value="Borrar">
</form>