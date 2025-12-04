<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        require '/opt/lampp/htdocs/utils/errors.php';
        errors();
        require 'sesion/conexion.php';
    ?>
    <style>
        table{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        td{
            border: 1px solid black;
            padding: 5px;
        }
        th{
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php 
        $query = "select * from peliculas";
        $result = $_conexion->query($query);
        /**
         * En result guardamos un objeto mysqli result
         * incluye todas las filas devueltas por el select
         * y mantiene un puntero interno a la siguiente fila por leer
         **/ 

        //var_dump($result);
        //Para iterar result -> fetch_assoc() o fetch_all()
        /* while($row = $result->fetch_assoc()){
            echo "<pre>";
                print_r($row);
            echo "</pre>";
        } */

        
        echo "<table>";

$header = false;
while($row = $result->fetch_assoc()){
    if (!$header){
        echo "<tr>";
        foreach (['titulo','nombre_estudio','anno_estreno','num_temporadas'] as $head) {
            echo "<th>$head</th>";
        }
        echo "</tr>";
        $header = true;
    }
    
   if ($row['num_temporadas'] != 2){
       echo "<tr>";
            echo "<td>{$row['titulo']}</td>";
            echo "<td>{$row['nombre_estudio']}</td>";
            echo "<td>{$row['anno_estreno']}</td>"; 
            echo "<td>{$row['num_temporadas']}</td>";
       echo "</tr>";
    }
}

    echo "</table>";

?>
</body>
</html>