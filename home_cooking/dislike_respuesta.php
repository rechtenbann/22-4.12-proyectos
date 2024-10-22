<?php 
require_once "sesion.php";
require_once "config.php";
$usu = $_SESSION['usuario_activo']['id'];

$respuesta = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


$cons = "SELECT * FROM respuesta_dislikes WHERE respuesta_id=" . $respuesta . " AND  usuario_id =" . $usu;
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant = mysqli_num_rows($resultado);

$cons = "SELECT * FROM respuesta_likes WHERE respuesta_id=" . $respuesta . " AND  usuario_id =" . $usu;
$result = mysqli_query($con, $cons);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$likes = mysqli_num_rows($result);

if ($cant == 0) { 

    if($likes == 0){
        $query = "INSERT INTO respuesta_dislikes (respuesta_id, usuario_id) VALUES (" . $respuesta . ", " . $usu . ")";
        $result = mysqli_query($con, $query);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        $query2 = "UPDATE comentario_respuestas SET dislikes = dislikes + 1 WHERE id =" . $respuesta;
        $result = mysqli_query($con, $query2);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
    }
    elseif ($likes == 1) {
        
        $queryA = "DELETE FROM respuesta_likes WHERE respuesta_id=" . $respuesta . " AND usuario_id= " . $usu;
        $result = mysqli_query($con, $queryA);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        $queryB = "UPDATE comentario_respuestas SET likes = likes - 1 WHERE id =" . $respuesta;
        $result = mysqli_query($con, $queryB);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
    }

    $query = "INSERT INTO respuesta_dislikes (respuesta_id, usuario_id) VALUES (" . $respuesta . ", " . $usu . ")";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $query2 = "UPDATE comentario_respuestas SET dislikes = dislikes + 1 WHERE id =" . $respuesta;
    $result = mysqli_query($con, $query2);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
} else if ($cant == 1) {

    $query = "DELETE FROM respuesta_dislikes WHERE respuesta_id=" . $respuesta . " AND  usuario_id =" . $usu;
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $query2 = "UPDATE comentario_respuestas SET dislikes = dislikes - 1 WHERE id =" . $respuesta;
    $result = mysqli_query($con, $query2);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
}

$cons = "SELECT * FROM respuesta_dislikes WHERE respuesta_id=" . $respuesta;
$result = mysqli_query($con, $cons);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant_like = mysqli_num_rows($result);

if ($cant>0) {

    $dislike = ' <i class="fa-regular fa-thumbs-down"></i> ' . $cant_like;
} else {
    $dislike = ' <i class="fa-solid fa-thumbs-down"></i> ' . $cant_like;
}

$returnnnnn = array("dislike" => $dislike);

echo json_encode($returnnnnn);
