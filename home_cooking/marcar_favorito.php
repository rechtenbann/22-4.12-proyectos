<?php
require_once('config.php');
$link = $_GET['location'];
$usu_id = $_GET['usu_id'];

$favorito = "INSERT INTO favoritos (comida_id, usuario_id) VALUES (". $_GET['id'] .", ". $usu_id .")";

if (!mysqli_query($con, $favorito)) {
    die("Error consulta: " . mysqli_error($con));
}

if($_GET['location'] == "detalles_receta.php"){
    header('Location:'. $_GET['location'] . "?id=".$_GET['id'] . "&location=index.php");
}
else{
    header('Location:'. $_GET['location']);
}

$view = "home";
require_once "views/layout.php";

?>