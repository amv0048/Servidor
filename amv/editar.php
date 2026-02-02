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
        if(!isset($_SESSION["user"])){
            header("location: index.php");
            exit;
        }
        if(!$_SESSION["rol"] == 'admin' ||!$_SESSION["rol"] == 'editor'){ // Comprobamos si el cliente es admin
            header("location: index.php");
            exit;
        }
        require "usuario/conexion.php";
    ?>
</head>
<body>
    <?php
        //Sacar proveedores
        $proveedores = [];
        $consulta_lista = "SELECT nombre_proveedor FROM proveedores";
        $res = $_conexion->query($consulta_lista);
        while($fila = $res->fetch_assoc()){
            array_push($proveedores, $fila["nombre_proveedor"]);
        }

    
        $id = $_GET['id_producto'] ?? false;
        if (!$id) return 'id no enviado';

        $query = "SELECT * FROM productos WHERE id_producto = '{$_GET["id_producto"]}'";
        $prev = $_conexion->query($query);
        if (!$prev) die("Error: " . $_conexion->error);
        $info_product = $prev->fetch_assoc();

        if ($_SERVER["REQUEST_METHOD"] == 'POST'){

            $nombre = trim($_POST['nombre']);
            $categoria = trim($_POST['categoria']);
            $precio = $_POST['precio'];
            $stock = trim($_POST['stock']);
            $proveedor = $_POST["nombre_proveedor"];

            $errores = false;

            //Validaciones
            if ($nombre == ''){
                $err_nombre = "<div class='alert alert-danger'>Inserta un nombre para el producto</div>";
                $errores = true;
            }
            if ($categoria == ''){
                $err_categoria = "<div class='alert alert-danger'>Inserta una categoria producto</div>";
                $errores = true;
            }
            if ($precio == ''){
                $err_precio = "<div class='alert alert-danger'>Inserta un precio para el producto</div>";
                $errores = true;
            }
            else if (!doubleval($precio) || doubleval($precio) < 0){
                $err_precio = "<div class='alert alert-danger'>Inserta un precio valido</div>";
                $errores = true;
            }
            if ($stock == ''){
                $err_stock = "<div class='alert alert-danger'>Inserta un stock para el producto</div>";
                $errores = true;
            }
            else if (!intval($stock) || intval($stock) < 0){
                $err_stock = "<div class='alert alert-danger'>Inserta un stock valido</div>";
                $errores = true;
            }
            if ($proveedor == ''){
                $err_proveedor = "<div class='alert alert-danger'>Inserta un proveedor para el producto</div>";
                $errores = true;
            }

            if (!$errores){
                $consulta = "UPDATE productos SET
                nombre = ?,
                categoria = ?,
                precio = ?,
                stock = ?,
                nombre_proveedor = ?
                WHERE id_producto = ?";
                
                $stmt = $_conexion->prepare($consulta);
                $stmt->bind_param(
                        'ssdisi',
                        $nombre,
                        $categoria,
                        $precio,
                        $stock,
                        $proveedor,
                        $id
                    );
                if ($stmt->execute()){
                    echo "<div class='alert alert-success'>Producto editado correctamente (olee)</div>";
                    $nombre = $categoria = $precio = $stock = $proveedor = "";
                }
                else{
                    echo "<div class='alert alert-danger'>Liada astronómica</div>";
                }
                $stmt->close();
            }

        }
    ?>

    <div class="container mt-4">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" name="nombre" value=" <?= $info_product['nombre'] ?>"> 
                <?= $err_nombre ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input type="text"  class="form-control" name="categoria" value="<?= $info_product['categoria'] ?>"> 
                <?= $err_categoria ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" value="<?= $info_product['precio'] ?>"> 
                <?= $err_precio ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock" value="<?= $info_product['stock'] ?>"> 
                <?= $err_stock?? "" ?>
            </div>
            <div class="mb-3">
                <select class="form-select" name="nombre_proveedor" id="">
                    <option  selected value="<?= $info_product['nombre_proveedor'] ?>"><?= $info_product['nombre_proveedor'] ?></option>
                    <option value="" disabled>Elije un proveedor</option>
                <?php 
                    foreach($proveedores as $prov){
                        if ($prov != $info_product['nombre_proveedor'])
                            echo "<option value='$prov'>$prov</option>";
                    }
                ?>
                </select>
                <?= $err_proveedor ?? "" ?>
            </div>
            <div class="mb-3">
                <input type="submit" value="Editar Producto" class="btn btn-success">
            </div>
        </form>
        <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>
        <a href="productos.php" class="btn btn-secondary">Lista de productos</a>

    </div>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
</body>
</html>