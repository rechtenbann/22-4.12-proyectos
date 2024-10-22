<?php require_once "sesion.php";
require_once "config.php";

/* echo $pag_actual;         usado para probar substr, que te deja seleccionar una parte especifica de un string.
die();                      $pag_actual está en sesion.php */

$sql = "SELECT x.id, likes, nombre, descripcion, fecha_alta, usuario_id, pais_id, procedimiento, ingredientes, y.id as pais_id, pais FROM comidas x
        INNER JOIN paises y ON y.id=x.pais_id ORDER BY x.id DESC";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

// Fetch all
$comidas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_r($comidas);

$consualta = "SELECT * FROM comida_likes";
$result = mysqli_query($con, $consualta);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

//print_r($result);

$c_likes = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Comida vegana

$clt = "SELECT DISTINCT paises.pais, comidas.likes, comidas.usuario_id, comidas.fecha_alta, comidas.nombre, comidas.id,comidas.pais_id,comidas.descripcion FROM comidas INNER JOIN filtros ON comidas.id = filtros.comida_id INNER JOIN paises ON paises.id = comidas.pais_id WHERE filtros.sub_categoria_id = 2 ORDER BY comidas.id DESC";
$result = mysqli_query($con, $clt);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}
// Fetch all
$com_veg = mysqli_fetch_all($result, MYSQLI_ASSOC);

//comida apta para celiacos

$cons = "SELECT DISTINCT paises.pais, comidas.likes, comidas.usuario_id, comidas.fecha_alta, comidas.nombre, comidas.id,comidas.pais_id,comidas.descripcion FROM comidas INNER JOIN filtros ON comidas.id = filtros.comida_id INNER JOIN paises ON paises.id = comidas.pais_id WHERE filtros.sub_categoria_id = 3 ORDER BY comidas.id DESC";
$result = mysqli_query($con, $cons);
if (!$result) {
    echo "Fallo cansualta" .  mysqli_error($con);
    exit();
}
$com_celiacos = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_r($usuario);die();

$clikes = "";

//likes de recetas



$view = "home";
require_once "views/layout.php";

function dos($id)
{

    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $id . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $resultadod = mysqli_query($con, $cons);
    if (!$resultadod) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if (mysqli_num_rows($resultadod) == 0) {
        echo '<div id="dos' .  $id . '" class="dos"><i class="fa-regular fa-thumbs-up"></i> ' . $cant_like  . '</div>';
    } else if (mysqli_num_rows($resultadod) == 1) {
        echo '<div id="dos' . $id . '" class="dos"><i class="fa-solid fa-thumbs-up"></i> ' .   $cant_like . '</div>';
    }
}


function fdos($id)
{

    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cons = "SELECT DISTINCT * FROM favoritos WHERE comida_id=" . $id . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $resultado = mysqli_query($con, $cons);
    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    if (mysqli_num_rows($resultado) == 0) {
        echo '<div id="fdos' .  $id . '" class="fdos"><i class="fa-regular fa-star"></i></div>';
    } else if (mysqli_num_rows($resultado) == 1) {
        echo '<div id="fdos' . $id . '" class="fdos"><i class="fa-solid fa-star"></i></div>';
    }
}

function tres($id)
{

    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $id . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $resultadod = mysqli_query($con, $cons);
    if (!$resultadod) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if (mysqli_num_rows($resultadod) == 0) {
        echo '<div id="tres' .  $id . '" class="tres"><i class="fa-regular fa-thumbs-up"></i> ' . $cant_like  . '</div>';
    } else if (mysqli_num_rows($resultadod) == 1) {
        echo '<div id="tres' . $id . '" class="tres"><i class="fa-solid fa-thumbs-up"></i > ' .   $cant_like . '</div>';
    }
}


function ftres($id)
{

    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cons = "SELECT DISTINCT * FROM favoritos WHERE comida_id=" . $id . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $resultado = mysqli_query($con, $cons);
    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    if (mysqli_num_rows($resultado) == 0) {
        echo '<div id="ftres' .  $id . '" class="ftres"><i class="fa-regular fa-star"></i></div>';
    } else if (mysqli_num_rows($resultado) == 1) {
        echo '<div id="ftres' . $id . '" class="ftres"><i class="fa-solid fa-star"></i></div>';
    }
}
