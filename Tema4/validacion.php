<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        error_reporting(E_ALL);
        ini_set("display_errors", true);
    ?>
</head>
<body>
    <p><b>isset()</b> Verifica si una variable 
    está definida y no es NULL</p>
    <p><b>isempty()</b> Devuelve true si no esta definida, 
    tiene valor 0, "", null o es un array vacio</p>

    <?php 
        echo "<h3>Caso 01 isset() y empty() devuelven true</h3>";
        $valor = 0;
        echo "<p>Valor 0</p>";
        echo isset($valor) ? "<p>La variable esta definida y no es null</p>" : "<p>NO definida o null</p>";
        echo !empty($valor) ? "<p>La variable esta vacia o es null</p>" : "<p>Definida correctamente</p>";

        echo "<p>Unsetearmos \$valor";
        unset($valor);
        echo isset($valor) ? "<p>La variable esta definida o es null</p>" : "<p>NO definida o null</p>";
        echo empty($valor) ? "<p>La variable esta vacia o es null</p>" : "<p>Definida correctamente</p>";
    ?>
</body>
</html>