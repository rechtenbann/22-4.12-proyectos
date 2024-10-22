<?php
require_once('config.php');
require_once('sesion.php');
$seguidor = $_SESSION['usuario_activo']['id'];
$seguido = $_POST['id'];

$cons = "SELECT * FROM seguidores WHERE seguido_id=" . $seguido . " AND  seguidor_id =" . $_SESSION['usuario_activo']['id'];;
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant = mysqli_num_rows($resultado);


if ($cant == 1) {
    $cons = "DELETE FROM seguidores WHERE seguido_id=" . $seguido . " AND  seguidor_id =" . $seguidor;
    $query = mysqli_query($con, $cons);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($con);
        die();
    }
} else {
    $cons = "INSERT INTO seguidores (seguidor_id, seguido_id) VALUES ('$seguidor', '$seguido ')";
    $query = mysqli_query($con, $cons);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($con);
        die();
    }
}


if ($cant == 1) {
    
    $siguiendo = '<div id="p1perfil-1" class="btn profile-edit-btn perfil-1">Seguir</div>';
} else {
    $siguiendo = '<div id="p1perfil-1" class="btn profile-edit-btn perfil-1">Siguiendo</div>';
}

$return = array("siguiendo"=>$siguiendo);

echo json_encode($return);