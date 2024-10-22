<?php

require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
  header("location:index.php"); 
}

if (isset($_POST['titulo'])) {
  $nombre = $_SESSION['usu']['nombre'];
  $sql = "INSERT INTO informes VALUES(null,'$nombre' , '" . $_POST['titulo'] . "' , '" . $_POST['info'] . "' , '" . $_POST['descripcion'] . "','".date("Y-m-d h:i:s",time())."' ,'".$_FILES['principal2_img']."')";
  $res = mysqli_query($conn, $sql);

  header("Location: informes2.php?pagina=1");
  if (!$res) {
    die('Error de Consulta: ' . mysqli_errno($conn));
  }
$informes_id = mysqli_insert_id($conn);
if ($_FILES['principal2_img']['type'] == 'image/jpeg' && $_FILES['principal2_img']['error'] == 0) {
    if (!is_dir('img/informes/' . $informes_id)) {
        mkdir('img/informes/' . $informes_id);
    }
    move_uploaded_file($_FILES['principal2_img']['tmp_name'], 'img/informes/' . $informes_id . '/principal2.jpg');
}
header("Location: informes2.php?pagina=1");
}
$section = "vistas/informes.php";
require_once "vistas/layout.php";

?>


