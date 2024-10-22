<?php
require_once "includes/config.php";
require_once "vistas/menu.php";
$sql = "SELECT * FROM armas WHERE tipo = '". $_GET['tipo']."';" ;
$res = mysqli_query($conn, $sql);

if (!$res) {
    die('Error de Consulta: ' . mysqli_errno($conn));
}
//elements for paginnation
$num_registros = mysqli_num_rows($res);
$registros = '5';
$paginas = $num_registros / $registros;
$paginas= ceil($paginas);
$iniciar = ($_GET['pagina']-1)*$registros;

//fixed bugs
if(!$_GET['pagina']){
    header("location: index.php");
}
if($_GET['pagina'] == 0){
    header('location: index.php');
}
if($_GET['pagina'] > $paginas){
    header("location: index.php");
}

//paginador
$sql2 = "SELECT * FROM armas WHERE tipo = '". $_GET['tipo']."' LIMIT $iniciar,$registros";
$res2= mysqli_query($conn , $sql2);
$armas = mysqli_fetch_all($res2,MYSQLI_ASSOC);


$section = "vistas/armas.php";
require_once "vistas/layout.php";