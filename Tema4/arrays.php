<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php 
        //Sacar valores
        /* foreach($arrayAsoc as $element){
            //echo $element;
        } 

        /* foreach($arrayAsoc as $clave => $element){
            /* echo $clave;
            echo $element;
        }
            */
        //Formas de introducir elementos en un array indexado
        /* array_push($array, "Loquesea");
        $array[1] = "Loquesea"; */
        //Mostrar
        //print_r($array)
        /* $arrayOrdenado = array_values($array); */
        //Borrar dato, no celda
        //unset($array[0]);


        /* $fruta = array(
            "Mango", "melon", "Sandia"
        ); */
    ?>

   <!--  <ol>
        <?php /*
            $i = 0;
            while($i < count($fruta)){

        ?>
        <li>
            <?php echo $fruta[$i];?>
        
        </li>tr background-color="<?php echo $color;?>">
        <?php 
            $i++;
            }
        */?>
    </ol> -->

    <?php 
        $personas = array("3121E" => "Luis",
        "8934G" => "Marcos",
        "6443C" => "Rocio",
        "1992F" => "Javi",
        "5120U" => "Alberto");

        /* foreach($personas as $dni => $nombre){
            echo $dni .": ".$nombre."<br>"; 
        } */
        
    
    ?>

    <table border="1px solid black" border-collapse="collapse">
        <thead>
            <tr>
                <td>Dni</td>
                <td>Nombre</td>
            </tr>
        </thead>
        <?php 
            foreach($personas as $dni => $nombre){
        ?>
        <tr>
            <td border="1px solid black">
                <?php echo $dni; ?>
            </td>
            <td>
                <?php echo $nombre;
                    }?>
            </td>
        </tr>
    </table>

    <?php 

       /*  print_r($personas);
        echo "<br>";

        print_r($personas["6443C"]);
        echo "<br>";

        foreach($personas as $dni => $nombre){
            echo $dni .": ".$nombre."<br>"; 
        }

        array_push($personas, "Inmigrante");
        echo "<br>";

        foreach($personas as $dni => $nombre){
            echo $dni .": ".$nombre."<br>"; 
        }

         */
        /*
        Ordena alfabeticamente en orden asc, reset clave por posicion
            sort($personas);
        ReverseSort
            rsort($personas);
        Ordena ascendentemente manteniendo clave
            asort()
        Asort reverse
            arsort();
        Ordena por clave ascendentemente
            ksort();
        ksort reverse
            krsort();
        */
                
        $alumnos = array("Laura" => 8,
        "Javi" => 6,
        "Salva" => 7,
        "Juan" => 2,
        "Mairon" => 4,
        "Manu" => 6,
        "Ale" => 10,
        "Maria" => 9);


        echo "<br><br>";
        
    ?>
    <table border="1px solid black" border-collapse="collapse">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Nota</td>
                <td>Nota String</td>
            </tr>
        </thead>
        <?php 
            $color = "";
            $notaS = "";
            foreach($alumnos as $nombre => $nota){
        ?>
            <?php 

                switch($nota){
                    case $nota < 5: 
                        $color = "red";
                        $notaS = "SUSP";
                        break;
                    case $nota < 7:
                        $color = "orange";
                        $notaS = "BN";
                        break;
                    case $nota < 9:
                        $color = "green";
                        $notaS = "NT";
                        break;
                    case $nota > 8:
                        $color = "blue";
                        $notaS = "SB";
                        break;
                }?>

                <tr style="background-color:<?php echo $color;?>">
                    <?php 
                    echo "<td>".$nombre."</td>";
                    echo "<td>".$nota."</td>";
                    echo "<td>".$notaS."</td>";
                    }
                    ?>
                </tr>
    </table>
</body>
</html>