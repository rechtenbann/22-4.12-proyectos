<?php
require_once "includes/config.php";

if ($_POST){
    $nom_img =  $_FILES['archivo']['name'];
    $sql = "UPDATE venta_de_armas SET 
            tipo = '" . $_POST['tipo'] . "',
            nombre = '" . $_POST['nombre'] . "', 
            nacioanlidad = '" . $_POST['nacioanlidad'] . "', 
            descripcion = '" . $_POST['info'] . "',
            precio = '" . $_POST['precio'] . "',
            imagen = '" . $nom_img . "'
            WHERE id_arma = " . $_GET['id_arma'];
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($conn);
        exit();
    }
    
    $armas_id = $_GET['id_arma'];
    if ($_FILES['principal_img']['type'] == 'image/jpeg' && $_FILES['principal_img']['error'] == 0) {
        if (!is_dir('img/ventas/' . $armas_id)) {
            mkdir('img/ventas/' . $armas_id);
        }
        move_uploaded_file($_FILES['principal_img']['tmp_name'], 'img/ventas/' . $armas_id . '/principal.jpg');
    }
    header("location: misarmas.php?pagina=1");
}




$sql2= "SELECT * FROM paises";
 $resultado= mysqli_query($conn, $sql2);
 if (!$resultado) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}
$paises = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$section = "vistas/divisiones_modificar.php";
require_once "vistas/layout.php";