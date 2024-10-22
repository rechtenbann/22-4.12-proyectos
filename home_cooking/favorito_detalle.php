<?php
require_once('config.php');
require_once('sesion.php');
$comid = $_POST['id'];

$comida = filter_var($comid, FILTER_SANITIZE_NUMBER_INT);

$usu = $_SESSION['usuario_activo']['id'];

$cons = "SELECT DISTINCT * FROM favoritos WHERE comida_id=" . $comida . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant = mysqli_num_rows($resultado);

if ($cant == 1) {
    $cons = "DELETE FROM favoritos WHERE comida_id=" . $comida . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $query = mysqli_query($con, $cons);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($con);
        die();
    }
} else {
    $cons = "INSERT INTO favoritos (comida_id, usuario_id) VALUES ('$comida', '$usu')";
    $query = mysqli_query($con, $cons);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($con);
        die();
    }
}

if ($cant == 1) {
    $favorito = '<i id="ld" class="fa-regular fa-star"></i>';
} else {
    $favorito = '<i id="ld" class="fa-solid fa-star"></i>';
}

$returnn = array("favorito" => $favorito);

echo json_encode($returnn);
