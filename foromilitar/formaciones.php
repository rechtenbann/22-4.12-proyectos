<?php
require_once "includes/config.php";

$sql = "SELECT * FROM grup_conform_ffaa WHERE id = '".$_GET['id']."';";


$res = mysqli_query($conn, $sql);

if (!$res) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}

$grupos = mysqli_fetch_all($res,MYSQLI_ASSOC);

$section = "vistas/formaciones.php";
require_once "vistas/layout.php";
?>