<?php
require_once "config.php";
require_once "sesion.php";

if (isset($_SESSION['usuario_activo'])) {
    $session = $_SESSION['usuario_activo']['id'];
} else{
    $session = '';
}




$cons = "SELECT DISTINCT paises.pais, comidas.usuario_id, comidas.fecha_alta, comidas.likes, comidas.nombre, comidas.id,comidas.pais_id,comidas.descripcion FROM comidas INNER JOIN filtros ON comidas.id = filtros.comida_id INNER JOIN paises ON paises.id = comidas.pais_id WHERE filtros.sub_categoria_id = 2";
$resultado = mysqli_query($con, $cons);
if(!$resultado){
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}


$num_registros = mysqli_num_rows($resultado);

$pagina = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$inicio = CANT_REG_PAG * ($pagina - 1);

$registros = CANT_REG_PAG;

$cons = "SELECT DISTINCT usuarios.id as usu, usuarios.nombre_usuario, paises.pais, comidas.usuario_id, comidas.fecha_alta, comidas.likes, comidas.nombre, comidas.id,comidas.pais_id,comidas.descripcion FROM comidas INNER JOIN filtros ON comidas.id = filtros.comida_id INNER JOIN paises ON paises.id = comidas.pais_id INNER JOIN usuarios ON usuarios.id = comidas.usuario_id WHERE filtros.sub_categoria_id = 2 ORDER BY comidas.id DESC LIMIT $inicio,$registros
";

$resultado = mysqli_query($con, $cons);
if(!$resultado){
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$recetas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$paginas = ceil($num_registros/CANT_REG_PAG);

$view = "maxcarrusel2";
require_once "views/layout.php";
