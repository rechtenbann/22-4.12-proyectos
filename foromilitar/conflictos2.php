<?php
require_once "includes/config.php";

$sql = "SELECT * FROM conflictos";
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
    header('location: conflictos2.php?pagina=1');
}
if($_GET['pagina'] <= 0){
    header('location: conflictos2.php?pagina=1');
}
if($_GET['pagina'] > $paginas){
    header("location: conflictos2.php?pagina=1");
}

//paginador
$sql2 = "SELECT * FROM conflictos LIMIT $iniciar,$registros";
$res2= mysqli_query($conn , $sql2);
$dou = mysqli_fetch_all($res2,MYSQLI_ASSOC);


$section = "vistas/conflictos2.php";
require_once "vistas/layout.php";

?>