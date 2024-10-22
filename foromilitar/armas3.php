<?php
require_once "includes/config.php";
$sql = "SELECT * FROM venta_de_armas WHERE id_arma = '" . $_GET['id_arma'] . "';";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
$armas = mysqli_fetch_assoc($result);

$section = "vistas/armas3.php";
require_once "vistas/layout.php";
?>