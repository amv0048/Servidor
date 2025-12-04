<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <?php 
        /* require '../../../utils/errors.php'; */
        require 'conexion.php';
    ?>
</head>
<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_user = $_POST["usuario"];
            $pass = $_POST["pass"];

            if ($tmp_user == ''){
                $err_user = "Introduce un usuario";
            }
            else $user = $tmp_user;
            
            if (isset($user) && isset($pass)){
                $query = "select * from usuarios where usuario = '$user'";
                $result = $_conexion->query($query);

                if ($result->num_rows === 0){
                    echo "<div class='alert alert-danger'>El usuario no existe en la base de datos</div>";
                }
                else{
                    $info_user = $result->fetch_assoc();
                    echo "Contraseña ingresada: ".$pass;
                    echo "<br>Hash almacenado ".$info_user["contrasena"];
                    echo password_get_info($info_user["contrasena"]);
                    $passVerify = password_verify($pass, $info_user["contrasena"]);

                    if (!$passVerify){
                        echo "<div class='alert alert-danger'>La contraseña no coincide</div>";
                    }
                    else{
                        /**
                         * session_start() Inicia o una nueva sesion o 
                         * recupera una cookie llamada PHPSESSID en el nav
                         * del user.
                         * 
                         * Carga los datos de la sesion desde el server en el array 
                         * $_SESSION.
                         * 
                         * Este session start lo usaremos al inicio de 
                         * CADA pagina que necesite acceder a datos de la sesion
                         * llamaremos a la funcion antes de enviar cualquier salida
                         * HTML antes del (<!DOCTYPE>).
                         * 
                         * Que es el $_SESSION.
                         * 
                         * es un array asoc que guarda datos en el server, es 
                         * persistente entre diferentes ficheros mientras la sesion
                         * este activa.
                         */
                        session_start();
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["admin"] = $info_user["admin"];
                    }
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
                        <input type="text" name="usuario" class="form-control">
                        <?php if(isset($err_user)) echo $err_user; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña: </label>
                        <input type="password" name="pass" class="form-control">
                        <?php if(isset($err_pass)) echo $err_pass; ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="iniciarSesion" class="btn btn-primary w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>