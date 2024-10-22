<?php
require_once('config.php');

$eliminar = "DELETE FROM favoritos WHERE comida_id = " . $_GET['id'];

if (!mysqli_query($con, $eliminar)) {
    die("Error consulta: " . mysqli_error($con));
}
header('Location: favoritos.php');

$view = "tabla_favoritos";
require_once "views/layout.php";

?>