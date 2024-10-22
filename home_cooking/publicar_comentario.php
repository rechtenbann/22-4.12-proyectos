<?php
require_once "sesion.php";
require_once "config.php";

if(isset($_SESSION['usuario_activo']['id'])){
    $usu = $_SESSION['usuario_activo']['id'];
    $id_comida = $_GET['id'];
    $comentario = $_POST['comentario'];

    $comentario = "INSERT INTO comentarios (usuario_id, comida_id, comentario) VALUES (". $usu .", ". $id_comida .", '". $comentario ."')";

    if (!mysqli_query($con, $comentario)) {
        die("Error consulta: " . mysqli_error($con));
    }
    header("Location:". $_GET['location'] ."?id=" . $id_comida . "#" . $_GET['anchor']);
}
else{
   
}
$view = "home";
require_once "views/layout.php";

?>