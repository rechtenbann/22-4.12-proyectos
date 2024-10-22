<?php
require_once('config.php');
require_once('sesion.php');
$usu = $_SESSION['usuario_activo']['id'];

$publi_fav = '';

$cons = "SELECT DISTINCT comidas.id , comidas.nombre, comidas.descripcion, comidas.fecha_alta FROM favoritos RIGHT JOIN comidas ON favoritos.comida_id = comidas.id WHERE favoritos.usuario_id =  $usu ORDER BY comidas.id DESC";
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cantidad = mysqli_num_rows($resultado);

if ($cantidad > 0) {



    $qry = "SELECT DISTINCT comidas.id , comidas.nombre, comidas.descripcion, comidas.fecha_alta FROM favoritos RIGHT JOIN comidas ON favoritos.comida_id = comidas.id WHERE favoritos.usuario_id =  $usu ORDER BY comidas.id DESC";


    if (isset($_POST['favoritos'])) {
        $q = $con->real_escape_string($_POST['favoritos']);
        $qry = "SELECT DISTINCT comidas.id , comidas.nombre, comidas.descripcion, comidas.fecha_alta FROM favoritos RIGHT JOIN comidas ON favoritos.comida_id = comidas.id WHERE favoritos.usuario_id =  $usu AND
		comidas.nombre LIKE  '%" . $q . "%' OR 
        comidas.descripcion LIKE  '%" . $q . "%' AND favoritos.usuario_id = $usu ORDER BY comidas.id DESC";
    }

    $buscarFavoritos = $con->query($qry);
    if ($buscarFavoritos->num_rows > 0) {
        $recetas_usu = mysqli_fetch_all($buscarFavoritos, MYSQLI_ASSOC);
        foreach ($recetas_usu as $receta) {
            $publi_fav .= '  <div class="card mb-3" id="perfil-1-card"> ';

            $publi_fav .= '<div class="row g-0" id="perfil-1-contenedor">';
            $publi_fav .= '<div class="col-md-4" id="perfil-1-con-img"> ';
            $publi_fav .= '<a class="perfil-1-link" href="../home_cooking/detalles_receta.php?id=' .  $receta["id"] . '&location=index.php">';
            if (file_exists("img/recetas/" . $receta['id'] . "/principal.jpg")) {
                $publi_fav .= '  <img class="img-fluid rounded-start" id="perfil-1-img" src="img/recetas/' . $receta['id'] . '/principal.jpg" alt="Receta">';
            } else {
                $publi_fav .= '  <img class="img-fluid rounded-start" id="perfil-1-img" src="img/error.png" alt="Receta">';
            }
            $publi_fav .= '</a>';
            $publi_fav .= '</div>';
            $publi_fav .= ' <div class="col-md-8" id="perfil-1-con-body">';
            $publi_fav .= '<div class="card-body" id="perfil-1-body"> ';
            $publi_fav .= '<a class="perfil-1-link" href="../home_cooking/detalles_receta.php?id=' .  $receta["id"] . '&location=index.php">';
            $publi_fav .= ' <div class="perfil-head">';
            $publi_fav .= ' <h5 class="card-title" id="perfil-1-titulo">' . $receta['nombre'] . '</h5>';
            $publi_fav .= '</div>';
            $publi_fav .= '<div class="linea" id="perfil-linea"></div>';
            $publi_fav .= ' <p class="card-text" id="perfil-1-descripcion_fav">' .  $receta['descripcion'] . '</p>';
            $publi_fav .= '</a>';
            $publi_fav .= '<div class="perfil-1-abajo">';

            $cons = "SELECT DISTINCT * FROM favoritos WHERE comida_id=" . $receta["id"] . " AND  usuario_id =" . $_SESSION['usuario_activo']['id'];
            $resultado = mysqli_query($con, $cons);
            if (!$resultado) {
                echo "Fallo consulta: " . mysqli_error($con);
                exit();
            }

            if (mysqli_num_rows($resultado) == 0) {
                $publi_fav .= '<div id="fav' .  $receta["id"] . '" class="favorito"><i class="fa-regular fa-star"></i></div>';
            } else if (mysqli_num_rows($resultado) == 1) {
                $publi_fav .= '<div id="fav' . $receta["id"] . '" class="favorito"><i class="fa-solid fa-star"></i></div>';
            }

            $publi_fav .= ' <div class="perfil-btn">';

            $publi_fav .= '</div>';
            $publi_fav .= '</div>';
            $publi_fav .= '</div>';
            $publi_fav .= '</div>';
            $publi_fav .= '</div>';

            $publi_fav .= '</div>';
        }
    } else {
        $publi_fav = "No se encontraron resultados.";
    }
} else {
    $publi_fav = 'No tienes favoritos';
}
echo $publi_fav;?>

<script src="js/favorito.js"></script>
