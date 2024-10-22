<?php
require_once "config.php";
require_once "sesion.php";
$usu = $_SESSION['usuario_activo']['id'];

$comentario = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


$cons = "SELECT * FROM comentario_dislikes WHERE comentario_id=" . $comentario . " AND  usuario_id =" . $usu;
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant = mysqli_num_rows($resultado);

$cons = "SELECT * FROM comentario_likes WHERE comentario_id=" . $comentario . " AND  usuario_id =" . $usu;
$result = mysqli_query($con, $cons);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$likes = mysqli_num_rows($result);

if ($cant == 0) {


    if ($likes == 1) {
        
        $queryA = "DELETE FROM comentario_likes WHERE comentario_id=" . $comentario . " AND usuario_id= " . $usu;
        $result = mysqli_query($con, $queryA);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        $queryB = "UPDATE comentarios SET likes = likes - 1 WHERE id =" . $comentario;
        $result = mysqli_query($con, $queryB);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
    }

    $query = "INSERT INTO comentario_dislikes (comentario_id, usuario_id) VALUES (" . $comentario . ", " . $usu . ")";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $query2 = "UPDATE comentarios SET dislikes = dislikes + 1 WHERE id =" . $comentario;
    $result = mysqli_query($con, $query2);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
} else if ($cant == 1) {

    $query = "DELETE FROM comentario_dislikes WHERE comentario_id=" . $comentario . " AND  usuario_id =" . $usu;
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $query2 = "UPDATE comentarios SET dislikes = dislikes - 1 WHERE id =" . $comentario;
    $result = mysqli_query($con, $query2);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
}

$cons = "SELECT * FROM comentario_dislikes WHERE comentario_id=" . $comentario;
$result = mysqli_query($con, $cons);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant_like = mysqli_num_rows($result);

if ($cant > 0) {

    $dislike = '<i class="fa-regular fa-thumbs-down"></i> ' . $cant_like;
} else {
    $dislike = '<i class="fa-solid fa-thumbs-down"></i> ' . $cant_like;
}

$returnnn = array("dislike" => $dislike);

echo json_encode($returnnn);
