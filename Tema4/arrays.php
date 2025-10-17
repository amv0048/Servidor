<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        //Sacar valores
        foreach($arrayAsoc as $element){
            //echo $element;
        }

        foreach($arrayAsoc as $clave => $element){
            /* echo $clave;
            echo $element; */
        }

        //Formas de introducir elementos en un array indexado
        array_push($array, "Loquesea");
        $array[1] = "Loquesea";
        //Mostrar
        //print_r($array)
        $arrayOrdenado = array_values($array);
        //Borrar dato, no celda
        //unset($array[0]);


        $fruta = array(
            "Mango", "melon", "Sandia"
        );
    ?>

    <ol>
        <?php 
            $i = 0;
            while($i < count($fruta)){

        ?>
        <li>
            <?php echo $fruta[$i];?>
        
        </li>
        <?php 
            $i++;
            }
        ?>
    </ol>

</body>
</html>