<?php
require_once "includes/config.php";

$sql = "DELETE FROM register WHERE id = '".$_GET['id']."' ";
$res = mysqli_query($conn , $sql);
if (!$res) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}
header("Location: listado_usu.php");