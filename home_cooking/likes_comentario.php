<?php require_once "sesion.php";
require_once "config.php";
$usu = $_SESSION['usuario_activo']['id'];
$comentario = $_POST['id'];
$tipo = $_POST['tipo'];

if($tipo == "comentario"){
    $cons = "SELECT * FROM comentario_likes WHERE comentario_id=" . $comentario . " AND  usuario_id =" . $usu;
    $resultado = mysqli_query($con, $cons);
    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant = mysqli_num_rows($resultado);

    if ($cant == 0) {
        $cons = "SELECT * FROM comentario_dislikes WHERE comentario_id=" . $comentario . " AND  usuario_id =" . $usu;
        $resultado = mysqli_query($con, $cons);
        $rows = mysqli_num_rows($resultado);
        if (!$resultado) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        if($rows == 0){
            $query = "INSERT INTO comentario_likes (comentario_id, usuario_id) VALUES (" . $comentario . ", " . $usu . ")";
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }

            $query2 = "UPDATE comentarios SET likes = likes + 1 WHERE id =" . $comentario;
            $result = mysqli_query($con, $query2);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }
        }
        else if($rows == 1){
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

            $query = "INSERT INTO comentario_likes (comentario_id, usuario_id) VALUES (" . $comentario . ", " . $usu . ")";
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }

            $query2 = "UPDATE comentarios SET likes = likes + 1 WHERE id =" . $comentario;
            $result = mysqli_query($con, $query2);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }
        }
    } else if ($cant == 1) {
        $query = "DELETE FROM comentario_likes WHERE comentario_id=" . $comentario . " AND  usuario_id =" . $usu;
        $result = mysqli_query($con, $query);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        $query2 = "UPDATE comentarios SET likes = likes - 1 WHERE id =" . $comentario;
        $result = mysqli_query($con, $query2);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

    }
    $cons = "SELECT * FROM comentario_likes WHERE comentario_id=" . $comentario;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if ($cant == 1) {

        $like = '<i class="fa-regular fa-thumbs-up"></i> ' . $cant_like;
    } else {
        $like = '<i class="fa-solid fa-thumbs-up"></i> '. $cant_like;
    }
}
else if($tipo == "respuesta"){
    $cons = "SELECT * FROM respuesta_likes WHERE respuesta_id=" . $comentario . " AND  usuario_id =" . $usu;
    $resultado = mysqli_query($con, $cons);
    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant = mysqli_num_rows($resultado);

    if ($cant == 0) {
        $cons = "SELECT * FROM respuesta_dislikes WHERE respuesta_id=" . $comentario . " AND  usuario_id =" . $usu;
        $resultado = mysqli_query($con, $cons);
        $rows = mysqli_num_rows($resultado);
        if (!$resultado) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        if($rows == 0){
            $query = "INSERT INTO respuesta_likes (respuesta_id, usuario_id) VALUES (" . $comentario . ", " . $usu . ")";
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }

            $query2 = "UPDATE comentario_respuestas SET likes = likes + 1 WHERE id =" . $comentario;
            $result = mysqli_query($con, $query2);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }
        }
        else if($rows == 1){
            $query = "DELETE FROM respuesta_dislikes WHERE respuesta_id=" . $comentario . " AND  usuario_id =" . $usu;
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }

            $query2 = "UPDATE comentario_respuestas SET dislikes = dislikes - 1 WHERE id =" . $comentario;
            $result = mysqli_query($con, $query2);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }

            $query = "INSERT INTO respuesta_likes (respuesta_id, usuario_id) VALUES (" . $comentario . ", " . $usu . ")";
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }

            $query2 = "UPDATE comentario_respuestas SET likes = likes + 1 WHERE id =" . $comentario;
            $result = mysqli_query($con, $query2);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }
        }
    } else if ($cant == 1) {
        $query = "DELETE FROM respuesta_likes WHERE respuesta_id=" . $comentario . " AND  usuario_id =" . $usu;
        $result = mysqli_query($con, $query);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        $query2 = "UPDATE comentario_respuestas SET likes = likes - 1 WHERE id =" . $comentario;
        $result = mysqli_query($con, $query2);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
    }
    $cons = "SELECT * FROM respuesta_likes WHERE respuesta_id=" . $comentario;
    $result = mysqli_query($con, $cons);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $cant_like = mysqli_num_rows($result);

    if ($cant == 1) {

        $like = '<i class="fa-regular fa-thumbs-up"></i> ' . $cant_like;
    } else {
        $like = '<i class="fa-solid fa-thumbs-up"></i> '. $cant_like;
    }
} 

$return = array("like" => $like);

echo json_encode($return);
