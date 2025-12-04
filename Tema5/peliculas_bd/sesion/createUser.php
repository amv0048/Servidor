<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <?php 
        require '/opt/lampp/htdocs/utils/errors.php';
        require 'conexion.php';
    ?>
</head>
<body>
    <?php 
        //El checkbox si esta vacio no se manda ni la clave
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_user = $_POST["usuario"];
            $tmp_pass = $_POST["pass"];
            $admin = isset($_POST["admin"]) ? 1 : 0;

            //Validacion de user: trim + specialchars y replace ' ' por '_'
            $tmp_user = trim(htmlspecialchars($tmp_user));
            $tmp_user = preg_replace("/\s+/", "_", $tmp_user);
            if ($tmp_user == ' '){
                $err_user = "<div class='alert alert-danger'>Inserta un usuario</div>";
            }
            else if (strlen($tmp_user) < 3){
                $err_user = "<div class='alert alert-danger'>El usuario debe tener al menos 3 caracteres</div>";
            }
            else {
                $usuario = $tmp_user;
            }

            //Validacion pass
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

            if (isset($pass) && isset($usuario)){
                $hashedPass = password_hash($pass, PASSWORD_DEFAULT); //Hashea las pass
                $query = "insert into usuarios (usuario, contrasena, admin) values ('$usuario','$hashedPass', '$admin')";

                if($_conexion->query($query)){
                    echo "<div class='alert alert-success'>Usuario registrado correctamente</div>";
                }
                else echo "<div class='alert alert-danger'>No se ha podido registrar el usuario</div>";
            }

        }
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <input type="text" name="usuario" class="form-control">
                        <?php if(isset($err_user)) echo $err_user; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña: </label>
                        <input type="password" name="pass" class="form-control">
                        <?php if(isset($err_pass)) echo $err_pass; ?>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="admin" class="form-check-input">
                        <label class="form-check-label">¿Eres admin?</label>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="registrarse" class="btn btn-primary w-100">
                    </div>
                </form>
                <h3 class="text-center mt-4 mb-3">Si ya tienes cuenta, inicia sesion</h3>
                <a href="login.php" class="btn btn-secondary w-100">Iniciar Sesion</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>