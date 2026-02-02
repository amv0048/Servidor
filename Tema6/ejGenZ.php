<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EjGenZ</title>
    <?php 
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
    ?>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container{
            display: flex;
            flex-direction: column;
            width: 8rem;
        }
    </style>
</head>
    <?php 
        require "conexion_pdo.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $game = $_POST['game'];
            $desarrolladora = $_POST['desarrolladora'];

            
            try{
                $existe = "SELECT nombre_desarrolladora FROM desarrolladoras
                WHERE nombre_desarrolladora = '$desarrolladora'";
    
                $result = $_conexion->query($existe);
    
                //Si no existe creo la desarrolladora
                if(!($result->fetch())){
                    $query = "INSERT INTO desarrolladoras (
                    nombre_desarrolladora,
                    ciudad,
                    anno_fundacion)
                    VALUES('$desarrolladora', 'Algeciras', 2000)";
                    $result = $_conexion->query($query);
                    if ($result == false) echo 'Liada';
                }

                $existe = "SELECT titulo FROM videojuegos
                WHERE titulo = '$game'";

                $result = $_conexion->query($existe);

                //El juego existe
                if (!($result)->fetch()){
                    echo "EL juego ya existe";
                    return;
                }
    
                $result = $_conexion->query($existe);

                $_conexion->beginTransaction();
                $query = $_conexion->prepare('INSERT INTO videojuegos (
                    titulo,
                    nombre_desarrolladora,
                    anno_lanzamiento,
                    porcentaje_reseñas,
                    horas_duracion
                ) VALUES (:titulo, :nombre, :anno, :porcent, :horas)');

                $query->execute([
                    "titulo" => "$game",
                    "nombre" => "$desarrolladora",
                    "anno" => intval($_POST["anno"]),
                    "porcent" => floatval($_POST["porcent"]),
                    "horas" => intval($_POST["horas"])
                ]);

                $_conexion->commit();
                echo "Insertado correctamente";
            }
            catch(PDOException $e){
                $_conexion->rollBack();
                echo "ERROR: {$e->getMessage()}";
            }
            
        }
    ?>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="">Juego: </label>
            <input type="text" name="game">
            <label for="">Desarrolladora:</label>
            <input type="text" name="desarrolladora">
            <label for="">Año de lanzamiento: </label>
            <input type="number" name="anno">
            <label for="">Porcentaje Reseñas:</label>
            <input type="number" name="porcent">
            <label for="">Horas duracion: </label>
            <input type="number" name="horas">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>
