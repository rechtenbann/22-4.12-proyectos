<?php
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
    header("location:index.php"); 
  }
$sql="UPDATE register SET rol = 3 WHERE id= '".$_GET['id']."'";
$res= mysqli_query($conn , $sql);
if (!$res) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
header("Location: listado_usu.php");