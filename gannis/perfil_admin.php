<?php

require_once "session_start.php";

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
else {
    if ($_SESSION['usuario']['rol_id'] != 3) {
        header('Location: index.php');
    }
}

require_once "config.php";
require_once('session_start.php');
$usu = $_SESSION['usuario']['id'];

$consulta = "SELECT usuarios.id, usuarios.nombre, usuarios.telefono , usuarios.mail, provincias.provincia, barrios.barrio FROM usuarios INNER JOIN provincias ON usuarios.provincia_id = provincias.id INNER JOIN barrios ON usuarios.barrio_id = barrios.id WHERE usuarios.id = " . $usu;
$result = mysqli_query($con, $consulta);
if(!$result){
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$usuario = mysqli_fetch_assoc($result) ;




$view = 'perfil_admin';

require_once('views/layout.php');