<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        if(!isset($_SESSION["user"])){ //Comprobamos si el cliente ha iniciado sesión
            header("location: index.php");
            exit;
        }
        if(!$_SESSION["admin"]){ // Comprobamos si el cliente es admin
            header("location: index.php");
            exit;
        }
        require "sesion/conexion.php";
    ?>
</head>
<body>
    <?php
        $id = $_GET["id_videojuego"] ?? false;
        $query = 'SELECT * FROM desarrolladoras';
        $result = $_conexion->query($query);
        $query = "SELECT nombre_desarrolladora 
                FROM desarrolladoras WHERE nombre_desarrolladora = 
                (SELECT nombre_desarrolladora 
                FROM videojuegos 
                WHERE id_videojuego = $id)";

        $res = $_conexion->query($query);
        $desa = $res->fetch_assoc()['nombre_desarrolladora'];
        

        $desarrolladoras = [];
        if (!$result) echo $_conexion->error;

        while($fila = $result->fetch_assoc()){
            $desarrolladoras[] = $fila["nombre_desarrolladora"];
        }

        if ($_SERVER["REQUEST_METHOD"] == 'POST'){ 

            
            if (!$id) return;
            $tmp_titulo = $_POST["titulo"];
            $desarrolladora = $_POST["nombre_desarrolladora"];
            $tmp_anno = $_POST["anno_lanzamiento"];
            $tmp_reseñas = $_POST["porcentaje_reseñas"];
            $tmp_horas = $_POST["horas_duracion"];

            //Validar
            $errores = false;

            //TITULO
            if ($tmp_titulo == ''){
                $err_titulo = "<div class='alert alert-danger'>El número titulo no puede estar vacío</div>";
                $errores = true;
            }
            else{
                $titulo = $tmp_titulo;
            }

            //AÑO LANZAMIENTO
            if ($tmp_anno == ''){
                $err_anno = "<div class='alert alert-danger'>El número titulo no puede estar vacío</div>";
                $errores = true;
            }
            else{
                $anno = $tmp_anno;
            }

            //RESEÑAS
            if ($tmp_reseñas == ''){
                $err_reseñas = "<div class='alert alert-danger'>El número titulo no puede estar vacío</div>";
                $errores = true;
            }
            else{
                $reseñas = $tmp_anno;
            }

            //HORAS
            if ($tmp_horas == ''){
                $err_horas = "<div class='alert alert-danger'>El número titulo no puede estar vacío</div>";
                $errores = true;
            }
            else{
                $horas = $tmp_horas;
            }

            if (!$errores){
                $query = "UPDATE videojuegos SET
                titulo = ?,
                nombre_desarrolladora = ?,
                anno_lanzamiento = ?,
                porcentaje_reseñas = ?,
                horas_duracion = ?
                WHERE id_videojuegos = ?";

                $stmt = $_conexion->prepare($query);
                $stmt->bind_param('ssiii', $titulo, $desarrolladora, $anno, $reseñas, $horas, $id);
                if ($stmt->execute()){
                    echo "<div class='alert alert-success'>Videojuego creado correctamente (olee)</div>";
                    //limpiar las variables del formulario
                    $titulo = $desarrolladora = $anno = $reseñas = $horas = '';
                }
                else echo "<div class='alert alert-danger'>Liada astronómica</div>";
                $stmt->close();
            }

        }
    ?>

    <div class="container mt-4">
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre desarrolladora</label>
                <select name="nombre_desarrolladora" id="">
                    <?php 
                        echo "<option value='$desa'>$desa</option>";
                        foreach($desarrolladoras as $des){
                            if ($des['nombre_desarrolladora '] != $desa){
                                echo "<option value='$des'>
                                    $des
                                </option>";
                            }
                        }
                    ?>
                </select>
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_desarrolladora ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Año de lanzamiento</label>
                <input type="text" class="form-control" name="anno_lanzamiento">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_anno ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Porcentaje reseñas</label>
                <input type="text" class="form-control" name="porcentaje_reseñas">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_reseñas?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Horas duracion</label>
                <input type="text" class="form-control" name="horas_duracion">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_duracion ?? "" ?>
            </div>
            <div class="mb-3">
                <input type="submit" value="Editar Juego" class="btn btn-success">
            </div>
        </form>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>