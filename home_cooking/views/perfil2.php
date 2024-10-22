<?php require_once("sesion.php");?>
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
                <?php
                if (isset($_SESSION['usuario_activo'])) { ?>
                    <a id="p2" class="btn profile-edit-btn" href="../home_cooking/perfil2.php?seguido_id=<?php echo $usuario['id'] ?>&seguidor_id=<?php echo $_SESSION['usuario_activo']['id'] ?>&id_usu=<?php echo $usuario['id'] ?>"><?php echo (isset($siguiendo)?$siguiendo: 'Seguir') ?></a>
                <?php } else { ?>
                    <a id="p2" class="btn profile-edit-btn" data-bs-toggle="modal" data-bs-target="#iniciarsesion">
                        Seguir
                    </a>
                <?php } ?>
                <!--<button id="p2" class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>-->

            </div>
            <div class="profile-stats">

                <ul id="lip2">
                    <li><span class="profile-stat-count"><?php echo $usuario['cant_com'] ?></span> Publicaciones</li>
                    <li><span class="profile-stat-count"><?php echo $seguidores['seguidores'] ?></span> Seguidores</li>
                    <li><span class="profile-stat-count"><?php echo $seguiendo['seguiendo'] ?></span> Seguidos</li>
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

            <?php foreach ($comidas as $comida) { ?>
                <div class="gallery-item" tabindex="0">



                    <?php if (file_exists('img/recetas/' .  $comida['id'] . '/principal.jpg')) {  ?>
                        <img id="p2" src="img/recetas/<?php echo $comida['id'] ?>/principal.jpg" class="gallery-image" alt="">
                    <?php } else { ?>
                        <img id="p2" src="img/error.png" class="gallery-image" alt="">

                    <?php } ?>


                    <p><?php echo $comida['nombre'] ?></p>
                    <a href="../home_cooking/detalles_receta.php?id=<?php echo $comida["id"]; ?>&location=index.php">
                        <div class="gallery-item-info">

                            <ul class="likess">
                                <?php echo cant($comida['id']); ?>
                                
                                <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> <?php echo $comida['cant'] ?></li>

                            </ul>

                        </div>
                    </a>
                </div>
            <?php  } ?>




        </div>
        <!-- End of gallery -->



    </div>
    <!-- End of container -->

</main>

<?php require_once("views/aviso.php") ?>