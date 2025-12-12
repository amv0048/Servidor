<?php
session_start(); //Recogemos la sesión
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
    require 'sesion/conexion.php';
    ?>

    <?php 
        $columna = $_GET["order_by"] ?? "anno_fundacion";
        $direccion = $_GET["direccion"] ?? "DESC";
    ?>
</head>

<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $query = "delete from peliculas where nombre_estudio = '{$_POST["nombre_estudio"]}'";
            
            if ($res = $_conexion->query($query)){
                $query = "delete from estudios where nombre_estudio = '{$_POST["nombre_estudio"]}'";
            }
            echo "<div>class='alert alert-success'</div>";
        }
    ?>

    <form action="" method="get">
        <select name="" id="">
            <option value="" disabled selected>Selecciona una opcion</option>
            <option value="anno_fundacion">Ordenar por año de fundacion</option>
            <option value="nombre_estudio">Nombre del estudio</option>
            <option value="ciudad">ciudad</option>
        </select>
        <select name="" id="">
            <option value="" disabled selected>Elija el orden de la tabla</option>
            <option value="ASC">ASC</option>
            <option value="DESC">DESC</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    

    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nombre Estudio</th>
                <th>Ciudad</th>
                <th>Año de fundacion</th>
                <?php if ($_SESSION["admin"]) {
                    echo "<th>Acciones</th>";
                } ?>

            </tr>
        </thead>
        <tbody>
            <?php
            $query = "select * from estudios order by $columna $direccion";
            $res = $_conexion->query($query);
            while ($fila = $res->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $fila["nombre_estudio"] ?></td>
                    <td><?= $fila["ciudad"] ?></td>
                    <td><?= $fila["anno_fundacion"] ?></td>
                    <td>
                    <?php if ($_SESSION["admin"]) {?>
                        <a href="editarEstudios.php" class="btn btn-warning">Editar</a>
                        <form action="" method="post">
                            <input type="hidden" name="nombre estudio" value='{$fila["nombre_estudio"]}'>
                        </form>
                        <form action="" method="post">
                            <a href="editarEstudios.php" class="btn btn-danger">Borrar</a>
                            <input type="hidden" name="nombre estudio" value='{$fila["nombre_estudio"]}'>
                        </form>
                    <?php } ?>
                    </td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>