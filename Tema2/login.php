<?php 
    function login($user, $pass) :string{
        $admin = "admin";
        $adminPass = "123";
        $client = "client";
        $clientPass = "321";

        $user = trim($user);
        
        $log = match (true){
            $pass === "" || $user === "" => "Faltan credenciales",
            ($user != $client &&
             $user != $admin) ||
              ($pass != $adminPass &&
                $pass != $clientPass) => "Usuario o contraseña no valido",
            $user == $admin && $pass == $adminPass => "Bienvenido Admin",
            default => "Bienvenido client"
        };
        return $log;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="login.php">
    Usuario: <input type="text" name="user"> <br>
    Contraseña: <input type="password" name="passw"> <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = $_POST["user"];
        $pass = $_POST["passw"];
    }
    echo "<h3>". login($user, $pass)."</h3>";
?>