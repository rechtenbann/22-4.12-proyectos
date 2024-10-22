<?php require_once "sesion.php";
require_once "config.php";
$usu = $_SESSION['usuario_activo']['id'];
$link = $_GET['location'];

if (isset($_GET['id'])) {
    $comida = $_GET['id'];
} else if ($_GET['id_nue']) {
    $comida = $_GET['id_nue'];
}

$cons = "SELECT * FROM comida_likes WHERE comida_id=" . $comida . " AND  usuario_id =" . $usu;
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant = mysqli_num_rows($resultado);

if ($cant == 0) {
    $query = "INSERT INTO comida_likes (comida_id, usuario_id) VALUES (" . $comida . ", " . $usu . ")";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $query2 = "UPDATE comidas SET likes = likes + 1 WHERE id =" . $comida;
    $result = mysqli_query($con, $query2);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

} else if ($cant == 1) {
    $query = "DELETE FROM comida_likes WHERE comida_id=" . $comida . " AND  usuario_id =" . $usu;
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $query2 = "UPDATE comidas SET likes = likes - 1 WHERE id =" . $comida;
    $result = mysqli_query($con, $query2);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
}

header('Location:' . $link);
$view = "home";
require_once "views/layout.php";
