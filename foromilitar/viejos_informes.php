<?php

require_once "includes/config.php";
$sql = "SELECT * FROM informes ORDER BY fecha_alta ASC";
$res = mysqli_query($conn , $sql);
if (!$res) {
  die('Error de Consulta: ' . mysqli_errno($conn));
}

//element for paginnation
$num_registros = mysqli_num_rows($res);
$registros = '8';
$paginas = $num_registros / $registros;
$paginas= ceil($paginas);
$iniciar = ($_GET['pagina']-1)*$registros;

//fixed bugs
if(!$_GET['pagina']){
    header('location: informes2.php?pagina=1');
}
if($_GET['pagina'] <= 0){
    header('location: informes2.php?pagina=1');
}
if($_GET['pagina'] > $paginas){
    header("location: informes2.php?pagina=1");
}

//paginador
$sql2 = "SELECT * FROM informes ORDER BY fecha_alta ASC LIMIT $iniciar,$registros";
$res2= mysqli_query($conn , $sql2);
$informes = mysqli_fetch_all($res2,MYSQLI_ASSOC);

$section = "vistas/informes2.php";
require_once "vistas/layout.php";
?>