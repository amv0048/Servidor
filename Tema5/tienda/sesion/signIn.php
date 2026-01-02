<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <?php 
        require 'conexion.php';
    ?>
</head>
<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_nombre = $_POST['nombre'];
            $tmp_apellidos = $_POST['apellidos'];
            $tmp_email = $_POST['email'];
            $tmp_pass = $_POST['pass'];
            $tmp_tlf = $_POST['tlf'];
            $tmp_direccion = $_POST['direccion'];
            $tmp_cp = $_POST['cp'];
            $tmp_ciudad = $_POST['ciudad'];
            $admin = isset($_POST['admin'])  ? 1 : 0;


            //Validacion nombre
            $tmp_nombre = trim(htmlspecialchars($tmp_nombre));
            $tmp_nombre = preg_replace("/\s+/", "_", $tmp_nombre);
            if ($tmp_nombre == ' '){
                $err_nombre = "<div class='alert alert-danger'>Inserta un nombre</div>";
            }
            else if (strlen($tmp_nombre) < 3){
                $err_nombre = "<div class='alert alert-danger'>El nombre debe tener al menos 3 caracteres</div>";
            }
            else $nombre = $tmp_nombre;

            // Validacion Apellidos
            $tmp_apellidos = trim(htmlspecialchars($tmp_apellidos));

            $tmp_ape = explode(" ",$tmp_apellidos);
            if (strlen($tmp_apellidos) == ' ')
                $err_apellidos = "<div class='alert alert-danger'>Inserta los apellidos</div>";
            else if (count($tmp_ape) > 4)
                $err_apellidos = "<div class='alert alert-danger'>Numeros maximos de apellidos: 4</div>";
            foreach($tmp_ape as $apellido){
                if (strlen($apellido) < 4)
                    $err_apellidos = "<div class='alert alert-danger'>El apellido debe de tener al menos 4 caracteres</div>";
            }
            $apellidos = $tmp_apellidos;

            // Validación email
            $tmp_email = trim(htmlspecialchars($tmp_email));
            $regex = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';
            if (strlen($tmp_email) == ' ')
                 $err_email = "<div class='alert alert-danger'>Inserta un correo</div>";
            else if (!preg_match($regex, $tmp_email))
                $err_email = "<div class='alert alert-danger'>Inserta un correo válido</div>";
            else if (!filter_var($tmp_email, FILTER_VALIDATE_EMAIL)) // Otra manera
                $err_email = "<div class='alert alert-danger'>Inserta un correo válido</div>";
            else $email = $tmp_email;


            // Validacion password
            $tmp_pass = trim(htmlspecialchars($tmp_pass));
            if ($tmp_pass == ' '){
                $err_pass = "<div class='alert alert-danger'>Inserta una contraseña</div>";
            }
            else if (strlen($tmp_pass) < 3){
                $err_pass = "<div class='alert alert-danger'>La contraseña debe tener al menos 3 caracteres</div>";
            }
            else {
                $pass = $tmp_pass;
            }

            //Validacion tlf
            $tmp_tlf = trim(htmlspecialchars($tmp_tlf));
            $regex = "/^(\+34\s?)?([6|7|8|9]\d{2}[\s-]?\d{2}[\s-]?\d{2}[\s-]?\d{2})$/";
            if ($tmp_tlf == ' '){
                $err_tlf = "<div class='alert alert-danger'>Inserta un telefono</div>";
            }
            else if (strlen($tmp_tlf) < 9){
                $err_tlf = "<div class='alert alert-danger'>El telefono debe tener al menos 3 caracteres</div>";
            }
            else if (!preg_match($regex, $tmp_tlf))
                $err_tlf = "<div class='alert alert-danger'>Formato inválido</div>";
            else {
                $tlf = $tmp_tlf;
            }

            //Validacion direccion
            $tmp_direccion = trim(htmlspecialchars($tmp_direccion));

            $tmp_dir = explode(" ",$tmp_direccion);
            if (strlen($tmp_direccion) == ' ')
                $err_direccion = "<div class='alert alert-danger'>Inserta la direccion</div>";
            else $direccion = $tmp_direccion;
            

            // Validacion CP
            $tmp_cp = trim(htmlspecialchars($tmp_cp));
            if ($tmp_cp == ' ')
                $err_cp = "<div class='alert alert-danger'>Inserta un CP</div>";
            else if (strlen($tmp_cp) !== 5)
                $err_cp = "<div class='alert alert-danger'>El CP debe de tener 5 caracteres</div>";
            else $cp = $tmp_cp;


            // Validacion Ciudad
            $tmp_ciudad = trim(htmlspecialchars($tmp_ciudad));
            if ($tmp_ciudad == ' ')
                $err_ciudad = "<div class='alert alert-danger'>Inserta una Ciudad</div>";
            else $ciudad = $tmp_ciudad;

            //Insertar datos en la bbdd
            if (isset($nombre, $apellidos, $email, $pass, $tlf ,$direccion , $cp, $ciudad, $admin)){
                $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                $fecha = date("Y-m-d h:i:s");

                $query = "INSERT INTO usuarios (nombre, apellidos, email, contrasena, telefono, direccion, codigo_postal, ciudad, admin, fecha_registro)
                VALUES ('$nombre', '$apellidos', '$email', '$hashedPass', '$tlf', '$direccion', '$cp', '$ciudad', $admin, '$fecha')";

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
                </div>
                <div class="mb-3">
                    <label  class="form-label">Apellidos: </label>
                    <input type="text" class="form-control" name="apellidos">
                    <?php if(isset($err_apellidos)) echo $err_apellidos; ?>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Email: </label>
                    <input type="email" class="form-control" name="email">
                    <?php if(isset($err_email)) echo $err_email; ?>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Contraseña: </label>
                    <input type="password" class="form-control" name="pass">
                    <?php if(isset($err_pass)) echo $err_pass; ?>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Telefono: </label>
                    <input type="tlf" class="form-control" name="tlf">
                    <?php if(isset($err_tlf)) echo $err_tlf; ?>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Direccion: </label>
                    <input type="text" class="form-control" name="direccion">
                    <?php if(isset($err_direccion)) echo $err_direccion; ?>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Codigo Postal: </label>
                    <input type="number" class="form-control" name="cp">
                    <?php if(isset($err_cp)) echo $err_cp; ?>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Ciudad: </label>
                    <input type="text" class="form-control" name="ciudad">
                    <?php if(isset($err_ciudad)) echo $err_ciudad; ?>
                </div>
                <div class="mb-3 form-check">
                        <input type="checkbox" name="admin" class="form-check-input">
                        <label class="form-check-label">¿Eres admin?</label>
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