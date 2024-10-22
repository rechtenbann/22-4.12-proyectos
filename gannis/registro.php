<?php


require_once "session_start.php";

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
else {
    header('Location: index.php');
}

$view = "registro";
require_once "views/layout.php";