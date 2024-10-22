<?php
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
    header("location:index.php"); 
  }
if ($_POST) {
    $nom_img =  $_FILES['archivo']['name'];
    $sql = "UPDATE informes SET
    titulo = '" . $_POST['titulo'] . "',
    descripcion = '" . $_POST['descripcion'] . "',
    informacion = '" . $_POST['informacion'] . "',
    imagen = '" . $nom_img . "',
    WHERE id =" . $_GET['id'];

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($conn);
        exit();
    }
    $informes_id = $_GET['id'];
    if ($_FILES['principal2_img']['type'] == 'image/jpeg' && $_FILES['principal2_img']['error'] == 0) {
        if (!is_dir('img/informes/' . $informes_id)) {
            mkdir('img/informes/' . $informes_id);
        }
        move_uploaded_file($_FILES['principal2_img']['tmp_name'], 'img/informes/' . $informes_id . '/principal2.jpg');
    }
    header("Location : misinformes.php?pagina=1");
}
$section = "vistas/informes_editar.php";
require_once "vistas/layout.php";
