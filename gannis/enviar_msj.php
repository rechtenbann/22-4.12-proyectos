<?php
require_once('session_start.php');
require_once('config.php');

$mas = $_POST['mascota'];
$tel = $_POST['telefono'];
$usu = $_SESSION['usuario']['id'];
$msj = $_POST['mensaje'];

$sql = "INSERT INTO mensajes(mensaje, usuario_id, mascota_id) VALUES('$msj', '$usu', '$mas')";
$res = mysqli_query($con, $sql);

$sql = "UPDATE usuarios SET telefono='$tel' WHERE id=$usu";
$res = mysqli_query($con, $sql);

header("location: index.php");