<?php 
    $cadena = "2hola123";
    if (preg_match("/^\d/", $cadena)) echo "La cadena tiene numeritos";
    else "La cadena NO tiene numeritos";

    $cadena = "Hola";
    if (preg_match("/\w/", $cadena)) echo "La cadena tiene char alfanumericos";
    echo "La cadena NO tiene char alfanumericos";

    $cadena = "Hola que tal";
    if (preg_match("/\s{2}/", $cadena)) echo "La cadena tiene 2 espacios";
    else echo "La cadena NO tiene 2 espacios";

    $cadena = "1234Hola";
    if (preg_match("/^\d{4}/", $cadena)) echo "La cadena tiene 4 digitos al inicio";
     
?>