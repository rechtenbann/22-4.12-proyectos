<?php
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
    header("location:index.php"); 
  }
if (isset($_POST['nombre'])) {
    $nombre = $_SESSION['usu']['nombre'];
    $sql = "INSERT INTO venta_de_armas VALUES(null,'" . $nombre . "','" . $_POST['tipo'] . "','" . $_POST['nombre'] . "','" . $_POST['nacioanlidad'] . "'," . $_POST['precio'] . ", '" . $_FILES['principal_img'] . "', '" . $_POST['info'] . "','" . date("Y-m-d h:i:s", time()) . "', '" . $_FILES['secundaria_img'] . "')";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        die('Error de Consulta: ' . mysqli_errno($conn));
    }

    $armas_id = mysqli_insert_id($conn);
    if ($_FILES['principal_img']['type'] == 'image/jpeg' && $_FILES['principal_img']['error'] == 0) {
        if (!is_dir('img/ventas/' . $armas_id)) {
            mkdir('img/ventas/' . $armas_id);
        }
        move_uploaded_file($_FILES['principal_img']['tmp_name'], 'img/ventas/' . $armas_id . '/principal.jpg');
    }
    if ($_FILES['secundaria_img']['type'] == 'image/jpeg' && $_FILES['secundaria_img']['error'] == 0) {
            move_uploaded_file($_FILES['secundaria_img']['tmp_name'], 'img/ventas/' . $armas_id . '/secundaria.jpg');
    }
    header("Location: divisiones_lista.php?pagina=1");
}
$sql2 = "SELECT * FROM paises";
$resultado = mysqli_query($conn, $sql2);
if (!$resultado) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}
$paises = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
$section = "vistas/divisiones_alta.php";
require_once "vistas/layout.php";
