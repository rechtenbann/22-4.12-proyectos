<?php
require_once "includes/config.php";

$con= "SELECT DISTINCT * FROM armas WHERE tipo = 'lanzagranada'; ";
$res= mysqli_query($conn,$con);
if (!$res) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}

$armas = mysqli_fetch_all($res,MYSQLI_ASSOC);
$section = "vistas/arms.php";
require_once "vistas/layout.php";