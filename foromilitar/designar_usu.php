<?php
require_once "includes/config.php";

$sql="UPDATE register SET rol = 1 WHERE id= '".$_GET['id']."'";
$res= mysqli_query($conn , $sql);
if (!$res) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
header("Location: listado_usu.php");