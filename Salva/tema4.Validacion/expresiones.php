<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    error_reporting((E_ALL));
    ini_set("display_errors", 1);
    ?>
</head>
<body>




    <?php 
    /**
     *  /patron/ : es el patron de la expresion regular
     * 
     * PATRONES COMUNES
     * 
     * 
     * \d : Un digito del 0 al 9
     * \w : Un caracter alfanumerico (letras, num y _)
     * \s : Un espacio en blanco
     * . : Cualquier caracter exceptuando el salto de linea
     * 
     * CARDINALIDADES
     * 
     *  + : Uno o mas de la expresion anterior 
     * (EJ: \d+ es uno o mas digitos)
     *  * : Cero o mas de la expresion anterior
     *  ^ : Comienza con algo en especifico
     *  $ : Termina con
     * 
     * 
     * [] : Define un conjunto de caracteres que puede coincidir con cualquiera
     *      de los caracteres que estan dentro del conjunto
     * 
     * {} : Para la cardinalidad, se repite el patron anterior n-veces
     * (EJ: {5} Se sepetira 5 veces el patron anterior)
     * (EJ: {8,10} Se repetira de 8 a 10 veces)
     * (EJ: {8,} Se repetira 8 o mas veces)
     * (EJ: {,8} Se repetira 8 o menos veces)
     * 
     * BUSQUEDA ANTICIPADA
     * (?=.*): es una expresion de busqueda anticipada positiva que verifica
     *         que la condicion dentro de los parentesisi este presente en 
     *         algun lugar de la cadena
     * 
     * 
     */
    $cadena = "hola123";
    // si dentro de cadena existe el patron => true, sino => false
    if(preg_match("/\d/" , $cadena)) echo "la cadena tiene numeritos";
    else echo "no tiene numeritos";

    echo "<br>";
    $cadena = "asfd";
    if(preg_match("/\w/" , $cadena)) echo "la cadena tiene alfanumeria";
    else echo "no tiene alfanumericos";

    echo "<br>";
    $cadena = "hola buenas tardes";
    if(preg_match("/\s/" , $cadena)) echo "la cadena tiene espacios";
    else echo "no tiene espacios";


    echo "<br>";
    $cadena = "1234nose";
    if(preg_match("/^\d{4}/" , $cadena)) echo "la cadena tiene 4 num al start";
    else echo "no tiene 4 num al start";

    echo "<br>";
    $cadena = "Hola123";
    /**
     * Primer requisito : que haya una mayuscula (?=.*[A-Z])
     * Segundo requisito : que haya una minuscula (?=.*[a-z])
     * 
     */

    if(preg_match("/(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9]{8}/", $cadena))


    ?>



    
</body>
</html>