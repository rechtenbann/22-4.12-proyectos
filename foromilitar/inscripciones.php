<?php 
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
    header("location:index.php"); 
  }

//provincias
$sql= "SELECT * FROM provincias";
$res= mysqli_query($conn , $sql);
if (!$res) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}
$provincias = mysqli_fetch_all($res, MYSQLI_ASSOC);

//localidades
$consulta= "SELECT * FROM localidades";
$resultado = mysqli_query($conn, $consulta);
if (!$resultado) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}
$localidades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

if(isset($_POST['nombre'])){
    $sql2="INSERT INTO inscripciones VALUES(null, '".$_POST['nombre']."' , '".$_POST['apellido']."' , '".$_POST['edad']."', '".$_POST['telefono']."' , '".$_POST['correo']."' , '".$_POST['genero']."' , '".$_POST['nacionalidad']."' , '".$_POST['nacimiento']."' , '".$_POST['dni']."' , '".$_POST['id_provincia']."' , '".$_POST['id_localidad']."' , '".$_POST['enfermedad']."')" ;
    $res2 = mysqli_query($conn , $sql2);
    if (!$res2) {
        die('Error de Consulta: ' . mysqli_errno($conn));
    }
    header("Location: index.php");
}



$section= "vistas/inscripciones.php";
require_once "vistas/layout.php"

?>