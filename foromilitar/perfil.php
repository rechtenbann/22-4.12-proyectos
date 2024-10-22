<?php
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
    header("location:index.php"); 
  }
$usu = $_SESSION['usu']['id'];

if (isset($_SESSION['usu']['id']) && isset($_FILES['archivo']) && ($_FILES['archivo']['type'] == 'image/jpeg' || $_FILES['archivo']['type'] == 'image/png')) {
    $nombre = $_SESSION['usu']['nombre'];
    mkdir("img/usuarios/" . $nombre . "");
    if ($_SESSION['usu']['foto'] != "LogoGlobal.jpg") {
        unlink("img/usuarios/" . $_SESSION['usu']['foto']);
    }
    $ruta = "img/usuarios/" . $nombre . "/" . $_FILES['archivo']['name'];
    $nom_img = $_FILES['archivo']['name'];
    $ruta2 = $nombre . "/" . $nom_img;
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)) {
        $query = "UPDATE register SET foto = '" . $ruta2 . "' WHERE nombre = '" . $nombre . "';";
        $res = mysqli_query($conn, $query);
        $_SESSION['usu']['foto'] = $ruta2;
        header("Location: perfil.php");
    } else {
        echo "No se pudo subir la imagen";
    }
}
if(isset($_POST['editar'])){
    $query = "UPDATE register SET nombre =  '" . $_POST['nombre'] . "', descripcion = '" . $_POST['descripcion'] . "', telefono = '". $_POST['telefono'] ."' WHERE id = ". $usu;
    $result = mysqli_query($conn, $query);
if (!$result) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
}

$qry = "SELECT * FROM register WHERE id =" . $usu;
$res = mysqli_query($conn, $qry);
if (!$res) {
    echo "Fallo consulta: " . mysqli_error($conn);
    exit();
}
$usuario = mysqli_fetch_assoc($res);


$section = "vistas/perfil.php";
require_once "vistas/layout.php";
?>