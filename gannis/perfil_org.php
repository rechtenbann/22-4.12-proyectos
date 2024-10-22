<?php

require_once "session_start.php";

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
else {
    if ($_SESSION['usuario']['rol_id'] < 2) {
        header('Location: index.php');
    }
}

require_once "config.php";
require_once('session_start.php');

if (isset($_GET['id'])) {
    $usu = $_GET['id'];
} else {
    $usu = $_SESSION['usuario']['id'];
}

$consulta = "SELECT usuarios.id, usuarios.nombre, usuarios.telefono , usuarios.mail, provincias.provincia, barrios.barrio FROM usuarios INNER JOIN provincias ON usuarios.provincia_id = provincias.id INNER JOIN barrios ON usuarios.barrio_id = barrios.id WHERE usuarios.id = " . $usu;
$result = mysqli_query($con, $consulta);
if(!$result){
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$usuario = mysqli_fetch_assoc($result) ;

$sql = "SELECT mascotas.nombre, mascotas.id, mascotas.edad, mascotas.sexo
        FROM mascotas 
        INNER JOIN mascotas_organizaciones 
        ON mascotas.id = mascotas_organizaciones.mascota_id 
        INNER JOIN usuarios 
        ON mascotas_organizaciones.usuario_id = usuarios.id 
        WHERE usuarios.id =" . $usu;

$res = mysqli_query($con, $sql);

if (!$res) {
    echo "Fallo consulta" . mysqli_error($con);
    exit();
} 

$cant_total = mysqli_num_rows($res);

$pag = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$desde = CANT_REG_PAG * ($pag - 1);

$por_pag = CANT_REG_PAG;

$sql = "SELECT mascotas.nombre, mascotas.id, mascotas.edad, mascotas.sexo
        FROM mascotas 
        INNER JOIN mascotas_organizaciones 
        ON mascotas.id = mascotas_organizaciones.mascota_id 
        INNER JOIN usuarios 
        ON mascotas_organizaciones.usuario_id = usuarios.id 
        WHERE usuarios.id = $usu 
        LIMIT $desde,$por_pag";

$res = mysqli_query($con, $sql);

if (!$res) {
    echo "Fallo consulta" . mysqli_error($con);
    exit();
} 

$mascotas = mysqli_fetch_all($res, MYSQLI_ASSOC);
$cant_pag = ceil($cant_total/CANT_REG_PAG);


$view = 'perfil_org';

require_once('views/layout.php');