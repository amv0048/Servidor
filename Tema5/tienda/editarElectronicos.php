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
        if ($_SERVER["REQUEST_METHOD"] == 'POST'){

            $id = $_GET['id_producto'] ?? false;
            if (!$id) return 'id no enviado';

            $nombre = trim($_POST['nombre']);
            $descripcion = trim($_POST['descripcion']);
            $categoria = trim($_POST['categoria']);
            $precio = $_POST['precio'];
            $stock = trim($_POST['stock']);
            $marca = trim($_POST['marca']);
            $modelo = trim($_POST['modelo']);
            $garantia_meses = $_POST['garantia_meses'];
            $especificaciones = trim($_POST['especificaciones']);
            $imagen = $_FILES['imagen']['name'];
            $fecha = date("Y-m-d H:i:s");


            $errores = false;
            //Validaciones

            if (!$errores){
                $consulta = "UPDATE productos_electronicos SET
                nombre = ?,
                descripcion = ?,
                categoria = ?,
                precio = ?,
                stock = ?,
                marca = ?,
                modelo = ?,
                garantia_meses = ?,
                especificaciones = ?,
                imagen = ?
                WHERE id_producto = ?";
                
                $stmt = $_conexion->prepare($consulta);
                //Bindeo (enlazamiento)
                // Enlaza por referencia las variables a los ? e indica el tipo de dato de cada una.
                // s=>string, i=>integer, d=>double, b=>blob (binary large object)
                $stmt->bind_param(
                        'sssdississi',
                        $nombre,
                        $descripcion,
                        $categoria,
                        $precio,
                        $stock,
                        $marca,
                        $modelo,
                        $garantia_meses,
                        $especificaciones,
                        $imagen,
                        $id
                    );
                //Ejecución
                //execute() envía los valores al servidor y ejecuta la sentencia preparada
                // si todo va bien, podemos consultar cositas como $stmt->insert_id
                // en caso de error, se puede imprimir cosas como $stmt->error (más aconsejable que $_conexion->error)
                if ($stmt->execute()){
                    echo "<div class='alert alert-success'>Producto editado correctamente (olee)</div>";
                    //limpiar las variables del formulario 
                    $nombre = $descripcion = $categoria = $precio = $stock = $marca = $modelo = $garantia_meses = $especificaciones = $imagen = $fecha = "";

                    /**
                     * por qué este método es mejor que query() para hacer insterts
                     * 
                     * $consulta = "INSERT INTO peliculas (...) VALUES ('".$titulo."',...);
                     * si $titulo tuviese comillas u otros caracteres maliciosos, se rompe la consulta. Pero con prepare+bind, los valores no se interpretan omo SQL, sino como datos y por ello, la consulta no se rompe.
                     * 
                     * bind_param fuerza tipos y por tanto evita errores de locales como decimales, null y eso.
                     * 
                     */
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
                <input type="text" class="form-control" name="nombre">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input type="text"  class="form-control" name="categoria">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <input type="text" class="form-control" name="marca">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text"  class="form-control" name="modelo">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Garantía</label>
                <input type="text" class="form-control" name="garantia_meses">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Especificaciones</label>
                <input type="text" class="form-control" name="especificaciones">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" accept="image/*" class="form-control" name="imagen">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <input type="submit" value="Editar Producto" class="btn btn-success">
            </div>
        </form>
        <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>