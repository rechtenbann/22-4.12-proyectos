<?php
require_once "config.php";
require_once "sesion.php";

$busqueda = preg_replace('([^A-Za-z0-9 ])', ' ', $_GET['busqueda']) ;

if (isset($_SESSION['usuario_activo'])) {
    $session = $_SESSION['usuario_activo']['id'];
} else {
    $session = '';
}

if (isset($_GET['busqueda'])) {

    if ($busqueda == '') {
        header('location: index.php');
    } else {
        $consulta = "SELECT  usuarios.id as usu , usuarios.nombre_usuario, comidas.nombre, comidas.likes, comidas.ingredientes, comidas.descripcion, paises.pais, comidas.id FROM comidas INNER JOIN paises ON paises.id = comidas.pais_id INNER JOIN usuarios ON usuarios.id = comidas.usuario_id WHERE comidas.nombre LIKE '%$busqueda%' or comidas.ingredientes LIKE '%$busqueda%' or comidas.descripcion LIKE '%$busqueda%' or paises.pais LIKE '%$busqueda%';";
        $result = mysqli_query($con, $consulta);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        $num_registros = mysqli_num_rows($result);

        if ($num_registros == 0) {
            $msj = "<h3 class='titulomaxcar'>No se encontraron resultados para la busqueda: " . $busqueda . "</h3>";
        } else {
            $msj = "<h6 class='titulomaxcarsi'> Cantidad de resultados para " . $busqueda . ": " . $num_registros . "</h6>";
        }
        $pagina = (isset($_GET['pag']) ? $_GET['pag'] : 1);

        $inicio = CANT_REG_PAG * ($pagina - 1);

        $registros = CANT_REG_PAG;

        $consulta = "SELECT  usuarios.id as usu , usuarios.nombre_usuario, comidas.nombre, comidas.likes, comidas.ingredientes, comidas.descripcion, paises.pais, comidas.id FROM comidas INNER JOIN paises ON paises.id = comidas.pais_id INNER JOIN usuarios ON usuarios.id = comidas.usuario_id WHERE comidas.nombre LIKE '%$busqueda%' or comidas.ingredientes LIKE '%$busqueda%' or comidas.descripcion LIKE '%$busqueda%' or paises.pais LIKE '%$busqueda%' ORDER BY comidas.id DESC LIMIT $inicio,$registros ";
        $result = mysqli_query($con, $consulta);
        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($con);
            exit();
        }

        $resultados = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $paginas = ceil($num_registros / CANT_REG_PAG);
    }
}

$view = "busqueda";

require_once "views/layout.php";
