<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Ropa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <?php 
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        require "sesion/conexion.php";
    ?>
</head>
<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $query = "DELETE FROM productos_hogar WHERE id_producto = '$_POST[id_producto]'";
            if($_conexion->query($query)){
                echo "<div class='alert alert-success'>Se ha borrado el producto con el ID {$_POST["id_producto"]}</div>";
            }else{
                echo "<div class='alert alert-danger'>No se ha podido borrar el producto con el ID {$_POST["id_producto"]}</div>";
            }
        }

        $columna = $_GET["order_by"] ?? "nombre";
        $direccion = $_GET["direction"] ?? "ASC";

    ?>
    <div class="container d-flex gap-4 my-5">
        <a href="index.php" class="btn btn-secondary">Ir al menú principal</a>
        <form action="" method="GET" class="d-flex gap-4">
                <label class="form-label">Ordenar por:</label>
                <select name="order_by" id="" class="form-select">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="marca">Ordenar por Marca</option>
                    <option value="categoria">Ordenar por Categoría</option>
                    <option value="precio">Ordenar por Precio</option>
                </select>
                <label class="form-label">Dirección:</label>
                <select name="direction" id="" class="form-select">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="ASC">Ascendente</option>
                    <option value="DESC">Descendente</option>
                </select>
                <input type="submit" value="Enviar" class="btn btn-primary">
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Marca</th>
                <th>Talla</th>
                <th>Color</th>
                <th>Género</th>
                <th>Material</th>
                <th>Imagen</th>
                <?php 
                    if ($_SESSION["admin"]){
                        echo "<th>Acciones</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT id_producto, nombre, descripcion, categoria, precio, stock, marca, talla, color, genero, material, imagen
                 FROM productos_ropa ORDER BY $columna $direccion";

                $result = $_conexion->query($query);
                if (!$result) die($_conexion->error);

                while ($fila = $result->fetch_assoc()){
                    echo "<tr>";
                    foreach ($fila as $campo => $data) {
                        if ($campo != "id_producto"){
                            if ($campo == "precio")
                                echo "<td>$data €</td>";
                            else if ($campo == "imagen")
                                echo "<td><img src='$data' width='100' height='100'></td>";
                            else echo "<td>$data</td>";
                        }
                    }
                    if ($_SESSION["admin"]){
                        echo "<td>";
                            echo "<a href='editarHogar.php' class='btn btn-warning'>Editar</a>";
                            echo "<form action='' method='post'>
                                <input type='hidden' name='id_producto' value='{$fila["id_producto"]}'>
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