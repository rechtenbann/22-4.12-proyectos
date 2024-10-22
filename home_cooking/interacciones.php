<?php
require_once "config.php";

// Tabla de likes


$consulta = "SELECT comidas.id, comidas.nombre, comidas.descripcion, paises.pais, COUNT(comida_likes.comida_id) as cant FROM comidas INNER JOIN comida_likes ON comidas.id = comida_likes.comida_id INNER JOIN paises ON comidas.pais_id = paises.id GROUP BY comidas.nombre ORDER BY cant DESC";
$result = mysqli_query($con, $consulta);
if(!$result){
echo "Fallo consulta: " . mysqli_errno($con);
exit();
}

$num_registros = mysqli_num_rows($result);

$pagina = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$inicio = CANT_REG_PAG * ($pagina - 1);

$registros = CANT_REG_PAG;

$consulta = "SELECT comidas.id, comidas.nombre, comidas.descripcion, paises.pais, COUNT(comida_likes.comida_id) as cant FROM comidas INNER JOIN comida_likes ON comidas.id = comida_likes.comida_id INNER JOIN paises ON comidas.pais_id = paises.id GROUP BY comidas.nombre ORDER BY cant DESC LIMIT $inicio,$registros ";
$resultado = mysqli_query($con, $consulta);
if(!$result){
echo "Fallo consulta: " . mysqli_errno($con);
exit();
}

$masLikes= mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$paginas = ceil($num_registros/CANT_REG_PAG);

//Tabla de  favoritos



$consulta = "SELECT comidas.id, comidas.nombre, comidas.descripcion, paises.pais, COUNT(favoritos.comida_id) as cant FROM comidas INNER JOIN favoritos ON comidas.id = favoritos.comida_id INNER JOIN paises ON comidas.pais_id = paises.id GROUP BY comidas.nombre ORDER BY cant DESC";
$result = mysqli_query($con, $consulta);
if(!$result){
echo "Fallo consulta: " . mysqli_errno($con);
exit();
}

$num_registros2 = mysqli_num_rows($result);

$pagina2 = (isset($_GET['paginas']) ? $_GET['paginas'] : 1);

$inicio2 = CANT_REG_PAG * ($pagina2 - 1);

$registros2 = CANT_REG_PAG;

$consulta = "SELECT comidas.id, comidas.nombre, comidas.descripcion, paises.pais, COUNT(favoritos.comida_id) as cant FROM comidas INNER JOIN favoritos ON comidas.id = favoritos.comida_id INNER JOIN paises ON comidas.pais_id = paises.id GROUP BY comidas.nombre ORDER BY cant DESC LIMIT $inicio2,$registros2 ";
$resultadoss = mysqli_query($con, $consulta);
if(!$result){
echo "Fallo consulta: " . mysqli_errno($con);
exit();
}

$masFav= mysqli_fetch_all($resultadoss, MYSQLI_ASSOC);

$pagina2s = ceil($num_registros2/CANT_REG_PAG);

$view = "interacciones";
require_once "views/layout.php";
