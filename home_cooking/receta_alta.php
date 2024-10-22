<?php
require_once "sesion.php";
require_once "config.php";
$usu = $_SESSION['usuario_activo']['id'];

$consulta = "SELECT * FROM paises";
$resultado = mysqli_query($con, $consulta);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$consul = "SELECT * FROM sub_categorias ";
$result = mysqli_query($con, $consul);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}
$sub_categorias = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['nombre'])) {

    $sql = "INSERT INTO comidas (nombre, descripcion, pais_id, procedimiento, ingredientes, usuario_id, fecha_alta) 
    VALUES ('" . $_POST['nombre'] . "', '" . $_POST['descripcion'] . "', '" . $_POST['pais_id'] . "', '" . $_POST['procedimiento'] . "', '" . $_POST['ingredientes'] . "' , '" . $usu . "' , NOW())";
    $result = mysqli_query($con, $sql);
    $receta_id = $con->insert_id;
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    $comida = mysqli_insert_id($con);

    foreach ($sub_categorias as $sub_c) {
        if (isset($_POST['subcategoria_id'])) {
            $csl = "INSERT INTO filtros (sub_categoria_id, comida_id) VALUES (" . $sub_c['id']. ", " . $receta_id . ")";
            $result = mysqli_query($con, $csl); 
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }
        }
    }
    if ($_FILES['principal_img']['type'] == 'image/jpeg' || $_FILES['principal_img']['type'] == 'image/gif' || $_FILES['principal_img']['type'] == 'image/png'  && $_FILES['principal_img']['error'] == 0) {

        if (!is_dir('img/recetas/' . $comida)) {
            mkdir('img/recetas/' . $comida);
        }

        move_uploaded_file($_FILES['principal_img']['tmp_name'], 'img/recetas/' . $comida . '/sin-cortar.jpg');

        if ($_FILES['principal_img']['type'] == 'image/jpeg') {
            $img = imagecreatefromjpeg("img/recetas/" . $comida . "/sin-cortar.jpg");
        } else if ($_FILES['principal_img']['type'] == 'image/gif') {
            $img = imagecreatefromgif("img/recetas/" . $comida . "/sin-cortar.jpg");
        } else if ($_FILES['principal_img']['type'] == 'image/png') {
            $img = imagecreatefrompng("img/recetas/" . $comida . "/sin-cortar.jpg");
        }

        $tocrop = 0.9;
        $swidth = imagesx($img);
        $sheight = imagesy($img);
        if ($swidth > $sheight) {
            $chiquito = $sheight;
            $cheight = ceil(($chiquito / 4) * 2.9 * $tocrop);
            $cwidth = ceil($chiquito  * $tocrop);
        } else {
            $chiquito = $swidth;
            $cwidth = ceil($chiquito * $tocrop);
            $cheight = ceil(($chiquito / 4) * 2.9 * $tocrop);
        }
        $sx = ceil(($swidth / 2) - ($cwidth / 2));
        $sy = ceil(($sheight / 2) - ($cheight / 2));
        $area = ["x" => $sx, "y" => $sy, "width" => $cwidth, "height" => $cheight];


        $crop = imagecrop($img, $area);

        imagejpeg($crop, "img/recetas/" . $comida . "/principal.jpg", 50);


        imagedestroy($img);
        imagedestroy($crop);
    } else {
        die();
    }

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
    header("location: index.php");
}


$sql = "SELECT * FROM paises";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}
// Fetch all
$paises = mysqli_fetch_all($result, MYSQLI_ASSOC);

$view = "receta_alta";
require_once "views/layout.php";
