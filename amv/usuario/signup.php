

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <?php 
        require 'conexion.php';
        error_reporting(E_ALL);
        ini_set("display errors", 1);
    ?>
</head>
<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_nombre = $_POST['nombre'];
            $tmp_pass = $_POST['pass'];
            $tmp_rol = $_POST['rol'];
            


            //Validacion nombre
            $tmp_nombre = trim(htmlspecialchars($tmp_nombre));
            if ($tmp_nombre == ' ' || $tmp_nombre == ''){
                $err_nombre = "<div class='alert alert-danger'>Inserta un nombre</div>";
            }
            else $nombre = $tmp_nombre;


            // Validacion password
            $tmp_pass = trim(htmlspecialchars($tmp_pass));
            if ($tmp_pass == ' ' || $tmp_pass == ''){
                $err_pass = "<div class='alert alert-danger'>Inserta una contraseña</div>";
            }
            else {
                $pass = $tmp_pass;
            }

            //Validacion rol
            if ($tmp_rol == ' ' || $tmp_rol == ''){
                $err_rol = "<div class='alert alert-danger'>Inserta un rol</div>";
            }
            else $rol = $tmp_rol;
            


            //Insertar datos en la bbdd
            if (isset($nombre, $pass, $rol)){
                $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                $fecha = date("Y-m-d h:i:s");

                $query = "INSERT INTO usuarios (nombre, contrasena, rol)
                VALUES ('$nombre', '$hashedPass', '$rol')";

                if($_conexion->query($query)){
                    echo "<div class='alert alert-success'>Usuario registrado correctamente</div>";
                }
                else echo "<div class='alert alert-danger'>No se ha podido registrar el usuario</div>". $_conexion->error;
            }


        }
    ?>
    <div class="row justify-content-center">
        <div class="container mt-5 col-md-6 col-lg-4">
            <h2 class="text-center">Registrate</h2>
            <form action="" method="POST" class="form">
                <div class="mb-3">
                    <label  class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="nombre">
                    <?php if(isset($err_nombre)) echo $err_nombre; ?>
                <div class="mb-3">
                    <label  class="form-label">Contraseña: </label>
                    <input type="password" class="form-control" name="pass">
                    <?php if(isset($err_pass)) echo $err_pass; ?>
                </div>
                <div class="mb-3 form-check">
                    <select class="form-select" name="rol">
                        <option value=" " disabled selected>--Elije una opción--</option>
                        <option value="cliente">Cliente</option>
                        <option value="editor">Editor</option>
                        <option value="admin">Administrador</option>
                    </select>
                    <?php if(isset($err_rol)) echo $err_rol; ?>
                </div>
                <div class="mb-3">
                        <input type="submit" value="registrarse" class="btn btn-primary w-100">
                </div>
            </form>
            <div class="my-3">
                <h3 class="text-center mt-4 mb-3">Si ya tienes cuenta, inicia sesion</h3>
                <a href="login.php" class="btn btn-secondary w-100">Iniciar Sesion</a>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>