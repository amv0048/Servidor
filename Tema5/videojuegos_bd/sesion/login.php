<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<?php 
    require 'conexion.php';
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>
<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_user = $_POST["usuario"];
            $tmp_pass = $_POST["pass"];

            if ($tmp_user == '')
                $err_user = "Introduce un usuario";
            else $user = $tmp_user;

            if ($tmp_pass == '')
                $err_pass = "Introduce una contraseña";
            else $pass = $tmp_pass;
            

            if (isset($user) && isset($pass)){
                $query = "SELECT * FROM usuarios WHERE usuario = '$user'";
                $result = $_conexion->query($query);

                if ($result->num_rows === 0){
                    echo "<div class='alert alert-danger'>El usuario no existe en la base de datos</div>";
                }
                else{
                    $info_user = $result->fetch_assoc();
                    
                    echo "Contraseña ingresada: ".$pass;
                    echo "<br>Hash almacenado ".$info_user["contrasena"];
                    $passVerify = password_verify($pass, $info_user["contrasena"]);

                    if (!$passVerify){
                        echo "<div class='alert alert-danger'>La contraseña no coincide</div>";
                    } 
                    else{
                        echo "<div class='alert alert-secondary'>TODO OK</div>";
                        session_start();
                        $_SESSION["user"] = $user;
                        $_SESSION["admin"] = $info_user["admin"];
                        header("location: ../index.php");
                        exit();    
                    }
                }
            }
            else{
                echo "<div class='alert alert-danger'>Pass o user no seteados</div>";
            }
            

        }
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Usuario: </label>
                        <input type="text" class="form-control" name="usuario">
                        <?php if (isset($err_user)) echo $err_user; ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" name="pass">
                        <?php if (isset($err_pass)) echo $err_pass; ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="iniciar Sesion" class="btn btn-primary w-100">
                        <h4>No tienes cuenta aun?</h4>
                        <a href="signIn.php">Crear cuenta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>