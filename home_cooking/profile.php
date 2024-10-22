<?php
require_once "sesion.php";
require_once "config.php";
$usu = $_SESSION['usuario_activo']['id'];

//Publicaciones del usuario

$sql = "SELECT x.id, nombre, descripcion, fecha_alta, usuario_id, pais_id, procedimiento, ingredientes, y.id as pais_id, pais FROM comidas x
        INNER JOIN paises y ON y.id=x.pais_id WHERE x.usuario_id =  $usu  ORDER BY x.id DESC";

$resultado = mysqli_query($con, $sql);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$recetas_usu = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$cant_rec_usu = mysqli_num_rows($resultado);
//usuario

$qry = "SELECT * FROM usuarios WHERE id =" . $usu;

$result = mysqli_query($con, $qry);

if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$usuario = mysqli_fetch_assoc($result);

// Selecciono seguidores y seguidos//////////////////////////////////////////////////////////////

$qryyy = "SELECT seguidores.seguidor_id, usuarios.nombre, usuarios.nombre_usuario, usuarios.id FROM seguidores INNER JOIN usuarios ON seguidores.seguidor_id = usuarios.id WHERE seguidores.seguido_id =" . $usu;

$resulta = mysqli_query($con, $qryyy);
if (!$resulta) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$seguidoress = mysqli_fetch_all($resulta, MYSQLI_ASSOC);

$seguidores = mysqli_num_rows($resulta);

$qryyyy = "SELECT usuarios.nombre, usuarios.nombre_usuario, usuarios.id FROM seguidores INNER JOIN usuarios ON seguidores.seguido_id = usuarios.id WHERE seguidores.seguidor_id =" . $usu;

$resultad = mysqli_query($con, $qryyyy);
if (!$resultad) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$seguidos = mysqli_fetch_all($resultad, MYSQLI_ASSOC);

$seguiendo = mysqli_num_rows($resultad);

//Editar perfil/////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['nombre'])) {

    $qry = "UPDATE usuarios SET 
    nombre =  '" . $_POST['nombre'] . "',
    nombre_usuario = '" . $_POST['nombre_usuario'] . "',
    biografia = '" . $_POST['biografia'] . "' 
    WHERE id = " . $usu;
    $result = mysqli_query($con, $qry);

    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    if ($_FILES['img_usu']['type'] == 'image/jpeg' || $_FILES['img_usu']['type'] == 'image/gif' || $_FILES['img_usu']['type'] == 'image/png'  && $_FILES['img_usu']['error'] == 0) {

        if (!is_dir('img/user/' . $usuario['id'])) {
            mkdir('img/user/' . $usuario['id']);
        }

        move_uploaded_file($_FILES['img_usu']['tmp_name'], 'img/user/' . $usuario['id'] . '/sin-cortar.jpg');

        if ($_FILES['img_usu']['type'] == 'image/jpeg') {
            $img = imagecreatefromjpeg("img/user/" . $usuario['id'] . "/sin-cortar.jpg");
        } else if ($_FILES['img_usu']['type'] == 'image/gif') {
            $img = imagecreatefromgif("img/user/" . $usuario['id'] . "/sin-cortar.jpg");
        } else if ($_FILES['img_usu']['type'] == 'image/png') {
            $img = imagecreatefrompng("img/user/" . $usuario['id'] . "/sin-cortar.jpg");
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

        imagejpeg($crop, "img/user/" . $usuario['id'] . "/principal.jpg", 50);

        
        imagedestroy($img);
        imagedestroy($crop);
    }
    header('location: profile.php');
}

//Editar contraseña////////////////////////////////////////////////////////////////////////////

if (isset($_POST['contrasena_act'])) {

    $actual = $_POST['contrasena_act'];
    $nueva = $_POST['contrasena_nue'];
    $repetida = $_POST['contrasena_rep'];
    $correcta = $usuario['password'];

    if (password_verify($actual, $correcta)) {
        if ($nueva == $repetida) {

            $hash = password_hash($_POST['contrasena_nue'], PASSWORD_BCRYPT);

            $usuario_id = $usuario['id'];

            $qry = "UPDATE usuarios SET password = '$hash' WHERE id = $usuario_id";
            $result = mysqli_query($con, $qry);
            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }
            $msj = "<div class='alert alert-success' role='alert'>El cambio de contraseña fue realizado correctamente</div>";
        } else {
            $msj = " <div class='alert alert-danger alert-dismissible fade show' role='alert'> La nueva contraseña no coincide con la contraseña repetida <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    } else {
        $msj = " <div class='alert alert-danger alert-dismissible fade show' role='alert'> Contraseña incorrecta <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}

//seguidos y seguidores/////////////////////////////////////////////////////////////////////////////////////////

if ($seguiendo > 0) {
    foreach ($seguidos as $seguido) {
        $cons = "SELECT * FROM seguidores WHERE seguido_id=" . $seguido['id'] . " AND  seguidor_id =" . $_SESSION['usuario_activo']['id'];;
        $resultadooo = mysqli_query($con, $cons);
        if (!$resultadooo) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
    }
}

if ($seguidores > 0) {
    foreach ($seguidoress as $seguidor) {
        $cons = "SELECT * FROM seguidores WHERE seguido_id=" . $_SESSION['usuario_activo']['id'] . " AND seguidor_id=" .  $seguidor['id'];
        $resultadoo = mysqli_query($con, $cons);
        if (!$resultadoo) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }
    }
}


$view = "perfil";
require_once "views/layout.php";
