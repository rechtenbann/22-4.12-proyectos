<?php
require_once "config.php";
require_once "sesion.php";

$id = $_GET['id_usu'];

if (isset($_SESSION['usuario_activo'])) {
    $session = $_SESSION['usuario_activo']['id'];
} else {
    $session = '';
}



if ($session != $id || $session = '') {




    $qry = "SELECT usuarios.id, usuarios.nombre_usuario, usuarios.nombre, usuarios.biografia, COUNT(comidas.id) as cant_com FROM usuarios INNER JOIN comidas ON usuarios.id = comidas.usuario_id WHERE usuarios.id =" . $id;

    $resultado = mysqli_query($con, $qry);
    if (!$resultado) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $usuario = mysqli_fetch_assoc($resultado);

    $qryy = "SELECT comidas.likes, comidas.id, comidas.nombre, COUNT(comentarios.id ) as cant FROM comidas LEFT JOIN comentarios ON comidas.id = comentarios.comida_id WHERE comidas.usuario_id = '$id' GROUP BY comidas.nombre ORDER BY comidas.id DESC";

    $result = mysqli_query($con, $qryy);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $comidas = mysqli_fetch_all($result, MYSQLI_ASSOC);



    $qryyy = "SELECT COUNT(seguidores.seguido_id) as seguidores FROM seguidores WHERE seguidores.seguido_id =" . $id;

    $resulta = mysqli_query($con, $qryyy);
    if (!$resulta) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $seguidores = mysqli_fetch_assoc($resulta);

    $qryyyy = "SELECT COUNT(seguidores.seguidor_id) as seguiendo FROM seguidores WHERE seguidores.seguidor_id =" . $id;

    $resultad = mysqli_query($con, $qryyyy);
    if (!$resultad) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $seguiendo = mysqli_fetch_assoc($resultad);

    if (isset($_SESSION['usuario_activo'])) {

        $seguidor = $_SESSION['usuario_activo']['id'];

        $cons = "SELECT * FROM seguidores WHERE seguido_id=" . $id . " AND  seguidor_id =" . $seguidor;
        $resultado = mysqli_query($con, $cons);
        if (!$resultado) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        if (mysqli_num_rows($resultado) == 1) {
            $siguiendo = 'Siguiendo';
        }
    }

    if (isset($_GET['seguido_id']) && isset($_GET['seguidor_id'])) {
        $seguido = $_GET['seguido_id'];
        $seguidor = $_GET['seguidor_id'];

        $cons = "SELECT * FROM seguidores WHERE seguido_id=" . $seguido . " AND  seguidor_id =" . $seguidor;
        $resultado = mysqli_query($con, $cons);
        if (!$resultado) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        $cant = mysqli_num_rows($resultado);

        if ($cant == 1) {

            $cons = "DELETE FROM seguidores WHERE seguido_id=" . $seguido . " AND  seguidor_id =" . $seguidor;
            $query = mysqli_query($con, $cons);
            if (!$query) {
                echo "Fallo consulta: " . mysqli_error($con);
                die();
            }

            header('location:perfil2.php?id_usu=' . $id);
        } else {
            $cons = "INSERT INTO seguidores (seguidor_id, seguido_id) VALUES ('$seguidor', '$seguido ')";
            $query = mysqli_query($con, $cons);
            if (!$query) {
                echo "Fallo consulta: " . mysqli_error($con);
                die();
            }
            header('location:perfil2.php?id_usu=' . $id);
        }
    }

    $view = "perfil2";
    require_once "views/layout.php";
} else {
    header('location: index.php');
}
