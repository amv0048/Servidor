<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p><b>isset()</b> verifica si una variable esta definida o no es NULL</p>
    <p><b>empty()</b> da true si la variable es 0, null, vacia o no definida, o array vacio </p>



    <?php 
        $valor = 0;

        if(isset($valor)) echo "esta setted";
        echo "<br>";

        if(empty($valor)) echo "esta empty";
    
    ?> 



    
</body>
</html>