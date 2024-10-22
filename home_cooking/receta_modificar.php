<?php
require_once "config.php";
require_once "sesion.php";

if (isset($_SESSION['usuario_activo'])) {



    $sql = "SELECT * FROM comidas WHERE id = " . $_GET['receta_id'];
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    $comida = mysqli_fetch_assoc($result);

    $sql = "SELECT * FROM rango_usuarios WHERE usuario_id = " . $_SESSION['usuario_activo']['id'];
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    $rango = mysqli_fetch_assoc($result);

    if ($comida['usuario_id'] == $_SESSION['usuario_activo']['id'] || $rango['rango_id'] == 2) {



        $consulta = "SELECT * FROM paises";
        $resultado = mysqli_query($con, $consulta);
        if (!$resultado) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        if (isset($_POST['nombre'])) {

            $sql = "UPDATE comidas SET 
            nombre =        '" . $_POST['nombre'] . "',
            descripcion =   '" . $_POST['descripcion'] . "', 
            ingredientes =   '" . $_POST['ingredientes'] . "',
            procedimiento = '" . $_POST['procedimiento'] . "',
            pais_id =     '" . $_POST['pais_id'] . "'
            WHERE id = " . $_GET['receta_id'];
            $result = mysqli_query($con, $sql);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }

           

            if ($_FILES['principal_img']['type'] == 'image/jpeg' || $_FILES['principal_img']['type'] == 'image/gif' || $_FILES['principal_img']['type'] == 'image/png'  && $_FILES['principal_img']['error'] == 0) {

                if (!is_dir('img/recetas/' . $comida['id'])) {
                    mkdir('img/recetas/' . $comida['id']);
                }
        
                move_uploaded_file($_FILES['principal_img']['tmp_name'], 'img/recetas/' . $comida['id'] . '/sin-cortar.jpg');
        
                if ($_FILES['principal_img']['type'] == 'image/jpeg') {
                    $img = imagecreatefromjpeg("img/recetas/" . $comida['id'] . "/sin-cortar.jpg");
                } else if ($_FILES['principal_img']['type'] == 'image/gif') {
                    $img = imagecreatefromgif("img/recetas/" . $comida['id'] . "/sin-cortar.jpg");
                } else if ($_FILES['principal_img']['type'] == 'image/png') {
                    $img = imagecreatefrompng("img/recetas/" . $comida['id'] . "/sin-cortar.jpg");
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
        
                imagejpeg($crop, "img/recetas/" . $comida['id'] . "/principal.jpg", 50);
        
        
                imagedestroy($img);
                imagedestroy($crop);
            } 

           
            header("location: " . $_GET['location']);
        }

        $sql = "SELECT * FROM paises";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
        // Fetch all
        $paises = mysqli_fetch_all($result, MYSQLI_ASSOC);

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



        $view = "receta_modificar";
        require_once "views/layout.php";
    } else {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}
