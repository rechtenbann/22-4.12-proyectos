<?php
require_once "config.php";

require_once "session_start.php";

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
else {
    if ($_SESSION['usuario']['rol_id'] != 2 && $_SESSION['usuario']['rol_id'] != 3) {
        header('Location: index.php');
    }
}

if (isset($_GET['id'])) {
    $usu = $_GET['id'];
} else if (isset($_POST['id'])) {
    $usu = $_POST['id'];
}


$consulta = "SELECT usuarios.id, usuarios.nombre, usuarios.telefono , usuarios.mail, usuarios.provincia_id, usuarios.barrio_id, provincias.provincia, barrios.barrio FROM usuarios INNER JOIN provincias ON usuarios.provincia_id = provincias.id INNER JOIN barrios ON usuarios.barrio_id = barrios.id WHERE usuarios.id = " . $usu;
$result = mysqli_query($con, $consulta);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$usuario = mysqli_fetch_assoc($result);

$query = "SELECT * FROM provincias";
$resultado = mysqli_query($con, $query);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}
$provincias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);


if (isset($_POST['nombre_org'])) {

    if ($_POST['prov_org'] != 0) {

        if ($_POST['bar'] != 0) {

            $qry = "UPDATE usuarios SET 
            provincia_id =  '" . $_POST['prov_org'] . "',
            barrio_id = '" . $_POST['bar'] . "'
            WHERE id = " . $usu;
            $resultado = mysqli_query($con, $qry);

            if (!$resultado) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }
            if ($_POST['nombre_org'] != $usuario['nombre'] || $_POST['correo_org'] != $usuario['mail'] || $_POST['edad_ado'] != $usuario['edad'] ||  $_POST['celular_org'] != $usuario['telefono']) {

                $qry = "UPDATE usuarios SET 
            nombre =  '" . $_POST['nombre_org'] . "',
            mail = '" . $_POST['correo_org'] . "',
            telefono = '" . $_POST['celular'] . "'
            WHERE id = " . $usu;
                $result = mysqli_query($con, $qry);

                if (!$result) {
                    echo "Fallo consulta: " . mysqli_error($con);
                    exit();
                }
            }
            header('location: perfil_org.php?id=' . $usu .'');
        } else {
            $msj = 'Elija un barrio valido';
        }
    } else {
        $msj = 'Elija una provincia valida';
    }

    if ($_FILES['img_usu']['type'] == 'image/jpeg' || $_FILES['img_usu']['type'] == 'image/gif' || $_FILES['img_usu']['type'] == 'image/png'  && $_FILES['img_usu']['error'] == 0) {

        if (!is_dir('img/usuarios/' . $usuario['id'])) {
            mkdir('img/usuarios/' . $usuario['id']);
        }

        move_uploaded_file($_FILES['img_usu']['tmp_name'], 'img/usuarios/' . $usuario['id'] . '/sin-cortar.jpg');

        if ($_FILES['img_usu']['type'] == 'image/jpeg') {
            $img = imagecreatefromjpeg("img/usuarios/" . $usuario['id'] . "/sin-cortar.jpg");
        } else if ($_FILES['img_usu']['type'] == 'image/gif') {
            $img = imagecreatefromgif("img/usuarios/" . $usuario['id'] . "/sin-cortar.jpg");
        } else if ($_FILES['img_usu']['type'] == 'image/png') {
            $img = imagecreatefrompng("img/usuarios/" . $usuario['id'] . "/sin-cortar.jpg");
        }


        $tocrop = 0.9;
        $swidth = imagesx($img);
        $sheight = imagesy($img);
        if ($swidth > $sheight) {
            $chiquito = $sheight;
        } else {
            $chiquito = $swidth;
        }
        $cwidth = ceil($chiquito * $tocrop);
        $cheight = ceil($chiquito * $tocrop);
        $sx = ceil(($swidth / 2) - ($cwidth / 2));
        $sy = ceil(($sheight / 2) - ($cheight / 2));
        $area = ["x" => $sx, "y" => $sy, "width" => $cwidth, "height" => $cheight];


        $crop = imagecrop($img, $area);

        imagejpeg($crop, "img/usuarios/" . $usuario['id'] . "/principal.jpg", 50);


        imagedestroy($img);
        imagedestroy($crop);
    }
}



$view = "editar_org";
require_once "views/layout.php";
