<?php

require_once "session_start.php";

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

$view = "inicio_sesion";
require_once "views/layout.php";