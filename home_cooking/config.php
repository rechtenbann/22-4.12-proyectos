<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "home_cooking");
define('CANT_REG_PAG', 9);

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// tobicosas

$pag_actual = $_SERVER['SCRIPT_NAME'];
$pos = strpos($pag_actual, "home_cooking", 2);
$pos = $pos + 13;
$pag_actual = substr($pag_actual, $pos, -4);
$bread = array(array("Home"), array("index.php"));

function breadcrumb($texto, $referencia)
{
    global $bread;
    $bread[0][] = $texto;
    $bread[1][] = $referencia;
}

//interacciones

function likes($id)
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
        echo '<div id="' .  $id . '" class="like"><i class="fa-regular fa-thumbs-up"></i> ' . $cant_like  . '</div>';
    } else if (mysqli_num_rows($resultadod) == 1) {
        echo '<div id="' . $id . '" class="like"><i class="fa-solid fa-thumbs-up"></i> ' .   $cant_like . '</div>';
    }
}


function favorito($id)
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
        echo '<div id="fav' .  $id . '" class="favorito"><i class="fa-regular fa-star"></i></div>';
    } else if (mysqli_num_rows($resultado) == 1) {
        echo '<div id="fav' . $id . '" class="favorito"><i class="fa-solid fa-star"></i></div>';
    }
}

function cant($id)
{
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    echo '<li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> ' . $cant_like . '</li>';
}

function cantidad($id)
{
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    echo '<a data-bs-target="#iniciarsesion" data-bs-toggle="modal" data-bs-dismiss="modal" class="like"><i class="fa-regular fa-thumbs-up"></i> ' . $cant_like . '</a>';
}

function canti($id)
{
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    echo '<a data-bs-target="#iniciarsesion" data-bs-toggle="modal" data-bs-dismiss="modal" class="like"><i id="ld" class="fa-regular fa-thumbs-up"></i> ' . $cant_like . '</a>';
}

// FUNCIONES DE COMENTARIOS

function likes_comentario($id, $receta){
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cons = "SELECT * FROM comentario_likes WHERE comentario_id=" . $id . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $resultadod = mysqli_query($con, $cons);
    if (!$resultadod) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cons = "SELECT * FROM comentario_likes WHERE comentario_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if (mysqli_num_rows($resultadod) == 0) {
        echo '<div id="' .  $id . '" class="com-like" name="'. $receta .'"><i class="fa-regular fa-thumbs-up"></i> ' . $cant_like  . '</div>';
    } else if (mysqli_num_rows($resultadod) == 1) {
        echo '<div id="' . $id . '" class="com-like"><i class="fa-solid fa-thumbs-up"></i> ' .   $cant_like . '</div>';
    }
}
function dislikes_comentario($id){
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cons = "SELECT * FROM comentario_dislikes WHERE comentario_id=" . $id . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $resultadod = mysqli_query($con, $cons);
    if (!$resultadod) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cons = "SELECT * FROM comentario_dislikes WHERE comentario_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if (mysqli_num_rows($resultadod) == 0) {
        echo '<div id="dislike' .  $id . '" class="com-dislike" ><i class="fa-regular fa-thumbs-down"></i> ' . $cant_like  . '</div>';
    } else if (mysqli_num_rows($resultadod) == 1) {
        echo '<div id="dislike' . $id . '" class="com-dislike"><i class="fa-solid fa-thumbs-down"></i> ' .   $cant_like . '</div>';
    }
}

function likes_respuesta($id, $receta){
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cons = "SELECT * FROM comentario_likes WHERE comentario_id=" . $id . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $resultadod = mysqli_query($con, $cons);
    if (!$resultadod) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cons = "SELECT * FROM comentario_likes WHERE comentario_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if (mysqli_num_rows($resultadod) == 0) {
        echo '<div id="' .  $id . '" class="res-like" name="'. $receta .'"><i class="fa-regular fa-thumbs-up"></i> ' . $cant_like  . '</div>';
    } else if (mysqli_num_rows($resultadod) == 1) {
        echo '<div id="' . $id . '" class="res-like"><i class="fa-solid fa-thumbs-up"></i> ' .   $cant_like . '</div>';
    }
}
function dislikes_respuesta($id){
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cons = "SELECT * FROM respuesta_dislikes WHERE respuesta_id=" . $id . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
    $resultadod = mysqli_query($con, $cons);
    if (!$resultadod) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cons = "SELECT * FROM respuesta_dislikes WHERE respuesta_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if (mysqli_num_rows($resultadod) == 0) {
        echo '<div id="dislike2' .  $id . '" class="res-dislike"><i class="fa-regular fa-thumbs-down"></i> ' . $cant_like  . '</div>';
    } else if (mysqli_num_rows($resultadod) == 1) {
        echo '<div id="dislike2' . $id . '" class="res-dislike"><i class="fa-solid fa-thumbs-down"></i> ' .   $cant_like . '</div>';
    }
}
//filtro epica
$sql = "SELECT * FROM paises";
$r = mysqli_query($con, $sql);
if (!$r) {
   echo "La consulta fallo";
   mysqli_close($con);
}
$paises = mysqli_fetch_all($r, MYSQLI_ASSOC);
//print_r($paises);
$sqlc = "SELECT * FROM categorias";
$rc = mysqli_query($con, $sqlc);
if (!$rc) {
    echo "La consulta fallo";
    mysqli_close($con);
 }
$categorias = mysqli_fetch_all($rc, MYSQLI_ASSOC);
//
$sqlsc = "SELECT * FROM sub_categorias WHERE categoria_id = 1";
$rsc = mysqli_query($con, $sqlsc);
if (!$rsc) {
    echo "La consulta fallo";
    mysqli_close($con);
 }
$subcategorias = mysqli_fetch_all($rsc, MYSQLI_ASSOC);


$sqlscp = "SELECT * FROM sub_categorias WHERE categoria_id = 2";
$rscp = mysqli_query($con, $sqlscp);
if (!$rscp) {
    echo "La consulta fallo";
    mysqli_close($con);
 }
$subcategoriasc = mysqli_fetch_all($rscp, MYSQLI_ASSOC);

