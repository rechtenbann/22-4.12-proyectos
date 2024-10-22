<?php
require_once("config.php");
$id = $_GET['usuario_id'];

$cons = "SELECT * FROM rango_usuarios WHERE usuario_id=" . $id;
$resultado = mysqli_query($con, $cons);

if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$usuario =  mysqli_fetch_assoc($resultado);
if ($usuario['rango_id'] == 2) {

    $cons = "UPDATE rango_usuarios SET rango_id=1 WHERE usuario_id=" . $id;
    $resultado = mysqli_query($con, $cons);

    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    header('location: tabla_de_usuarios.php');
} else {
    $cons = "UPDATE rango_usuarios SET rango_id=2 WHERE usuario_id=" . $id;
    $resultado = mysqli_query($con, $cons);

    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    header('location: tabla_de_usuarios.php');
}



$view = "tabla_usuario";