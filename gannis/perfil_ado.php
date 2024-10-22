<?php

require_once "session_start.php";
require_once "config.php";
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    if ($_SESSION['usuario']['rol_id'] < 1) {
        header('Location: index.php');
    }
}





if (isset($_GET['id'])) {
    $usu = $_GET['id'];
} else if ($_SESSION['usuario']['id']) {
    $usu = $_SESSION['usuario']['id'];
}



$consulta = "SELECT usuarios.id, usuarios.nombre, usuarios.edad, usuarios.cumpleanios , usuarios.mail, provincias.provincia, barrios.barrio FROM usuarios INNER JOIN provincias ON usuarios.provincia_id = provincias.id INNER JOIN barrios ON usuarios.barrio_id = barrios.id WHERE usuarios.id = " . $usu;
$result = mysqli_query($con, $consulta);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$usuario = mysqli_fetch_assoc($result);





$view = 'perfil_ado';

require_once('views/layout.php');
