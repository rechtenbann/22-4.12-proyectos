<?php
require_once "includes/config.php";
$sql = "SELECT * FROM armas  WHERE id = '" . $_GET['id'] . "';";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
$armas = mysqli_fetch_assoc($result);

$section = "vistas/armas2.php";
require_once "vistas/layout.php";
?>