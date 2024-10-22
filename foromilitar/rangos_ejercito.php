<?php
require_once "includes/config.php";

$sql = "SELECT rango, Oficial_Suboficial, division FROM rangos WHERE division = '".$_GET['division']."'";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}
$dou = mysqli_fetch_all($res,MYSQLI_ASSOC);



$section = "vistas/rangos_ejercito.php";
require_once "vistas/layout.php";

?>

