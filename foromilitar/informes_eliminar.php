<?php
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
    header("location:index.php"); 
  }
$sql = "DELETE FROM informes WHERE id = '" . $_GET['id'] . "';";
$res = mysqli_query($conn, $sql);
if (!$res) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
header("Location: misinformes.php?pagina=1");