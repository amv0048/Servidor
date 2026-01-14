<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        $tmp_correo = $_POST["correo"];
        $tmp_contrasena = $_POST["contrasena"];

        if($tmp_correo == ""){
            $err_correo = "Introduce un Correo Valido";
        }else{
            $correo = $tmp_correo;
        }

        if($tmp_contrasena == ""){
            $err_contrasena = "Introduce una contraseña";
        }else{
            $contrasena = $tmp_contrasena;
        }

        if(isset($correo) and isset($contrasena)){
            
            $consulta = "SELECT * FROM usuarios WHERE email = '$correo'";
            $resultado = $_conexion -> query($consulta); 
            
            if($resultado -> num_rows === 0){
                echo "<div class='alert alert-danger'> El correo no existe en la base de datos </div>";
            }else{
                $info_correo = $resultado -> fetch_assoc();

                echo "Contraseña Ingresada: $contrasena";
                echo "Hash almacenado: ".$info_correo["contrasena"];
                $verificacion_contrasena = password_verify($contrasena , $info_correo["contrasena"]);

                if(!$verificacion_contrasena){
                    echo "<div class='alert alert-danger'> La contraseña no coincide </div>";
                }else{
                    /**
                     * Que hace session_start()
                     * 
                     * Inicia una nueva sesion o recupera una antigua
                     * crea/lee una cookie llamada PHPESSID
                     * en el navegador del usuario
                     * Carga los datos de la sesion en el servidor
                     * en el array $_SESSION
                     * 
                     * Este session_start() lo usaremos al inicio
                     * de cada pagina que necesita acceder a datos de la sesion
                     *  llamaremos a la funcion antes de enciar cualquier salida html (antes del 
                     *<!DOCTYPE>
                     */

                     /**
                      * un array asociativo que guarda los datos en el servidor y ademas que es persistente en diferentes ficheros mientras la sesion este activa
                      */

                    session_start();
                    //echo $_SESSION["email"];
                     $_SESSION["email"] = $correo;
                     $_SESSION["admin"] = $info_correo["admin"];

                     header("location: ../index.php");
                     exit();
                     
                }

            }
        }

    }
    
    
    
    ?>




    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Correo Electronico</label>
                        <input type="text" name="correo" class="form-control">
                        <?php if(isset($err_correo)) echo $err_correo ?>
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
                        <input type="submit" value="LOGIN" class="btn btn-primary w-100">
                    </div>
                </form>
                <h3 class="text-center mt-4 mb-3">Si no tienes cuenta, registrate...</h3>
                <a href="crearUser.php" class="btn btn-secondary w-100">Registrate</a>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>