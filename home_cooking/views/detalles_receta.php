<?php
if (!isset($no_existe)) {
    $id = $f[0]['id'];
?>

    <div class="container marketing">
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <?php
                                    breadcrumb("Comidas", "maxcarrusel1.php");
                                    breadcrumb("Detalles de " . $f[0]['nombre'], "detalles_receta.php?id=" . $id);

                                    for ($i = 0; $i <= count($bread); $i++) {
                                        if ($i == (array_key_last($bread) + 1)) {
                                    ?> <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[0][$i] ?></li> <?php
                                                                                                                            } else {
                                                                                                                                ?> <li class="breadcrumb-item"><a href="<?php echo $bread[1][$i] ?>"><?php echo $bread[0][$i] ?> </a></li> <?php
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                    } ?>
                                </ol>
                            </nav>
                            <div id="usuario-detalles" class="cardreceta-usuario">
                                <div class="user_detalle">
                                    <div class="usuariomaxcar">
                                        <?php if (file_exists('img/user/' . $f[0]['usu'] . '/principal.jpg')) { ?>

                                            <?php if ($session != $f[0]['usu'] || $session = '') { ?>
                                                <a href="perfil2.php?id_usu=<?php echo $f[0]['usu'] ?>"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/user/<?php echo $f[0]['usu'] ?>/principal.jpg" alt="Usuario"></a>
                                            <?php } else if ($session = $f[0]['usu']) { ?>
                                                <a href="profile.php"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/user/<?php echo $f[0]['usu'] ?>/principal.jpg" alt="Usuario"></a>
                                            <?php } ?>

                                        <?php } else { ?>

                                            <?php if ($session != $f[0]['usu'] || $session = '') { ?>
                                                <a href="perfil2.php?id_usu=<?php echo $f[0]['usu'] ?>"><img width="30px" height="30px" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                                            <?php } else if ($session = $f[0]['usu']) { ?>
                                                <a href="profile.php"><img width="30px" height="30px" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                                            <?php } ?>
                                        <?php } ?>

                                    </div>
                                    <?php if ($session != $f[0]['usu'] || $session = '') { ?>
                                        <a href="perfil2.php?id_usu=<?php echo $f[0]['usu'] ?>">
                                            <p class="usuariocard"><?php echo $f[0]['nombre_usuario'] ?></p>
                                        </a>
                                    <?php } else if ($session = $f[0]['usu']) { ?>
                                        <a href="profile.php">
                                            <p class="usuariocard"><?php echo $f[0]['nombre_usuario'] ?></p>
                                        </a>
                                    <?php } ?>
                                </div>
                                <?php
                                if (isset($_SESSION['usuario_activo'])) {
                                    if ($_SESSION['usuario_activo']['id'] != $f[0]['usu']) { ?>
                                        <a id="p2" class="btn profile-edit-btn" href="../home_cooking/detalles_receta.php?seguido_id=<?php echo $f[0]['usu'] ?>&seguidor_id=<?php echo $_SESSION['usuario_activo']['id'] ?>&id=<?php echo $id ?>"><?php echo (isset($siguiendo) ? $siguiendo : 'Seguir') ?></a>
                                    <?php } ?>
                                <?php } else { ?>
                                    <a id="p2" class="btn profile-edit-btn" data-bs-toggle="modal" data-bs-target="#iniciarsesion">
                                        Seguir
                                    </a>
                                <?php } ?>
                            </div>

                            <div class="linea"></div>



                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $f[0]['nombre'] ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Publicado el <?php echo $f[0]['fecha_alta'] ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $f[0]['pais'] ?></a>

                        </header>
                        <!-- Preview image figure-->

                        <?php if (file_exists('img/recetas/' . $id . '/principal.jpg')) {  ?>
                            <figure id="img_detalle" data-bs-target="#imagen" data-bs-toggle="modal" data-bs-dismiss="modal" class="mb-4 detalle"><img src="img/recetas/<?php echo $id ?>/principal.jpg" class="img-fluid rounded" alt="Foto Comida"></figure>
                        <?php } else { ?>
                            <figure id="img_detalle" data-bs-target="#imagen" data-bs-toggle="modal" data-bs-dismiss="modal" class="mb-4 detalle"><img src="img/error.png" class="img-fluid rounded" alt="Foto Comida"></figure>
                        <?php } ?>
                        <div class="inter_detalle">
                            <?php if (isset($_SESSION['usuario_activo'])) { ?>
                                <div class="interr">
                                    <?php
                                    if (mysqli_num_rows($resultadod) == 0) { ?>
                                        <div id="<?php echo $f[0]['id'] ?>" class="like"><i id="ld" class="fa-regular fa-thumbs-up"></i> <?php echo "  $cant_like" ?> </div>

                                    <?php } else if (mysqli_num_rows($resultadod) == 1) { ?>
                                        <div id="<?php echo $f[0]['id'] ?>" class="like"><i id="ld" class="fa-solid fa-thumbs-up"></i> <?php echo "  $cant_like" ?> </div>
                                    <?php }

                                    if (mysqli_num_rows($resultadopp) == 0) { ?>
                                        <div id="fav<?php echo $f[0]['id'] ?>" class="favorito"><i id="ld" class="fa-regular fa-star"></i></div>
                                    <?php } else if (mysqli_num_rows($resultadopp) == 1) { ?>
                                        <div id="fav<?php echo $f[0]['id'] ?>" class="favorito"><i id="ld" class="fa-solid fa-star"></i></div>
                                    <?php   }
                                    ?>
                                </div>
                            <?php } else { ?>
                                <?php echo canti($f[0]['id']) ?>
                                <a data-bs-toggle="modal" data-bs-target="#iniciarsesion" title="Marcar como favorito" class="like" class="btn btn-success"><i id="ld" class="fa-regular fa-star"></i></a>

                            <?php } ?>
                        </div>

                        <!-- Post content-->
                        <section class="mb-5">
                            <h2> Descripción</h2>
                            <p class="fs-5 mb-4"><?php echo $f[0]['descripcion'] ?></p>
                            <h2>Procedimiento</h2>
                            <div class="detalles-max-width">
                                <p class="fs-5 mb-4"><?php echo $f[0]['procedimiento'] ?></p>
                            </div>


                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <?php
                                if (isset($_SESSION['usuario_activo'])) { ?>
                                    <form method="POST" action="publicar_comentario.php?anchor=text_comentario&id=<?php echo $id ?>&location=detalles_receta.php" class="mb-4"><textarea id="text_comentario" class="form-control" required rows="3" placeholder="Comenta!" name="comentario"></textarea><br><button id="btn-comentario" type="submit" class="btn btn-light"> <i class="fa-regular fa-comment"></i></button></form> <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                } else { ?>
                                    <form method="POST" action="#card-body" class="mb-4"><textarea class="form-control" required rows="3" placeholder="Comenta!" name="comentario"></textarea><br><button type="button" data-bs-toggle="modal" data-bs-target="#iniciarsesion" class="btn btn-light">Comentar <i class="fa-regular fa-comment"></i></button></form> <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                } ?>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4" id="t-c">
                                    <?php
                                    if ($existe > 0) {
                                        # code...


                                        foreach ($comentarios as $comentario) { ?>
                                            <div class="flex-shrink-0 c-t" id="caja-<?php echo $comentario['comentario_id'] ?>">
                                                <div class="usuariomaxcar">
                                                    <?php
                                                    $desarmado = explode("-", substr($comentario['fecha_alta'], 0, -9));
                                                    $revertido = array_reverse($desarmado);
                                                    $armado = implode("-", $revertido);
                                                    ?>
                                                    <?php if (file_exists('img/user/' . $comentario['id'] . '/principal.jpg')) { ?>
                                                        <?php if ($session != $comentario['id'] || $session = '') { ?>
                                                            <a href="perfil2.php?id_usu=<?php echo $comentario['id'] ?>"><img id="user" src="img/user/<?php echo $comentario['id'] ?>/principal.jpg" alt="Usuario"></a>
                                                        <?php } else if ($session = $comentario['id']) { ?>
                                                            <a href="profile.php"><img id="user" src="img/user/<?php echo $comentario['id'] ?>/principal.jpg" alt="Usuario"></a>
                                                        <?php } ?>

                                                    <?php } else { ?>
                                                        <?php if ($session != $comentario['id'] || $session = '') { ?>
                                                            <a href="perfil2.php?id_usu=<?php echo $comentario['id'] ?>"><img id="user" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                                                        <?php } else if ($session = $comentario['id']) { ?>
                                                            <a href="profile.php"><img id="user" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                                                        <?php } ?>

                                                    <?php } ?>
                                                </div>
                                                <div class="ms-3" id="text-com">
                                                    <div class="fw-bold">
                                                        <?php if ($session != $comentario['id'] || $session = '') { ?>
                                                            <a href="perfil2.php?id_usu=<?php echo $comentario['id'] ?>">
                                                                <?php echo $comentario['nombre_usuario'] ?> <a class="text-muted fst-italic mb-2" style="margin-left: 7px;"><?php echo $armado ?></a>
                                                            </a>
                                                        <?php } else if ($session = $comentario['id']) { ?>
                                                            <div>
                                                                <a href="profile.php">
                                                                    <?php echo $comentario['nombre_usuario'] ?> <a class="text-muted fst-italic mb-2" style="margin-left: 7px;"><?php echo $armado ?></a>
                                                                </a>

                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div id="comentario-<?php echo $comentario['comentario_id'] ?>">
                                                        <div class="text-com">
                                                            <p id="comentario-<?php echo $comentario['comentario_id'] ?>-texto"><?php echo $comentario['comentario'] ?></p>
                                                        </div>
                                                        <div class="comentario-likes" id="likes-<?php echo $comentario['comentario_id'] ?>">
                                                            <?php if (isset($_SESSION['usuario_activo'])) {
                                                                echo likes_comentario($comentario['comentario_id'], $f[0]['id']);
                                                                echo dislikes_comentario($comentario['comentario_id']); ?>
                                                                <?php if ($_SESSION['usuario_activo']['id'] == $comentario['id']) { ?>
                                                                    <label for="editar-<?php echo $comentario['comentario_id'] ?>"><i class="fa fa-pencil" aria-hidden="true" style="color: rgb(255, 129, 151); margin: 2px 10px 2px 2px; cursor: pointer;"></i></label><input type="button" style="visibility: hidden;" id="editar-<?php echo $comentario['comentario_id'] ?>" title="comentario" onclick="editar(<?php echo $comentario['comentario_id'] ?>);"></input>
                                                                    <a href='comentario_eliminar.php?anchor=text_comentario&tipo=comentario&comida_id=<?php echo $id ?>&comentario_id=<?php echo $comentario["comentario_id"]; ?>&location=index.php' title="Eliminar este comentario"> <i class="fa-solid fa-trash-can" style="margin-right: 12px; cursor: pointer;"></i> </a>
                                                                <?php } ?>

                                                            <?php } else { ?>

                                                                <div class="com-like"><a data-bs-toggle="modal" data-bs-target="#iniciarsesion"><i class="fa-solid fa-thumbs-up"></i></a> <?php echo $comentario['likes'] ?></div>
                                                                <div class="com-like"><a data-bs-toggle="modal" data-bs-target="#iniciarsesion"><i class="fa-solid fa-thumbs-down"></i></a> <?php echo $comentario['dislikes'] ?></div>

                                                            <?php }
                                                            if (isset($_SESSION['usuario_activo']['id'])) { ?>
                                                                <label for="responder-<?php echo $comentario['comentario_id'] ?>" style="cursor: pointer;"><i class="fa-solid fa-comment" style="cursor: pointer;"></i></label><input type="button" style="visibility: hidden; cursor: pointer;" id="responder-<?php echo $comentario['comentario_id'] ?>" title="<?php echo $comentario['comentario_id'] ?>" onclick="responder(<?php echo $comentario['comentario_id'] ?>);"></input> <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } else { ?>
                                                                <label for="responder-<?php echo $comentario['comentario_id'] ?>" style="cursor: pointer;"><i class="fa-solid fa-comment" style="cursor: pointer;"></i></label><input type="button" style="visibility: hidden; cursor: pointer;" id="responder-<?php echo $comentario['comentario_id'] ?>" title="<?php echo $comentario['comentario_id'] ?>" data-bs-toggle="modal" data-bs-target="#iniciarsesion"></input><?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?>
                                                            <?php $comentario_id = $comentario['comentario_id'] ?>

                                                        </div>

                                                        <?php
                                                        foreach ($respuestas as $respuesta) {
                                                            if ($comentario['comentario_id'] == $respuesta['comentario_id']) { ?>
                                                                <div class="linea"></div>
                                                                <div class="flex-shrink-0 c-t" id="caja-r-<?php echo $respuesta['id'] ?>">
                                                                    <div class="usuariomaxcar">
                                                                        <?php if (file_exists('img/user/' . $comentario['id'] . '/principal.jpg')) { ?>
                                                                            <?php if ($session != $comentario['id'] || $session = '') { ?>
                                                                                <a href="perfil2.php?id_usu=<?php echo $comentario['id'] ?>"><img id="user" src="img/user/<?php echo $comentario['id'] ?>/principal.jpg" alt="Usuario"></a>
                                                                            <?php } else if ($session = $comentario['id']) { ?>
                                                                                <a href="profile.php"><img id="user" src="img/user/<?php echo $comentario['id'] ?>/principal.jpg" alt="Usuario"></a>
                                                                            <?php } ?>


                                                                        <?php } else { ?>
                                                                            <?php if ($session != $comentario['id'] || $session = '') { ?>
                                                                                <a href="perfil2.php?id_usu=<?php echo $comentario['id'] ?>"><img id="user" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                                                                            <?php } else if ($session = $comentario['id']) { ?>
                                                                                <a href="profile.php"><img id="user" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                                                                            <?php } ?>

                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="ms-3" id="text-com">
                                                                        <div class="fw-bold">
                                                                            <?php if ($session != $respuesta['usuario_id'] || $session = '') { ?>
                                                                                <a href="perfil2.php?id_usu=<?php echo $respuesta['usuario_id'] ?>">
                                                                                    <?php echo $respuesta['nombre_usuario'] ?> <a class="text-muted fst-italic mb-2" style="margin-left: 7px;"><?php echo $armado ?></a>
                                                                                </a>
                                                                            <?php } else if ($session = $respuesta['usuario_id']) { ?>
                                                                                <a href="profile.php">
                                                                                    <?php echo $respuesta['nombre_usuario'] ?> <a class="text-muted fst-italic mb-2" style="margin-left: 7px;"><?php echo $armado ?></a>
                                                                                </a>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div id="respuesta-<?php echo $respuesta['id'] ?>">
                                                                            <div class="text-com">
                                                                                <p id="respuesta-<?php echo $respuesta['id'] ?>-texto"><?php echo $respuesta['comentario'] ?></p>
                                                                            </div>
                                                                            <div class="comentario-likes" id="likes-r-<?php echo $respuesta['id'] ?>">
                                                                                <?php if (isset($_SESSION['usuario_activo'])) {
                                                                                    echo likes_respuesta($respuesta['id'], $f[0]['id']);
                                                                                    echo dislikes_respuesta($respuesta['id']); ?>
                                                                                    <?php if ($_SESSION['usuario_activo']['id'] == $respuesta['usuario_id']) { ?>
                                                                                        <label for="editar-r-<?php echo $respuesta['id'] ?>"><i class="fa fa-pencil" aria-hidden="true" style="color: rgb(255, 129, 151); margin: 2px 10px 2px 2px; cursor: pointer"></i></label><input type="button" style="visibility: hidden;" id="editar-r-<?php echo $respuesta['id'] ?>" title="respuesta" onclick="editar_r(<?php echo $respuesta['id'] ?>);"></input>
                                                                                        <a href='comentario_eliminar.php?anchor=text_comentario&tipo=respuesta&comida_id=<?php echo $id ?>&comentario_id=<?php echo $respuesta["id"]; ?>&location=index.php' title="Eliminar este comentario"> <i class="fa-solid fa-trash-can" style="margin-right: 12px; cursor: pointer;"></i> </a>
                                                                                    <?php } ?>

                                                                                <?php } else { ?>

                                                                                    <div class="com-like"><a data-bs-toggle="modal" data-bs-target="#iniciarsesion"><i class="fa-solid fa-thumbs-up"></i></a> <?php echo $respuesta['likes'] ?></div>
                                                                                    <div class="com-like"><a data-bs-toggle="modal" data-bs-target="#iniciarsesion"><i class="fa-solid fa-thumbs-down"></i></a> <?php echo $respuesta['dislikes'] ?></div>

                                                                                <?php }
                                                                                if (isset($_SESSION['usuario_activo']['id'])) { ?>
                                                                                    <label for="responder-<?php echo $respuesta['id'] ?>" style="cursor: pointer;"><i class="fa-solid fa-comment"></i></label><input type="button" style="visibility: hidden; cursor: pointer;" id="responder-<?php echo $respuesta['id'] ?>" title="<?php echo $respuesta['id'] ?>" onclick="responder_r(<?php echo $comentario['comentario_id'] ?>, <?php echo $respuesta['id'] ?>);"></input> <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                } else { ?>
                                                                                    <label for="responder-<?php echo $comentario['comentario_id'] ?>" style="cursor: pointer;"><i class="fa-solid fa-comment" style="cursor: pointer;"></i></label><input type="button" style="visibility: hidden; cursor: pointer;" id="responder-<?php echo $comentario['comentario_id'] ?>" title="<?php echo $comentario['comentario_id'] ?>" data-bs-toggle="modal" data-bs-target="#iniciarsesion"></input> <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?>
                                                                            </div>

                                                                        </div>

                                                                        <div id="textbox-r-<?php echo $respuesta['id'] ?>"></div>

                                                                    </div>
                                                                </div> <?php
                                                                    }
                                                                } ?>
                                                    </div>

                                                </div>


                                            </div> <?php
                                                }
                                            } else { ?>

                                        <div class="flex-shrink-0">

                                            <div class="ms-3">

                                                <p>¡Haz el primer comentario!</p>


                                            </div>
                                        </div>
                                    <?php }         ?>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div id="ingredientes"><i class="fas fa-list-ul"></i> Categorías</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!"><?php echo $categorias[4]['categoria']; ?></a></li>
                                        <li><a href="#!">En proceso</a></li>
                                        <li><a href="#!">En proceso</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">En proceso</a></li>
                                        <li><a href="#!">En proceso</a></li>
                                        <li><a href="#!">En proceso</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div id="ingredientes"><i class="fas fa-shopping-cart"></i> Ingredientes</div>
                        <div class="card-body"><?php echo $f[0]['ingredientes'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("views/aviso.php") ?>



    <span class="metadata" id="metadata-id" title="<?php echo $id ?>"></span>
    <script src="js/comentario.js"></script>
    <script src="js/like_detalle.js"></script>
    <script src="js/favorito_detalle.js"></script>
    <script src="js/like_comentario.js"></script>
    <script src="js/dislike_comentario.js"></script>
    <script src="js/dislike_respuesta.js"></script>
<?php
} else {
?>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 style="color: rgb(252, 82, 96);" class="display-1 fw-bold">404</h1>
            <p class="fs-3" style="color: rgb(55, 75, 115);"> <span class="text-danger">Opps!</span> Pagina no encontrada.</p><br>
            <p style="color: rgb(55, 75, 115);" class="lead">
                Lo sentimos, esta pagina no existe o no se encuentra disponile en estos momentos, es posible que la receta haya sido eliminada por el autor.
            </p>
            <a href="index.php" class="btn btn-primary">Volver al inicio</a>
        </div>
    </div>
<?php
}
?>

<div class="modal" tabindex="-1" role="dialog" id="imagen">
    <div id="roblox" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?php if (file_exists('img/recetas/' . $id . '/principal.jpg')) {  ?>
                <img src="img/recetas/<?php echo $id ?>/principal.jpg" class="img-fluid rounded" class="img-fluid rounded" alt="Foto Comida">
            <?php } else { ?>
                <img src="img/error.png" class="img-fluid rounded" class="img-fluid rounded" alt="Foto Comida"> <?php } ?>

        </div>
    </div>
</div>
</div>