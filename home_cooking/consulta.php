<?php
require_once('config.php');
require_once('sesion.php');
$usu = $_SESSION['usuario_activo']['id'];

$publicacion = '';

$cons = "SELECT * FROM comidas WHERE usuario_id = $usu ORDER BY comidas.id DESC";
$resultado = mysqli_query($con, $cons);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cantidad = mysqli_num_rows($resultado);

if ($cantidad > 0) {

    

    $query = "SELECT * FROM comidas WHERE usuario_id = $usu ORDER BY comidas.id DESC";

    if (isset($_POST['alumnos'])) {
        $q = $con->real_escape_string($_POST['alumnos']);
        $query = "SELECT * FROM comidas WHERE usuario_id = $usu AND
    nombre LIKE '%" . $q . "%' OR
    descripcion LIKE '%" . $q . "%' AND usuario_id = $usu OR 
    fecha_alta LIKE '%" . $q . "%' AND usuario_id = $usu ORDER BY comidas.id DESC";
    }

    $buscarAlumnos = $con->query($query);
    if ($buscarAlumnos->num_rows > 0) {
        $recetas_usu = mysqli_fetch_all($buscarAlumnos, MYSQLI_ASSOC);
        foreach ($recetas_usu as $receta) {
            $publicacion .= '  <div class="card mb-3" id="perfil-1-card"> ';

            $publicacion .= '<div class="row g-0" id="perfil-1-contenedor">';
            $publicacion .= '<div class="col-md-4" id="perfil-1-con-img"> ';
            $publicacion .= '<a class="perfil-1-link" href="../home_cooking/detalles_receta.php?id=' .  $receta["id"] . '&location=index.php">';
            if (file_exists("img/recetas/" . $receta['id'] . "/principal.jpg")) {
                $publicacion .= '  <img class="img-fluid rounded-start" id="perfil-1-img" src="img/recetas/' . $receta['id'] . '/principal.jpg" alt="Receta">';
            } else {
                $publicacion .= '  <img class="img-fluid rounded-start" id="perfil-1-img" src="img/error.png" alt="Receta">';
            }
            $publicacion .= '</a>';
            $publicacion .= '</div>';
            $publicacion .= ' <div class="col-md-8" id="perfil-1-con-body">';
            $publicacion .= '<div class="card-body" id="perfil-1-body"> ';
            $publicacion .= '<a class="perfil-1-link" href="../home_cooking/detalles_receta.php?id=' .  $receta["id"] . '&location=index.php">';
            $publicacion .= ' <div class="perfil-head">';
            $publicacion .= ' <h5 class="card-title" id="perfil-1-titulo">' . $receta['nombre'] . '</h5>';
            $publicacion .= '  <div class="perfil-btn-head"> <a href="receta_eliminar.php?receta_id=' . $receta["id"] . '&location=profile.php" title="Eliminar de esta publicacion" id="perfil-icon-basura"> <i id="perfil-icon" class="fa-solid fa-trash-can"></i> </a>';
            $publicacion .= ' <a href="receta_modificar.php?receta_id=' . $receta['id'] . '&location=profile.php" role="button"></i><i id="perfil-icon" class="fa-solid fa-pen-to-square"></i></a>';
            $publicacion .= '</div>';
            $publicacion .= '</div>';
            $publicacion .= '<div class="linea" id="perfil-linea"></div>';
            $publicacion .= ' <p class="card-text" id="perfil-1-descripcion">' .  $receta['descripcion'] . '</p>';
            $publicacion .= '</a>';
            $publicacion .= '<div class="perfil-1-abajo">';
            $publicacion .= ' <p class="card-text" id="perfil-1-complemento"><small class="text-muted">' . $receta['fecha_alta'] . '</small> </p>';
            $publicacion .= ' <div class="perfil-btn">';

            $publicacion .= '</div>';
            $publicacion .= '</div>';
            $publicacion .= '</div>';
            $publicacion .= '</div>';
            $publicacion .= '</div>';

            $publicacion .= '</div>';
        }
    } else {
        $publicacion = "No se encontraron resultados.";
    }


    
} else {
    $publicacion = 'No tienes publicaciones';
}

echo $publicacion;