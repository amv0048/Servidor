<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <?php 
    require "conexion.php";
    error_reporting( E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>

<body>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_usuario = $_POST["usuario"];
        $tmp_contrasena = $_POST["contrasena"];
        $admin = isset($_POST["admin"]) ? 1 : 0;

        #Validacion usuario Sencilla
        $tmp_usuario = htmlspecialchars($tmp_usuario);
        $tmp_usuario = trim($tmp_usuario);
        $tmp_usuario = preg_replace("/\s+/" , "_" , $tmp_usuario);

        if($tmp_usuario ==""){
            $err_usuario = "Inserta un usuario";
        }elseif (strlen($tmp_usuario) < 3) {
            $err_usuario = "<div class='alert alert-danger mt-2'> El usuario bede tener al menos 3 caracteres </div>";
        }else{
            $usuario = $tmp_usuario;
        }


        #Validacion contraseña Sencilla
        $tmp_contrasena = htmlspecialchars($tmp_contrasena);
        $tmp_contrasena = trim($tmp_contrasena);

        if($tmp_contrasena ==""){
            $err_contrasena = "Inserta una contraseña";
        }elseif (strlen($tmp_contrasena) < 3) {
            $err_contrasena = "<div class='alert alert-danger mt-2'> La contraseña bede tener al menos 3 caracteres </div>";
        }else{
            $contrasena = $tmp_contrasena;
        }

        if(isset($usuario) and isset($contrasena)){
            $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
            $consulta = "INSERT INTO usuarios (usuario, contrasena, admin) VALUES ('$usuario' , '$contrasena_cifrada', '$admin')";
            if ($resultado = $conexion -> query($consulta)) {
                echo "<div class='alert alert-success'> Usuario registrado correctamente </div>";
            }else{
                echo "<div class='alert alert-danger'> No se ha podido registrar el usuario </div>";
            }

        }

    }
    
    
    
    
    ?>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="password" name="apellidos" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="password" name="correo" required class="form-control">
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciudad</label>
                        <input type="password" name="ciudad" required class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Codigo Postal</label>
                        <input type="password" name="codigo" required class="form-control">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono</label>
                        <input type="password" name="telf" required class="form-control">
                        
                    </div>    
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" class="form-control">
                        <?php if(isset($err_contrasena)) echo $err_contrasena ?>
                    </div> 
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="admin" class="form-check-input">
                        <label class="form-check-label">¿Eres admin?</label>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Registrarse" class="btn btn-primary w-100">
                    </div>
                </form>
                <h3 class="text-center mt-4 mb-3">Si ya tienes cuenta, inicia sesion</h3>
                <a href="login.php" class="btn btn-secondary w-100">Iniciar sesión</a>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>