<?php
include("config.php");

if (isset($_POST['ids'])) {
  $idepico = $_POST['ids'];
  $_GET['id'] = $idepico;

  $query = "UPDATE mascotas SET 
    nombre = '" . $_POST['enombre'] . "', 
    edad = '" . $_POST['eedad'] . "',
    vacunado = '" . $_POST['evacunado'] . "',
    sexo= '" . $_POST['esexo'] . "',
    animal= '" . $_POST['eespecie'] . "',
    tamano= '" . $_POST['etamaño'] . "',
    esterlizado= '" . $_POST['eesteril'] . "',
    peso= '" . $_POST['epeso'] . "',
    desparasitado= '" . $_POST['edesparasitado'] . "',
    nivel_de_actividad= '" . $_POST['eactividad'] . "',
    necesidades= '" . $_POST['enecesidades'] . "',
    requisitos= '" . $_POST['erequerimientos'] . "',
    historia= '" . $_POST['ehistoria'] . "',
    especificaciones= '" . $_POST['eespecificaciones'] . "'
    WHERE id = $idepico ";

  $result = mysqli_query($con, $query);
  if (!$result) {
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
      //die($targetDir . $idepico);
      if (!is_dir($targetDir . $idepico)) {
        mkdir($targetDir . $idepico . "/");
      }
      $targetFilePath = $targetDir . $idepico . "/" . $fileName;

      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

      if (in_array($fileType, $allowTypes)) {

        if (!move_uploaded_file($_FILES["img"]["tmp_name"][$key], $targetFilePath)) {

          $errorUpload .= $_FILES['img']['name'][$key] . ' | ';
        }
      } else {
        $errorUploadType .= $_FILES['img']['name'][$key] . ' | ';
      }
    }

    $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
    $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
  } else {
    $statusMsg = 'Selecciona un tipo de archivo valido';
  }

  echo "<br>";
  echo "<div class='alert alert-success' role='alert'> La mascota se actualizo correctamente :) </div>";

    header('Location: index.php');
  

  $view = "editar_mascota";
  require_once "views/layout.php";
}

if (empty($_GET['id'])) {
  header('Location: listado_mascota.php');
}

$sql = "SELECT * FROM mascotas WHERE id = " . $_GET['id'];
$resultado = mysqli_query($con, $sql);
if (!$sql) {
  echo "la consulta fallo epicamente";
}
$mascota = mysqli_fetch_assoc($resultado);

$view = "editar_mascota";
require_once "views/layout.php";
