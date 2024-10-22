<?php
require_once "includes/config.php";

$sql = "SELECT * FROM armas";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}

$armas = mysqli_fetch_all($res,MYSQLI_ASSOC);

$section = "vistas/arms.php";
require_once "vistas/layout.php";
?>