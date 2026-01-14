<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_precio = $_POST["precio"];
        $tmp_iva = $_POST["iva"];

        if($tmp_precio == ""){
            $err_precio = "Error, debes introducir un precio.";
        }elseif($tmp_precio < 0){
            $err_precio = "El precio debe ser mayor que 0";
        }else{
            $precio = $tmp_precio;
        }

        if($tmp_iva == ""){
            $err_iva = "Debe elegir un tipo de IVA";
        }else{
            $iva = $tmp_iva;
        }




    }
    
    
    ?>



    <form action="" method="POST">

    <label for="precio">PRECIO: </label>
    <input type="number" name="precio"><?php if(isset($err_precio)) echo " <br> Debe introducir un precio";?><br>
    <select name="iva" id="">
        <option selected disabled>ELIGE EL TIPO DE IVA</option>
        <option value="0.21">GENERAL</option>
        <option value="0.10">REDUCIDO</option>
        <option value="0.04">SUPERREDUCIDO</option><br><br>
        
    </select>
    <?php 
    if(isset($err_iva)) echo " <br> Debes meter un IVA <br> ";
    ?>
    <input type="submit" value="CALCULAR">

    </form>


    <?php 

    if(isset($precio) and isset($iva)){
        $totaliva = doubleval($iva)*$precio;
        echo $precio+$totaliva;
    }

    
    
    
    
    ?>



    
</body>
</html>