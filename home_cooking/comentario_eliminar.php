<?php
require_once "config.php";

if($_GET['tipo'] == "comentario"){
    $sql = "DELETE FROM comentarios WHERE id=" . $_GET['comentario_id'];

    if (!mysqli_query($con, $sql)) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
}
else if($_GET['tipo'] == "respuesta"){
    $sql = "DELETE FROM comentario_respuestas WHERE id=" . $_GET['comentario_id'];

    if (!mysqli_query($con, $sql)) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
}
header("Location: detalles_receta.php?location=" . $_GET['location'] . "&id=" . $_GET['comida_id'] . "#" . $_GET['anchor']);

$view = "tabla_recetas";
require_once "views/layout.php";

