<?php
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
    header("location:index.php"); 
  }
$con= "SELECT DISTINCT * FROM inscripciones";
$res= mysqli_query($conn,$con);
if (!$res) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}

$usu = mysqli_fetch_all($res,MYSQLI_ASSOC);

$section = "vistas/inscripciones_usu.php";
require_once "vistas/layout.php";