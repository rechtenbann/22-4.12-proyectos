<?php
require_once "config.php";



$consulta = "SELECT comidas.id, CONVERT(comidas.fecha_alta, DATE) as fecha_alta , comidas.nombre, comidas.descripcion, paises.pais FROM comidas INNER JOIN paises ON comidas.pais_id = paises.id ORDER BY comidas.id DESC";
$resultado = mysqli_query($con, $consulta);
if(!$resultado){
    echo "Fallo la consulta: " . mysqli_error($con);
    exit();
}
$sql_cate = "SELECT categorias.id , categorias.categoria , sub_categorias.sub_categoria FROM categorias INNER JOIN sub_categorias ON categorias.id = sub_categorias.categoria_id";
$resultate = mysqli_query($con, $sql_cate);
if (!$resultate) {
    echo "algo salio mal papu";
}
$cmamo = mysqli_fetch_all($resultate, MYSQLI_ASSOC);

$num_registros = mysqli_num_rows($resultado);

$pagina = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$inicio = CANT_REG_PAG * ($pagina - 1);

$registros = CANT_REG_PAG;

$consulta = "SELECT comidas.id, CONVERT(comidas.fecha_alta, DATE) as fecha_alta, comidas.nombre, comidas.descripcion, paises.pais FROM comidas INNER JOIN paises ON comidas.pais_id = paises.id  ORDER BY comidas.id DESC LIMIT $inicio,$registros ";
$result = mysqli_query($con, $consulta);
if(!$result){
    echo "Fallo la consulta: " . mysqli_error($con);
    exit();
}
$sql_cate = "SELECT categorias.id , categorias.categoria , sub_categorias.sub_categoria FROM categorias INNER JOIN sub_categorias ON categorias.id = sub_categorias.categoria_id";
$resultate = mysqli_query($con, $sql_cate);
if (!$resultate) {
    echo "algo salio mal papu";
}
$cmamo = mysqli_fetch_all($resultate, MYSQLI_ASSOC);
$recetas = mysqli_fetch_all($result, MYSQLI_ASSOC);

$paginas = ceil($num_registros/CANT_REG_PAG);

$view = "tabla_recetas";
require_once "views/layout.php";
