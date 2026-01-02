<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos electronicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php 
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        require "sesion/conexion.php";

        $columna = $_GET["order_by"] ?? "nombre";
        $direccion = $_GET["direction"] ?? "ASC";

        if(!isset($_SESSION["user"])){
            header("location: sesion/login.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $query = "DELETE FROM productos_electronicos WHERE id_producto = '{$_POST["id_producto"]}'";

            if($_conexion->query($query)){
                echo "<div class='alert alert-success'>Se ha borrado el producto con el ID {$_POST["id_producto"]}</div>";
            }else{
                echo "<div class='alert alert-danger'>No se ha podido borrar el producto con el ID {$_POST["id_producto"]}</div>";
            }
        }
    ?>
    <div class="container my-4">
        <a href="index.php" class="btn btn-secondary">Ir al menú principal</a>
        <a href="?order_by=marca&direction=ASC" class="btn btn-info">Ordenar por Marca</a>
        <a href="?order_by=categoria&direction=ASC" class="btn btn-info">Ordenar por Categoría</a>
        <a href="?order_by=precio&direction=ASC" class="btn btn-warning">Ordenar por Precio (ASC)</a>
        <a href="?order_by=precio&direction=DESC" class="btn btn-warning">Ordenar por Precio (DESC)</a>
    </div>

    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Garantía</th>
                <th>Especificaciones</th>
                <th>Imagen</th>
                <?php
                if($_SESSION["admin"])
                    echo "<th>Acciones</th>";
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT id_producto, nombre, descripcion, categoria, precio, stock, marca, modelo, garantia_meses, especificaciones, imagen FROM productos_electronicos
                ORDER BY $columna $direccion";
                $result = $_conexion->query($query);
                if (!$result) die("Error: " . $_conexion->error);

                while ($fila = $result->fetch_assoc()){
                    echo "<tr>";
                    foreach($fila as $campo => $data){
                        if ($campo != 'id_producto'){
                            if ($campo === 'imagen'){
                                echo "<td><img src='$data' width='100' height='100'></td>";
                            }
                            else if ($campo == 'precio'){
                                echo "<td>$data €</td>";
                            }
                            else{
                                echo "<td>$data</td>";
                            }
                        }
                    }
                    if($_SESSION["admin"]){
                        echo "<td>";
                        echo "<a href='editarElectronicos.php' class='btn btn-warning'>Editar</a>";
                        echo "<form action='' method='POST'>
                            <input type='hidden' name='id_producto' value='{$fila["id_producto"]}'>
                            <input type='submit' value='borrar' class='btn btn-danger'>
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