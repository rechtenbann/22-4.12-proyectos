<?php
require_once "config.php";

if (isset($_SESSION['usuario_activo'])) {
    $session = $_SESSION['usuario_activo']['id'];
} else {
    $session = '';
}


$sql_sub_categorias = $sql_categorias = "";
if (isset($_POST["categoria_id"])) {
    $sql_categorias = " OR categorias.id IN (";
    foreach ($_POST["categoria_id"] as $categoria_id) {
        $sql_categorias .= $categoria_id . ", ";
    }
    $sql_categorias = substr($sql_categorias, 0, -2) . ")";
}

if (isset($_POST["subcategoria_id"])) {
    $sql_sub_categorias = " OR sub_categorias.id IN (";
    foreach ($_POST["subcategoria_id"] as $subcategoria_id) {
        $sql_sub_categorias .= $subcategoria_id . ", ";
    }
    $sql_sub_categorias = substr($sql_sub_categorias, 0, -2) . ")";
}
$pais_id = $_POST['pais'];

$sql = "SELECT  usuarios.id as usu , usuarios.nombre_usuario, paises.pais, categorias.categoria, sub_categorias.sub_categoria, comidas.* FROM filtros 
    INNER JOIN comidas ON comidas.id = filtros.comida_id 
    INNER JOIN usuarios ON usuarios.id = comidas.usuario_id
    INNER JOIN sub_categorias ON sub_categorias.id = filtros.sub_categoria_id     
    INNER JOIN categorias ON categorias.id = sub_categorias.categoria_id 
    INNER JOIN paises ON comidas.pais_id = paises.id 
    WHERE comidas.pais_id = " . $pais_id . $sql_categorias . $sql_sub_categorias;
$resultado_categoria = mysqli_query($con, $sql);
if (!$resultado_categoria) {
    echo "fallo la consulta";
}
$resultados = mysqli_fetch_all($resultado_categoria, MYSQLI_ASSOC);

$view = "filtro_busqueda";
require_once "views/layout.php";
