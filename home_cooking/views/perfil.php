<header>

    <div class="container" id="p2">

        <div class="profile" id="p2">

            <div class="profile-image">

                <?php if (file_exists('img/user/' . $usuario['id'] . '/principal.jpg')) { ?>
                    <img id="p20" src="img/user/<?php echo $usuario['id'] ?>/principal.jpg" alt="">
                <?php  } else { ?>
                    <img id="p20" src="img/usuario.jpg" alt="">
                <?php } ?>
            </div>

            <div class="profile-user-settings">

                <h1 class="profile-user-name"><?php echo $usuario['nombre_usuario'] ?></h1>

                <!--<button id="p2" class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>-->

            </div>
            <div class="profile-stats">

                <ul id="lip2">
                    <li><span class="profile-stat-count"><?php echo $cant_rec_usu ?></span> Publicaciones</li>
                    <li>
                        <a type="button" class="" data-bs-toggle="modal" data-bs-target="#seguidores">
                            <span class="profile-stat-count"><?php echo $seguidores ?></span> Seguidores
                        </a>
                    </li>
                    <li>
                        <a type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="profile-stat-count"><?php echo $seguiendo ?></span> Seguidos
                        </a>
                    </li>
                </ul>

            </div>

            <div class="profile-bio">

                <p id="pp2"><span class="profile-real-name"><?php echo $usuario['nombre'] ?></span></p>
                <p id="pp2"><?php echo $usuario['biografia'] ?></p>

            </div>

        </div>
        <!-- End of profile section -->

    </div>
    <!-- End of container -->

</header>

<main>

    <div class="container" id="p2">

        <div class="gallery">
            <div class=" col-lg-6" id="perfil-inter">

                <div class="demo-inline-spacing mt-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <?php
                            breadcrumb("Perfil", "perfil.php");

                            for ($i = 0; $i < count($bread); $i++) {
                                if ($i == array_key_last($bread)) {
                            ?> <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[0][$i] ?></li> <?php
                                                                                                                        } else {
                                                                                                                            ?> <li class="breadcrumb-item"><a href="<?php echo $bread[1][$i] ?>"><?php echo $bread[0][$i] ?> </a></li> <?php
                                                                                                                                        }
                                                                                                                                    } ?>

                        </ol>
                    </nav>
                    <?php echo (isset($msj) ? $msj : ''); ?>
                    <div class="list-group list-group-horizontal-md text-md-center">

                        <a class="list-group-item list-group-item-action active" id="home-list-item" data-bs-toggle="list" href="#horizontal-home">Publicaciones</a>
                        <a class="list-group-item list-group-item-action" id="profile-list-item" data-bs-toggle="list" href="#horizontal-profile">Favoritos</a>
                        <a class="list-group-item list-group-item-action" id="messages-list-item" data-bs-toggle="list" href="#horizontal-messages">Editar perfil</a>
                        <a class="list-group-item list-group-item-action" id="messages-list-item" data-bs-toggle="list" href="#horizontal-settings">Seguridad</a>
                    </div>
                    <div class="tab-content px-0 mt-0">
                        <div class="tab-pane fade show active" id="horizontal-home">

                            <section id="perfil-1-buscador">
                                <button onclick="location.href='receta_alta.php'" type="button" class="btn btn-outline-danger" id="perfil-boton-nr">
                                    <div class="perfil-text-nr">
                                        <div id="perfil-icon-mas">+</div>
                                        <div class="perfil-text-nr-t">Nueva receta</div>
                                    </div>
                                </button>
                                <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                            </section>
                            <section id="tabla_resultado">

                            </section>
                        </div>
                        <div class="tab-pane fade" id="horizontal-profile">
                            <section id="perfil-1-buscador_fav">
                                <input class="form-control" type="text" name="busqueda_fav" id="busqueda_fav" placeholder="Buscar">
                            </section>

                            <section id="tabla_favoritos">

                            </section>
                        </div>
                        <div class="tab-pane fade" id="horizontal-messages">
                            <form enctype="multipart/form-data" method="POST" class="row g-3">
                                <div class="col-12" id="foto_user">
                                    <label for="principal_img" class="form-label">Cambiar foto de perfil</label>
                                    <input class="form-control" name="img_usu" type="file" id="usu_img">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" value="<?php echo  $usuario['nombre'] ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Usuario</label>
                                    <input type="text" name="nombre_usuario" value="<?php echo  $usuario['nombre_usuario'] ?>" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Biografía</label>
                                        <textarea placeholder="Cuentanos sobre ti" maxlength="80" class="form-control" name="biografia" id="exampleFormControlTextarea1" rows="3"><?php echo  $usuario['biografia'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-light">Actualizar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="horizontal-settings">
                            <form enctype="multipart/form-data" method="POST" class="row g-3">
                                <div class="col-12" id="foto_user">
                                    <h4 for="principal_img" class="form-label">Cambiar contraseña</h4>
                                    <label for="">Contraseña actual</label>
                                    <input type="password" name="contrasena_act" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Nueva contraseña</label>
                                    <input type="password" name="contrasena_nue" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Repita contraseña</label>
                                    <input type="password" name="contrasena_rep" class="form-control" id="inputPassword4" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-light">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <!-- End of gallery -->



    </div>
    <!-- End of container -->

</main>
<?php require_once('modal-seguidos.php') ?>
<?php require_once('model-seguidores.php') ?>
<script src="js/favoritos.js"></script>

<script src="js/perfil.js"></script>

