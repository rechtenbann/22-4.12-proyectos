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


$sql = "SELECT usuarios.id, usuarios.provincia_id, usuarios.barrio_id, rol_usuarios.rol_id, usuarios.nombre, usuarios.mail, usuarios.telefono, usuarios.cumpleanios, usuarios.edad, usuarios.fecha_alta FROM usuarios INNER JOIN rol_usuarios ON usuarios.id = rol_usuarios.usuario_id WHERE rol_usuarios.rol_id = 2";
$result = mysqli_query($con, $sql);
if(!$result){
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant_total = mysqli_num_rows($result);

$pag = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$desde = CANT_REG_PAG * ($pag - 1);

$por_pag = CANT_REG_PAG;

$sql = "SELECT usuarios.id, usuarios.provincia_id, usuarios.barrio_id, rol_usuarios.rol_id, usuarios.nombre, usuarios.mail, usuarios.telefono, usuarios.cumpleanios, usuarios.edad, usuarios.fecha_alta FROM usuarios INNER JOIN rol_usuarios ON usuarios.id = rol_usuarios.usuario_id WHERE rol_usuarios.rol_id = 2 LIMIT $desde,$por_pag";
$result = mysqli_query($con, $sql);
if(!$result){
    echo "Fallo consulta: " . mysqli_error($con);
}

$organizaciones = mysqli_fetch_all($result, MYSQLI_ASSOC);

$cant_pag = ceil($cant_total/CANT_REG_PAG);


$view = "listado_organizaciones";
require_once "views/layout.php";
