<?php
require_once "includes/config.php";
if (!isset($_SESSION['usu'])) {
  header("location:index.php"); 
}
require_once "vistas/menu2.php";



$nombre = $_SESSION['usu']['nombre'];

$sql="SELECT * FROM venta_de_armas INNER JOIN paises ON  paises.id = venta_de_armas.nacioanlidad WHERE usuario='$nombre'ORDER BY fecha_alta DESC";
$res=mysqli_query($conn, $sql);
if (!$res) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}


$num_registros = mysqli_num_rows($res);
$registros = '6';
$paginas = $num_registros / $registros;
$paginas= ceil($paginas);
$iniciar = ($_GET['pagina']-1)*$registros;



//paginador
$sql2 = "SELECT * FROM venta_de_armas INNER JOIN paises ON  paises.id = venta_de_armas.nacioanlidad WHERE usuario='$nombre' ORDER BY fecha_alta DESC LIMIT $iniciar,$registros";
$res2= mysqli_query($conn , $sql2);
$venta=mysqli_fetch_all($res2,MYSQLI_ASSOC);
$total_registros = mysqli_num_rows($res2);






$section = "vistas/misarmas.php";
require_once "vistas/layout.php";

?>