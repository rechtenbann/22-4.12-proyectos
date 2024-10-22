<?php require_once "sesion.php";
require_once "config.php";
$usu = $_SESSION['usuario_activo']['id'];



$consulta = "SELECT * FROM `favoritos` INNER JOIN usuarios ON favoritos.usuario_id=usuarios.id INNER JOIN comidas ON favoritos.comida_id = comidas.id WHERE favoritos.usuario_id = '$usu'";
$resultado = mysqli_query($con, $consulta);

$cant_total = mysqli_num_rows($resultado);

$pag = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$desde = CANT_REG_PAG * ($pag - 1);

$por_pag = CANT_REG_PAG;

$consulta = "SELECT * FROM `favoritos` INNER JOIN usuarios ON favoritos.usuario_id=usuarios.id INNER JOIN comidas ON favoritos.comida_id = comidas.id INNER JOIN paises ON paises.id = comidas.pais_id WHERE favoritos.usuario_id ='$usu' LIMIT $desde, $por_pag";
$resultad = mysqli_query($con, $consulta);

$favoritos = mysqli_fetch_all($resultad,MYSQLI_ASSOC);



$cant_pag = ceil($cant_total/CANT_REG_PAG);
$view = "tabla_favoritos";
require_once "views/layout.php";
