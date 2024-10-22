<?php
require_once "config.php";

$consulta = "SELECT * FROM paises";
$resultado = mysqli_query($con, $consulta);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

if (isset($_POST['nombre'])) {
    $sql = "UPDATE usuarios SET 
            nombre_usuario = '" . $_POST['nombre_usuario'] . "',
            nombre = '" . $_POST['nombre'] . "', 
            genero = '" . $_POST['genero'] . "', 
            mail = '" . $_POST['mail'] . "'
            WHERE id = " . $_GET['usuario_id'];
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    header("location: index.php");
}

$sql = "SELECT * FROM paises";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}
// Fetch all
$paises = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT * FROM usuarios WHERE id = " . $_GET['usuario_id'];
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}
$usuario = mysqli_fetch_assoc($result);

$view = "usuario_modificar";
require_once "views/layout.php";
