<?php require_once("sesion.php") ?>
<br>
<br>
<H1> RESULTADOS FILTRADOS </H1>

<div class="container marketing">
  <?php echo (isset($msj) ? $msj : ''); ?> 

  <?php if (isset($resultados)) { ?>
    <main id="main-cont">
      <div class="conmaxcar">
        <?php foreach ($resultados as $resultado) { ?>
          <article>
            <div class="col">
              <div class="card" id="max-car-card">
                <?php if (file_exists('img/recetas/' . $resultado['id'] . '/principal.jpg')) {  ?>
                  <img id="img-maxcard" src="img/recetas/<?php echo $resultado['id'] ?>/principal.jpg" class="img-fluid rounded-start" alt="...">
                <?php } else { ?>
                  <img id="img-maxcard" src="img/error.png" class="img-fluid rounded-start" alt="...">

                <?php } ?>

                <div class="card-body" id="max-car-card-body">

                  <div class="cardreceta-usuario">

                    <?php if (file_exists('img/user/' . $resultado['usu'] . '/principal.jpg')) { ?>

                      <?php if ($session != $resultado['usu'] || $session = '') { ?>
                        <a href="perfil2.php?id_usu=<?php echo $resultado['usu'] ?>"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/user/<?php echo $resultado['usu'] ?>/principal.jpg" alt="Usuario"></a>
                      <?php } else if ($session = $resultado['usu']) { ?>
                        <a href="profile.php"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/user/<?php echo $resultado['usu'] ?>/principal.jpg" alt="Usuario"></a>
                      <?php } ?>

                    <?php } else { ?>

                      <?php if ($session != $resultado['usu'] || $session = '') { ?>
                        <a href="perfil2.php?id_usu=<?php echo $resultado['usu'] ?>"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                      <?php } else if ($session = $resultado['usu']) { ?>
                        <a href="profile.php"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                      <?php } ?>
                    <?php } ?>

                    <?php if ($session != $resultado['usu'] || $session = '') { ?>
                      <a href="perfil2.php?id_usu=<?php echo $resultado['usu'] ?>">
                        <p class="usuariocard"><?php echo $resultado['nombre_usuario'] ?></p>
                      </a>
                    <?php } else if ($session = $resultado['usu']) { ?>
                      <a href="profile.php">
                        <p class="usuariocard"><?php echo $resultado['nombre_usuario'] ?></p>
                      </a>
                    <?php } ?>

                  </div>

                  <div class="linea"></div>
                  <h5 class="card-title"> <div class="con res"><?php echo $resultado['nombre']; ?></div> </h5>
                  <p class="card-text"><small class="text-muted"><?php echo $resultado['pais'] ?></small></p>

                  <div class="interacciones">

                    <?php if (isset($_SESSION['usuario_activo'])) { ?>
                      <div>
                        <a href='../home_cooking/marcar_favorito.php?id=<?php echo $resultado["id"]; ?>&location=index.php&usu_id=<?php echo $_SESSION['usuario_activo']['id'] ?>' id="fav_detalle max" title="Marcar como favorito" class="btn btn-success"><i class="fa-regular fa-star"></i></a>
                        <a href='../home_cooking/like_recetas.php?id=<?php echo $resultado["id"]; ?>&location=index.php' id="like_detalle max" title="Like" class="btn btn-success"><i class="fa-solid fa-thumbs-up" id="ld"></i><?php echo  $resultado['likes'] ?></a>
                      </div>
                      <div>
                        <a href='../home_cooking/detalles_receta.php?id=<?php echo $resultado["id"]; ?>&location=index.php' title="Ver a detalle" class="btn btn-success">Leer Más</a>

                      </div>
                    <?php } else { ?>
                      <div>
                        <a data-bs-toggle="modal" data-bs-target="#iniciarsesion" id="fav_detalle max" title="Marcar como favorito" class="btn btn-success"><i class="fa-regular fa-star"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#iniciarsesion" id="like_detalle max" title="Like" class="btn btn-success"><i class="fa-solid fa-thumbs-up" id="ld"></i><?php echo  $resultado['likes'] ?></a>
                      </div>
                      <div>
                        <a href='../home_cooking/detalles_receta.php?id=<?php echo $resultado["id"]; ?>&location=index.php' title="Ver a detalle" class="btn btn-success">Leer Más</a>
                      </div>

                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </article>
        <?php } ?>
      </div>

    </main>
  <?php } ?>

</div><?php require_once("views/aviso.php") ?>
<script src="js/favorito.js"></script>
<script src="js/like.js"></script>