<?php
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
    header("location:index.php"); 
  }
$sql = "DELETE FROM venta_de_armas WHERE id_arma = '" . $_GET['id_arma'] . "';";
$res = mysqli_query($conn, $sql);
if (!$res) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
header("Location: divisiones_lista.php?pagina=1");