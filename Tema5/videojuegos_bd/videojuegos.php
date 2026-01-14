<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<?php 
    require 'sesion/conexion.php';
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    if (!isset($_SESSION['user'])){
        header('Location: sesion/login.php');
        exit();
    }
?>
</head>
<body>
    <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (isset($_POST["titulo"])){
                    $query = "DELETE FROM videojuegos WHERE titulo = '{$_POST["titulo"]}'";
    
                    if($_conexion->query($query)){
                        echo "<div class='alert alert-success'>Se ha borrado el producto con el ID {$_POST["id_videojuego"]}</div>";
                    }else{
                        echo "<div class='alert alert-danger'>No se ha podido borrar el producto con el ID {$_POST["id_videojuego"]}</div>";
                    }
                }
            }
        ?>

        

        <div class="container my-4 row">
            <form action="" method="post" class="col">
                <input type="hidden" value="servicio" name="servicio">
                <input type="submit" value="Servicio" class="btn btn-primary">
            </form>
            <form action="" method="post" class="col">
                <input type="hidden" value="historia" name="historia">
                <input type="submit" value="Historia" class="btn btn-primary">
            </form>
        </div>

    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>Titulo</th>
                <th>Nombre desarrolladora</th>
                <th>Año lanzamiento</th>
                <th>Porcentaje Reseñas</th>
                <th>Horas duracion</th>
                <?php
                    if($_SESSION["admin"]){
                        echo "<th>Editar</th>";
                        echo "<th>Borrar</th>";
                    }

                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (isset($_POST["servicio"])){
                    $query = "SELECT * FROM videojuegos WHERE horas_duracion = -1";
                }
                else if (isset($_POST['historia'])){
                    $query = "SELECT * FROM videojuegos WHERE horas_duracion > 0";
                }
                else $query = "SELECT * FROM videojuegos";

                $result = $_conexion->query($query);
                if ($result == false) echo $_conexion->error;
                
                while($fila = $result->fetch_assoc()){
                    echo "<tr>";
                    foreach($fila as $campo => $data){
                        if ($campo != "id_videojuego"){
                            if ($campo == "porcentaje_reseñas") echo "<td>$data %</td>";
                            else echo "<td>$data</td>";
                        }
                    }
                    if ($_SESSION["admin"]){
                        echo "<td>";
                        echo "<a href='editarJuego.php?id_videojuego={$fila['id_videojuego']}' class='btn btn-warning'>Editar</a>";
                        echo "</td>";

                        echo "<td>";
                        echo "<form action='' method='post'>
                            <input type='hidden' name='id_videojuego' value='{$fila["titulo"]}'>
                            <input type='submit' value='Borrar' class='btn btn-danger'>
                        </form>";
                        echo "</td>";
                        
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>