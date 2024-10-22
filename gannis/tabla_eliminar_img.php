<?php 
include("config.php");

$id = $_GET['id']; //obtiene el id por metodo GET

$query = "DELETE FROM imagenes WHERE id = '$id'"; //consulta que elimina la fila de imagenes cuyo ID coincida con el que se obtuvo
$r = mysqli_query($con, $query); //se ejecuta la consulta
 
if(!$r){ //en caso de error, se corta el proceso y se imprime el error en la pantalla
    die("Error consulta: " . mysqli_error($con));
}

header("Location: mascota_con.php"); //se redirige a pestaña de mascotas
