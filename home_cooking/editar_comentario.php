<?php
require_once "sesion.php";
require_once "config.php";

if(isset($_SESSION['usuario_activo']['id'])){
    if($_GET['tipo'] == "comentario"){
        $id = $_GET['id'];
        $id_comida = $_GET['id_comida'];
        $comentario = $_POST['comentario'];

        $comentario = "UPDATE comentarios SET comentario = '" . $comentario . "' WHERE id = " . $id;

        if (!mysqli_query($con, $comentario)) {
            die("Error consulta: " . mysqli_error($con));
        }
        header("Location:". $_GET['location'] ."?id=" . $id_comida . "#" . $_GET ['anchor']);
    }
    else if($_GET['tipo'] == "respuesta"){
        $id = $_GET['id'];
        $id_comida = $_GET['id_comida'];
        $comentario = $_POST['comentario'];

        $comentario = "UPDATE comentario_respuestas SET comentario = '" . $comentario . "' WHERE id = " . $id;

        if (!mysqli_query($con, $comentario)) {
            die("Error consulta: " . mysqli_error($con));
        }
        header("Location:". $_GET['location'] ."?id=" . $id_comida . "#" . $_GET ['anchor']);
    }
}
else{
    echo '<script>alert("Se requiere tener una sesion abierta para comentar.");
    window.location.href="inicio_sesion.php";</script>';
}

$view = "home";
require_once "views/layout.php";

?>