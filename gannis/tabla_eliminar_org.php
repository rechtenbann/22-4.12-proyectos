<?php
include("config.php");

require_once "session_start.php";

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
else {
    if ($_SESSION['usuario']['rol_id'] != 3) {
        header('Location: index.php');
    }
}

$id = $_GET['id']; //obtiene el id por metodo GET

$query = "DELETE FROM usuarios WHERE id = '$id'"; //consulta que elimina la fila de mascotas cuyo ID coincida con el que se obtuvo
$r = mysqli_query($con, $query); //se ejecuta la consulta

if (!$r) { //en caso de error, se corta el proceso y se imprime el error en la pantalla
  die("Error consulta: " . mysqli_error($con));
}

header("Location: listado_organizaciones.php"); //se redirige a pestaña de listados
