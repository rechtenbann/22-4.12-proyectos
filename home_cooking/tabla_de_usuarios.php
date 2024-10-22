<?php
require_once("config.php");
require_once "sesion.php";

if (isset($_SESSION['usuario_activo'])) {
    $session = $_SESSION['usuario_activo']['id'];
} else {
    $session = '';
}

$consulta = "SELECT * FROM usuarios";
$resultado = mysqli_query($con, $consulta);

if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$num_registros = mysqli_num_rows($resultado);

$pagina = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$inicio = CANT_REG_PAG * ($pagina - 1);

$registros = CANT_REG_PAG;

$consulta = "SELECT * FROM usuarios ORDER BY id DESC LIMIT $inicio,$registros ";
$result = mysqli_query($con, $consulta);

if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r($usuarios);die;

$paginas = ceil($num_registros / CANT_REG_PAG);

function rango($id)
{
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $cons = "SELECT * FROM rango_usuarios WHERE usuario_id=" . $id;
    $resultado = mysqli_query($con, $cons);

    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    
   $usuario =  mysqli_fetch_assoc($resultado);
    if ($usuario['rango_id'] == 2) {
        echo '<a href="usuario_rango.php?usuario_id=' . $id .'" role="button" class="in_table" title="Rango"><i class="fa-solid fa-user-gear"></i></a>';
    } else {
        echo '<a href="usuario_rango.php?usuario_id=' . $id .'" role="button" class="in_table" title="Rango"><i id="no-admin" class="fa-solid fa-user-gear"></i></a>';
 
    }


}


$view = "tabla_usuario";
require_once "views/layout.php";
