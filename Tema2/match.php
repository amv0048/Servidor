<?php

/*
$numero = 3;

$result = match ($numero) {
    1 => "Se ha escogido el primero numero",
    2 => "Se ha escogido el segundo numero",
    3 => "Se ha escogido el tercer numero"
};

echo $result."<br><br>";

$dia = "Jueves";

$clases = match($dia){
    "Lunes" => "NO tenemos clase",
    "Martes" => "NO tenemos clase",
    "Miercoles" => "Si",
    "Jueves" => "Si",
    "Viernes" => "Si",
    default => "Fin de Semana"
};

echo $clases."<br><br>";

$numerito = 10;

$esPar = match(true){
    ($numerito == 0) => "Es 0",
    ($numerito % 2 == 0) => "Es par",
    default => "Es impar"
};

echo $esPar."<br><br>";
*/


$n = 10;
$notas = match(true){
    ($n >= 0 && $n < 5) => "Suspenso",
    ($n >= 5 && $n < 7) => "Aprobado",
    ($n >= 7 && $n < 9) => "Notable",
    ($n >= 9 && $n <= 10) => "Genio",
    default => "ERROR"
};

echo $notas;
?>