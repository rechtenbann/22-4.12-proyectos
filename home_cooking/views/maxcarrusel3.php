<div class="container marketing">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin-top: 60px">

      <?php
      breadcrumb("Carrusel de comidas para celiacos", "maxcarrusel3.php");

      for ($i = 0; $i < count($bread); $i++) {
        if ($i == array_key_last($bread)) {
      ?> <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[0][$i] ?></li> <?php
                                                                                                } else {
                                                                                                  ?> <li class="breadcrumb-item"><a href="<?php echo $bread[1][$i] ?>"><?php echo $bread[0][$i] ?> </a></li> <?php
                                                                                                                                                                                                              }
                                                                                                                                                                                                            } ?>
    </ol>
  </nav>
  <h3 class="titulomaxcar">Recetas de tus compañeros de cocina:</h3>

  <main id="main-cont">
    <div class="conmaxcar">
      <?php foreach ($recetas as $sin_TACC) { ?>
        <article>
          <div class="col">
            <div class="card" id="max-car-card">
              <a href='../home_cooking/detalles_receta.php?id=<?php echo $sin_TACC["id"]; ?>&location=maxcarrusel3.php' title="Ver a detalle">
                <?php if (file_exists('img/recetas/' . $sin_TACC['id'] . '/principal.jpg')) {  ?>
                  <img id="img-maxcard" src="img/recetas/<?php echo $sin_TACC['id'] ?>/principal.jpg" class="img-fluid rounded-start" alt="...">
                <?php } else { ?>
                  <img id="img-maxcard" src="img/error.png" class="img-fluid rounded-start" alt="...">

                <?php } ?> </a>
              <div class="card-body" id="max-car-card-body">

                <div class="cardreceta-usuario">

                  <?php if (file_exists('img/user/' . $sin_TACC['usu'] . '/principal.jpg')) { ?>

                    <?php if ($session != $sin_TACC['usu'] || $session = '') { ?>
                      <a href="perfil2.php?id_usu=<?php echo $sin_TACC['usu'] ?>"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/user/<?php echo $sin_TACC['usu'] ?>/principal.jpg" alt="Usuario"></a>
                    <?php } else if ($session = $sin_TACC['usu']) { ?>
                      <a href="profile.php"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/user/<?php echo $sin_TACC['usu'] ?>/principal.jpg" alt="Usuario"></a>
                    <?php } ?>

                  <?php } else { ?>

                    <?php if ($session != $sin_TACC['usu'] || $session = '') { ?>
                      <a href="perfil2.php?id_usu=<?php echo $sin_TACC['usu'] ?>"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                    <?php } else if ($session = $sin_TACC['usu']) { ?>
                      <a href="profile.php"><img width="30px" height="30px" id="max1max" src="../home_cooking/img/usuario.jpg" alt="Usuario"></a>
                    <?php } ?>
                  <?php } ?>

                  <?php if ($session != $sin_TACC['usu'] || $session = '') { ?>
                    <a href="perfil2.php?id_usu=<?php echo $sin_TACC['usu'] ?>">
                      <p class="usuariocard"><?php echo $sin_TACC['nombre_usuario'] ?></p>
                    </a>
                  <?php } else if ($session = $sin_TACC['usu']) { ?>
                    <a href="profile.php">
                      <p class="usuariocard"><?php echo $sin_TACC['nombre_usuario'] ?></p>
                    </a>
                  <?php } ?>

                </div>

                <div class="linea"></div>

                <a href='../home_cooking/detalles_receta.php?id=<?php echo $sin_TACC["id"]; ?>&location=maxcarrusel3.php' title="Ver a detalle">
                  <h5 class="card-title"> <div class="con res"><?php echo $sin_TACC['nombre']; ?></div> </h5>
                  <p class="card-text card-pais ppais"><?php echo $sin_TACC['pais'] ?></p>
                </a>
                <div class="btncard">
                  <?php if (isset($_SESSION['usuario_activo'])) {

                    echo likes($sin_TACC["id"]);
                    echo favorito($sin_TACC["id"]);
                  ?>
                  <?php } else { ?>
                    <?php echo cantidad($sin_TACC['id']) ?>
                    <a data-bs-target="#iniciarsesion" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-regular fa-star"></i></a>

                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </article>
      <?php } ?>

      <?php require_once("aviso.php"); ?>

  </main>

  <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">


    </li>

    <li class="page-item">
      <?php
      if ($pagina == "1") {
        $pagina == "0";
        echo  "";
      } else {
        if ($pagina > 1)
          $ant = $pagina - 1;

        echo "<a class='page-link' id='cant_f' aria-label='Previous' href='maxcarrusel3.php?pag=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";

        if ($pagina - 2 < 1) {
        } else {

          echo "<li class='page-item '><a class='page-link' href='maxcarrusel3.php?pag=" . ($pagina - 2) . "' >" . ($pagina - 2) . "</a></li>";
        }



        echo "<li class='page-item '><a class='page-link' href='maxcarrusel3.php?pag=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
      }


      echo "<li class='page-item active'><a class='page-link' >" . $pagina . "</a></li>";

      $sigui = $pagina + 1;
      $ultima = $num_registros / $registros;
      if ($ultima == $pagina + 1) {
        $ultima == "";
      }
      if ($pagina < $paginas && $paginas > 1)

        echo "<li class='page-item'><a class='page-link' href='maxcarrusel3.php?pag=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";

      if ($pagina + 1 < $paginas && $paginas > 2)

        echo "<li class='page-item'><a class='page-link' href='maxcarrusel3.php?pag=" . ($pagina + 2) . "'>" . ($pagina + 2) . "</a></li>";

      if ($pagina < $paginas && $paginas > 1)



        echo " <li class='page-item'><a class='page-link' aria-label='Next' href='maxcarrusel3.php?pag=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";

      ?>

    <li class='page-item'><a id="cant-pag" class='page-link' aria-label='Next'><?php echo ceil($ultima) ?> Páginas</a>
  </ul>

</div>
</div><?php require_once("views/aviso.php") ?>
<script src="js/favorito.js"></script>
<script src="js/like.js"></script>