<?php
require_once "includes/config.php";

$con= "SELECT DISTINCT * FROM register INNER JOIN roles ON roles.id_rol = register.rol WHERE rol=2; ";
$res= mysqli_query($conn,$con);
if (!$res) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}

$usu = mysqli_fetch_all($res,MYSQLI_ASSOC);

$section = "vistas/listado_usu.php";
require_once "vistas/layout.php";