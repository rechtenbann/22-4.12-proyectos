<?php
require_once('config.php');
require_once('sesion.php');
$comid = $_POST['id'];

$comida = filter_var($comid, FILTER_SANITIZE_NUMBER_INT);
$usu = $_SESSION['usuario_activo']['id'];

$cons = "SELECT * FROM comida_likes WHERE comida_id=" . $comida . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant = mysqli_num_rows($resultado);



if ($cant == 1) {
    $cons = "DELETE FROM comida_likes WHERE comida_id=" . $comida . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $query = mysqli_query($con, $cons);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($con);
        die();
    }
    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $comida;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);
} else {
    $cons = "INSERT INTO comida_likes (comida_id, usuario_id) VALUES ('$comida', '$usu')";
    $query = mysqli_query($con, $cons);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($con);
        die();
    }
    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $comida;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);
}

if ($cant == 1) {

    $tres = '<i class="fa-regular fa-thumbs-up"></i> ' . $cant_like;
} else {
    $tres = '<i class="fa-solid fa-thumbs-up"></i> '. $cant_like;
}

$return = array("tres" => $tres);

echo json_encode($return);
