<?php
include("config.php");
require_once('session_start.php');
$usu = $_SESSION['usuario']['id'];



$query = "INSERT INTO mascotas (nombre, edad, vacunado, sexo, animal, tamano, esterlizado, peso, desparasitado, nivel_de_actividad, necesidades, requisitos, historia, especificaciones) 
          VALUES ('" . $_POST['nombre'] . "', '" . $_POST['edad'] . "', '" . $_POST['vacunado'] . "', '" . $_POST['sexo'] . "', '" . $_POST['especie'] . "', '" . $_POST['tamaño'] . "', '" . $_POST['esteril'] . "', '" . $_POST['peso'] . "', '" . $_POST['desparasitado'] . "', '" . $_POST['actividad'] . "', '" . $_POST['necesidades'] . "', '" . $_POST['requerimientos'] . "', '" . $_POST['historia'] . "', '" . $_POST['especificaciones'] . "' ) ";
$result = mysqli_query($con, $query);
if (!$result) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$mascota_id = mysqli_insert_id($con);



$cons = "INSERT INTO mascotas_organizaciones (mascota_id, usuario_id) VALUES ('$mascota_id', '$usu')";
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$targetDir = "img/mascotas/";
$allowTypes = array('jpg', 'png', 'jpeg', 'gif');

$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
$fileNames = array_filter($_FILES['img']['name']);

if (!empty($fileNames)) {
  foreach ($_FILES['img']['name'] as $key => $val) {

    $fileName = basename($_FILES['img']['name'][$key]);
    if (!is_dir($targetDir . $mascota_id)) {
      mkdir($targetDir . $mascota_id);
    }
    $targetFilePath = $targetDir . $mascota_id . "/" . $fileName;

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (in_array($fileType, $allowTypes)) {

      if (!move_uploaded_file($_FILES["img"]["tmp_name"][$key], $targetFilePath)) {
     
        $errorUpload .= $_FILES['img']['name'][$key] . ' | ';
      }
    } else {
      $errorUploadType .= $_FILES['img']['name'][$key] . ' | ';
    }
  }

  $archivos = scandir('img/mascotas/' . $mascota_id . '/');

  $cantidad = count($archivos);

  for ($i = 2; $i < $cantidad; $i++) {

    //f($archivos[$i] != 'principal.jpg'){

      $ruta = "img/mascotas/" . $mascota_id . "/" . $archivos[$i];
      $extension = pathinfo($ruta, PATHINFO_EXTENSION);
  
      if ($extension == 'jpg' || $extension == 'jpeg') {
        $img = imagecreatefromjpeg("img/mascotas/" . $mascota_id . "/" . $archivos[$i]);
      } else if ($extension == 'gif') {
        $img = imagecreatefromgif("img/mascotas/" . $mascota_id . "/" . $archivos[$i]);
      } else if ($extension == 'png') {
        $img = imagecreatefrompng("img/mascotas/" . $mascota_id . "/" . $archivos[$i]);
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
  
      imagejpeg($crop, "img/mascotas/" . $mascota_id . "/recortada-" . $i . ".jpg", 50);
  
  
      imagedestroy($img);
      imagedestroy($crop);
   // }

    
  }

  if ($_FILES['principal']['type'] == 'image/jpeg' || $_FILES['principal']['type'] == 'image/gif' || $_FILES['principal']['type'] == 'image/png'  && $_FILES['principal']['error'] == 0) {

    if (!is_dir('img/mascotas/' . $mascota_id)) {
      mkdir('img/mascotas/' . $mascota_id);
    }
  
    $nombre_archivo = basename($_FILES['principal']['name']);
    $ruta_img = "img/mascotas/" . $mascota_id . "/" . $nombre_archivo;
    $extension_img = pathinfo($ruta_img, PATHINFO_EXTENSION);
  
    move_uploaded_file($_FILES['principal']['tmp_name'], 'img/mascotas/' . $mascota_id . '/cortar.'. $extension_img);
  
    if ($_FILES['principal']['type'] == 'image/jpeg') {
      $img = imagecreatefromjpeg("img/mascotas/" . $mascota_id . '/cortar.'. $extension_img);
    } else if ($_FILES['principal']['type'] == 'image/gif') {
      $img = imagecreatefromgif("img/mascotas/" . $mascota_id . '/cortar.'. $extension_img);
    } else if ($_FILES['principal']['type'] == 'image/png') {
      $img = imagecreatefrompng("img/mascotas/" . $mascota_id . '/cortar.'. $extension_img);
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
  
    imagejpeg($crop, "img/mascotas/" . $mascota_id . "/principal.jpg", 50);
  
  
    imagedestroy($img);
    imagedestroy($crop);
  }



  // mensajes de error
  $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
  $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
  $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

} else {
  $statusMsg = 'Selecciona un tipo de archivo valido';
}

header("Location: perfil_org.php");

