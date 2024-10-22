<?php

require_once "session_start.php";

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
else {
    if ($_SESSION['usuario']['rol_id'] != 2) {
        header('Location: index.php');
    }
}

$view = "registro_mascota";
require_once "views/layout.php";