<?php

require_once "session_start.php";

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

require_once "config.php";
$query = "SELECT * FROM provincias";
$resultado = mysqli_query($con, $query);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}
$provincias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);



$view = "registro_adoptante";
require_once "views/layout.php";
