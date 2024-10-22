<?php
require_once "includes/config.php";
$sql = "SELECT * FROM informes WHERE id = '" . $_GET['id'] . "';";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
$informes = mysqli_fetch_assoc($result);

$section = "vistas/informes3.php";
require_once "vistas/layout.php";
?>