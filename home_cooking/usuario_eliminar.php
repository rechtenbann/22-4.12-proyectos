<?php
require_once ("config.php");
//BORRAR USUARIO
$sql = "DELETE FROM `usuarios` WHERE id = ". $_GET['id'];
$consulta = mysqli_query($con, $sql);
 
if (!$consulta) {
    die('Error de Consulta: ' . mysqli_errno($con));
}
 //BORRAR RECETA
$sql = "DELETE FROM comidas WHERE usuario_id = ". $_GET['id'];
$consulta = mysqli_query($con, $sql);
 
if (!$consulta) {
    die('Error de Consulta: ' . mysqli_errno($con));
}
 //BORRAR COMENTARIO
$sql = "DELETE FROM comentarios WHERE usuario_id = ". $_GET['id'];
$consulta = mysqli_query($con, $sql);
 
if (!$consulta) {
    die('Error de Consulta: ' . mysqli_errno($con));
}
 
header ("Location: tabla_de_usuarios.php");

$view = "tabla_usuario";
require_once "views/layout.php";

?>

