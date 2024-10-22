<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fecha = strval($_POST["fecha"]);

$YMD = explode("-",$fecha);


$anio = $YMD[0];
$mes = $YMD[1];
$dia = $YMD[2];

$anios = date("Y") - $anio;
echo $anios;