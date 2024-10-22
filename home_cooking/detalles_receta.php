<?php
require_once "config.php";
require_once "sesion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else if (isset($_GET['id_nue'])) {
    $id = $_GET['id_nue'];
}


if (isset($_SESSION['usuario_activo'])) {
    $session = $_SESSION['usuario_activo']['id'];
} else {
    $session = '';
}

$existe = 'SELECT id FROM comidas WHERE id =' . $id;
$r = mysqli_query($con, $existe);

$filas = mysqli_num_rows($r);

if ($filas  == 0) {
    $no_existe = true;
    $view = "detalles_receta";
    require_once "views/layout.php";
} else {

    $cons = "SELECT * FROM comida_likes WHERE comida_id=" . $id;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if (isset($_SESSION['usuario_activo'])) {

        $cons = "SELECT * FROM comida_likes WHERE comida_id = $id AND  usuario_id = " . $_SESSION['usuario_activo']['id'];
        $resultadod = mysqli_query($con, $cons);
        if (!$resultadod) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
    }

//igual hasta aquí

    $receta = "SELECT comidas.id , comidas.nombre, comidas.descripcion, CONVERT(comidas.fecha_alta, DATE) as fecha_alta , usuarios.id as usu, usuarios.nombre_usuario, paises.pais, comidas.procedimiento, comidas.ingredientes, COUNT(comida_likes.comida_id) as likes FROM comidas INNER JOIN paises ON paises.id=comidas.pais_id INNER JOIN usuarios ON usuarios.id = comidas.usuario_id LEFT JOIN comida_likes ON comidas.id = comida_likes.comida_id WHERE comidas.id = $id";
    $r = mysqli_query($con, $receta);
    if (!$r) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    $f = mysqli_fetch_all($r, MYSQLI_ASSOC);

    if (isset($_SESSION['usuario_activo'])) {
        $receta = "SELECT comidas.id , comidas.nombre, comidas.descripcion, CONVERT(comidas.fecha_alta, DATE) as fecha_alta, usuarios.id as usu, usuarios.nombre_usuario, paises.pais, comidas.procedimiento, comidas.ingredientes, COUNT(comida_likes.comida_id) as likes FROM comidas INNER JOIN paises ON paises.id=comidas.pais_id INNER JOIN usuarios ON usuarios.id = comidas.usuario_id LEFT JOIN comida_likes ON comidas.id = comida_likes.comida_id WHERE comidas.id = $id";
        $r = mysqli_query($con, $receta);
        if (!$r) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
        $f = mysqli_fetch_all($r, MYSQLI_ASSOC);

        $cons = "SELECT  * FROM favoritos WHERE comida_id=" . $f[0]['id'] . " AND  usuario_id =" . $session;
        $resultadopp = mysqli_query($con, $cons); 
        if (!$resultadopp) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
    }

$sql_cate = "SELECT categorias.id , categorias.categoria , sub_categorias.sub_categoria FROM categorias INNER JOIN sub_categorias ON categorias.id = sub_categorias.categoria_id";
$resultado = mysqli_query($con, $sql_cate);
if (!$resultado) {
    echo "algo salio mal ";
}
$categorias = mysqli_fetch_all($resultado , MYSQLI_ASSOC);

if (isset($_SESSION['usuario_activo'])) {
    $seguidor = $_SESSION['usuario_activo']['id'];
    $cons = "SELECT * FROM seguidores WHERE seguido_id=" . $f[0]['usu'] . " AND  seguidor_id =" . $seguidor;
    $resultado = mysqli_query($con, $cons);
    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    if (mysqli_num_rows($resultado) == 1) {
        $siguiendo = 'Siguiendo';
    }
}

//comentarios

$cons = "SELECT comentarios.comentario, comentarios.likes, comentarios.fecha_alta, comentarios.dislikes, comentarios.id as comentario_id, usuarios.id, usuarios.nombre_usuario FROM comentarios INNER JOIN comidas ON comentarios.comida_id = comidas.id INNER JOIN usuarios ON usuarios.id = comentarios.usuario_id WHERE comidas.id = $id";
$result = mysqli_query($con, $cons);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$comen = mysqli_fetch_all($result, MYSQLI_ASSOC);

$comentarios = array_reverse($comen);

$existe = mysqli_num_rows($result);

$resp = "SELECT comentario_respuestas.id, comentario_id, usuario_id, comentario, usuarios.nombre_usuario, likes, dislikes FROM comentario_respuestas INNER JOIN usuarios ON comentario_respuestas.usuario_id = usuarios.id";
$result = mysqli_query($con, $resp);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$respuestas = mysqli_fetch_all($result, MYSQLI_ASSOC);
 



if (isset($_GET['seguido_id']) && isset($_GET['seguidor_id'])) {
    $seguido = $_GET['seguido_id'];
    $seguidor = $_GET['seguidor_id'];

    $cons = "SELECT * FROM seguidores WHERE seguido_id=" . $seguido . " AND  seguidor_id =" . $seguidor;
    $resultado = mysqli_query($con, $cons);
    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cantidad = mysqli_num_rows($resultado);

    if ($cantidad == 1) {

        $cons = "DELETE FROM seguidores WHERE seguido_id=" . $seguido . " AND  seguidor_id =" . $seguidor;
        $queryy = mysqli_query($con, $cons);
        if (!$queryy) {
            echo "Fallo consulta: " . mysqli_error($con);
            die();
        }

        header('location:detalles_receta.php?id=' . $id . '&location=index.php');
    } else {
        $cons = "INSERT INTO seguidores (seguidor_id, seguido_id) VALUES ('$seguidor', '$seguido ')";
        $queryy = mysqli_query($con, $cons);
        if (!$queryy) {
            echo "Fallo consulta: " . mysqli_error($con);
            die();
        }
        header('location:detalles_receta.php?id=' . $id . '&location=index.php');
    }
}

}

$view = "detalles_receta";
require_once "views/layout.php";