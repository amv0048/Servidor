<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <?php 
require '/opt/lampp/htdocs/utils/errors.php';
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $tmp_user = trim(htmlspecialchars($_POST["user"]));
    $tmp_user = preg_replace("/\s+/", "_", $tmp_user);

    if ($tmp_user == "" || strlen($tmp_user) < 3){
        $err_user = "<div class='alert alert-danger'>Usuario inválido</div>";
    } else {
        $user = $tmp_user;
    }

    $tmp_apellidos = trim(htmlspecialchars($_POST["apellidos"]));
    $tmp_apellidos = preg_replace("/\s+/", "_", $tmp_apellidos);

    if ($tmp_apellidos == "" || strlen($tmp_apellidos) < 3){
        $err_apellidos = "<div class='alert alert-danger'>Usuario inválido</div>";
    } else {
        $apellidos = $tmp_apellidos;
    }

    $tmp_pass = trim(htmlspecialchars($_POST["pass"]));
    if ($tmp_pass == "" || strlen($tmp_pass) < 3){
        $err_pass = "<div class='alert alert-danger'>Contraseña inválida</div>";
    } else {
        $pass = $tmp_pass;
    }

    $tmp_tlf = trim(htmlspecialchars($_POST["telefono"]));
    if (!preg_match('/^[67][0-9]{8}$/', $tmp_tlf)){
        $err_tlf = "<div class='alert alert-danger'>Teléfono inválido</div>";
    } else {
        $tlf = $tmp_tlf;
    }

    $tmp_email = trim(htmlspecialchars($_POST["email"]));
    if (!preg_match('/^[\w.\-]+@[\w\-]+\.[A-Za-z]{2,}$/', $tmp_email)){
        $err_email = "<div class='alert alert-danger'>Email inválido</div>";
    } else {
        $email = $tmp_email;
    }

    $tmp_cP = trim(htmlspecialchars($_POST["cP"]));
    if (!preg_match('/^[0-9]{5}$/', $tmp_cP)){
        $err_cP = "<div class='alert alert-danger'>Código postal inválido</div>";
    } else {
        $cP = $tmp_cP;
    }

    $tmp_direccion = trim(htmlspecialchars($_POST["direccion"]));
    if ($tmp_direccion == ""){
        $err_direccion = "<div class='alert alert-danger'>Dirección inválida</div>";
    } else {
        $direccion = $tmp_direccion;
    }

    $admin = isset($_POST["admin"]) ? 1 : 0;

    if (isset($user) && isset($pass) && isset($email) && isset($tlf) && isset($cP) && isset($direccion)){
        
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios 
            (usuario, contrasena, email, telefono, codigo_postal, direccion, ciudad, calle, admin)
            VALUES 
            ('$usuario', '$hashedPass', '$email', '$tlf', '$cP', '$direccion', '$tmp_ciudad', '$tmp_calle', '$admin')";

        if($_conexion->query($query)){
            echo "<div class='alert alert-success'>Usuario registrado correctamente</div>";
        } else {
            echo "<div class='alert alert-danger'>Error en el registro</div>";
        }
    }
}
?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <input type="text" name="user" class="form-control">
                        <?php if(isset($tmp_user)) echo $err_user; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" name="apellidos" class="form-control">
                        <?php if(isset($tmp_apellidos)) echo $err_apellidos; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña: </label>
                        <input type="password" name="pass" class="form-control">
                        <?php if(isset($err_pass)) echo $err_pass; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="text" name="email" class="form-control">
                        <?php if(isset($err_tlf)) echo $err_tlf; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Codigo Postal: </label>
                        <input type="text" name="cP" class="form-control">
                        <?php if(isset($err_cP)) echo $err_cP; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="text" name="email" class="form-control">
                        <?php if(isset($err_email)) echo $err_email; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" name="direccion" class="form-control">
                        <?php if(isset($err_direccion)) echo $err_direccion; ?>
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