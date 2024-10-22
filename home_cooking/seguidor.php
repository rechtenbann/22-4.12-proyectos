<?php
require_once('config.php');
require_once('sesion.php');
$seguidor = $_SESSION['usuario_activo']['id'];
$seguido = $_POST['id'];

$cons = "SELECT * FROM seguidores WHERE seguidor_id=" . $seguido . " AND  seguido_id =" . $_SESSION['usuario_activo']['id'];
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant = mysqli_num_rows($resultado);


if ($cant == 1) {
    $cons = "DELETE FROM seguidores WHERE seguidor_id=" . $seguido . " AND  seguido_id =" . $seguidor;
    $query = mysqli_query($con, $cons);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($con);
        die();
    }
} 


if ($cant == 1) {
    
   $seguidor = '<div id="p1perfil-1" class="btn profile-edit-btn perfil-1 eliminado">Eliminado</div>';
} else {
   $seguidor = '<div id="p1perfil-1" class="btn profile-edit-btn perfil-1 eliminado">Eliminado</div>';
}

$return = array("seguidor"=>$seguidor);

echo json_encode($return);