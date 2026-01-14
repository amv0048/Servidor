<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    ?>
    <style>
        .error{
            color: red;
        }
        .success{
            color: green;
        }
    </style>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Validacion de numero entero
        if(filter_var($_POST["entero"],FILTER_VALIDATE_INT)){
            $entero = "<span class='success'>El valor ingresado es un número entero</span>";
        }else{
            $entero = "<span class='error'>El valor ingresado no es un número entero</span>";
        }
        //Validacion de numero decimal
        if(filter_var($_POST["decimal"],FILTER_VALIDATE_FLOAT)){
            $decimal = "<span class='success'>El valor ingresado es un número decimal</span>";
        }else{
            $decimal = "<span class='error'>El valor ingresado no es un número decimal</span>";
        }
        //Validacion de email
        if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            $email = "<span class='success'>El valor ingresado es un correo valido</span>";
        }else{
            $email = "<span class='error'>El valor ingresado no es un correo valido</span>";
        }
        //Validacion de URL
        if(filter_var($_POST["url"],FILTER_VALIDATE_URL)){
            $url = "<span class='success'>El valor ingresado es una URL valido</span>";
        }else{
            $url = "<span class='error'>El valor ingresado no es una URL valido</span>";
        }
        //Validacion de IP
        if(filter_var($_POST["ip"],FILTER_VALIDATE_IP)){
            $ip = "<span class='success'>El valor ingresado es una IP valida</span>";
        }else{
            $ip = "<span class='error'>El valor ingresado no es una IP valida</span>";
        }
        //Validacion de domain
        if(filter_var($_POST["domain"],FILTER_VALIDATE_DOMAIN)){
            $domain = "<span class='success'>El valor ingresado es un Domain valido</span>";
        }else{
            $domain = "<span class='error'>El valor ingresado no es un Domain valido</span>";
        }
        //Validacion de boolean
        if(filter_var($_POST["boolean"],FILTER_VALIDATE_BOOLEAN)){
            $boolean = "<span class='success'>El valor ingresado es un Boolean valido</span>";
        }else{
            $boolean = "<span class='error'>El valor ingresado no es un Boolean valido</span>";
        }
        //Validacion de mac
        if(filter_var($_POST["mac"],FILTER_VALIDATE_MAC)){
            $mac = "<span class='success'>El valor ingresado es una Mac valida</span>";
        }else{
            $mac = "<span class='error'>El valor ingresado no es una Mac valida</span>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="entero">Introduzca un número entero válido</label>
        <input type="text" name="entero">
        <?php echo $entero;?>
        <br><br>

        <label for="decimal">Introduzca un número decimañ válido</label>
        <input type="text" name="decimal">
        <?php echo $decimal;?>
        <br><br>

        <label for="email">Introduzca un correo electronicó válido</label>
        <input type="text" name="email">
        <?php echo $email;?>
        <br><br>
        
        <label for="url">Introduzca un número URL válido</label>
        <input type="text" name="url">
        <?php echo $url;?>
        <br><br>

        <label for="ip">Introduzca una IP válida</label>
        <input type="text" name="ip">
        <?php echo $ip;?>
        <br><br>

        <label for="domain">Introduzca un Domain válido</label>
        <input type="text" name="domain">
        <?php echo $domain;?>
        <br><br>

        <label for="boolean">Introduzca un Booleano válido</label>
        <input type="text" name="boolean">
        <?php echo $boolean;?>
        <br><br>

        <label for="mac">Introduzca una Mac válida</label>
        <input type="text" name="mac">
        <?php echo $mac;?>
        <br><br>
        <input type="submit" value="Validar">
    </form>
</body>
</html>