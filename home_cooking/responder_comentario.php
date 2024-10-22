<?php
require_once "sesion.php";
require_once "config.php";

if(isset($_SESSION['usuario_activo']['id'])){
    $id_principal = $_GET['id'];
    $id_comida = $_GET['id_comida'];
    $comentario = $_POST['comentario'];
    $usu_id = $_SESSION['usuario_activo']['id'];

    $comentario = "INSERT INTO comentario_respuestas(comentario_id, usuario_id, comentario) VALUES ('". $id_principal . "', '". $usu_id ."', '". $comentario . "')";

    if (!mysqli_query($con, $comentario)) {
        die("Error consulta: " . mysqli_error($con));
    }
    header("Location:". $_GET['location'] ."?id=" . $id_comida);
}
else{

}

$view = "home";
require_once "views/layout.php";

?>