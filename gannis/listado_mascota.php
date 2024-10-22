<?php

require_once "session_start.php";

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
else {
    if ($_SESSION['usuario']['rol_id'] != 3) {
        header('Location: perfil_org.php');
    }
}

require_once "config.php";

$sql = "SELECT * FROM mascotas";
$result = mysqli_query($con, $sql);
if(!$result){
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant_total = mysqli_num_rows($result);

$pag = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$desde = CANT_REG_PAG * ($pag - 1);

$por_pag = CANT_REG_PAG;

$sql = "SELECT * FROM mascotas LIMIT $desde,$por_pag";
$result = mysqli_query($con, $sql);
if(!$result){
    echo "Fallo consulta: " . mysqli_error($con);
}

$mascotas = mysqli_fetch_all($result, MYSQLI_ASSOC);

$cant_pag = ceil($cant_total/CANT_REG_PAG);


$view = "listado_mascota";
require_once "views/layout.php";

