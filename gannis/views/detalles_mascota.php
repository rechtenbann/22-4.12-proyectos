<?php
if (isset($_SESSION['usuario'])) {
  $sql = "SELECT rol_usuarios.rol_id FROM usuarios INNER JOIN rol_usuarios ON usuarios.id = rol_usuarios.usuario_id  WHERE rol_usuarios.usuario_id = " . $_SESSION['usuario']['id'] . "";
  $res = mysqli_query($con, $sql);
  $id_usu = mysqli_fetch_assoc($res);
}

foreach ($mascotas as $mascotas) { ?>
  <div class="container">
    <?php if ($mascotas['animal'] == "Gato") {
      echo  "<ol class='breadcrumb'>";
      echo "<li><a href='index.php'>Inicio</a></li>";
      echo "<li><a href='gatos.php'>Gatos </a></li>";
      echo "<li class='b-active'> $mascotas[nombre] </li>";
      echo " </ol>";
    }
    ?>
    <?php
    if ($mascotas['animal'] == "Perro") {
      echo  "<ol class='breadcrumb'>";
      echo "<li>Inicio</a></li>";
      echo "<li><a href='perros.php'>Perros</a></li>";
      echo "<li class='b-active'>  $mascotas[nombre] </li>";
      echo " </ol>";
    }
    ?>
    <div class="top">
      <p class="drh2"><?php echo $mascotas['nombre'] ?></p>
      <?php
      if (!isset($_SESSION['usuario'])) { ?>
        <button class="btn btn-secondary" data-bs-target='#avisoadoptar' data-bs-toggle='modal' data-bs-dismiss='modal'>Adoptar</button>
      <?php } else if ($id_usu['rol_id'] == 1) { ?>
        <button class="btn btn-secondary" data-bs-target='#adoptar' data-bs-toggle='modal' data-bs-dismiss='modal'>Adoptar</button>
      <?php } else if ($_SESSION['usuario']['id'] == $usue['usuario_id']) {; ?>
        <button class="btn btn-secondary" data-bs-target='#editar' data-bs-toggle='modal' data-bs-dismiss='modal'>Editar</button>
      <?php } else {
      } ?>
    </div>

    <?php if (isset($rutas)) {
      $imgs = [];
      for ($i = 1; $i < count($rutas) / 2; $i++) {
        if ($i == 1) {
          $imgs[$i] = "principal.jpg";
        } else {
          $imgs[$i] = "recortada-" . $i . ".jpg";
        }
      }
    } ?>

    <?php
    if (isset($rutas)) {
      if (count($imgs) >= 4) { ?>
        <div class="carousel">
          <button aria-label="Anterior" class="carousel__anterior3">
            <i class="fas fa-chevron-left"></i>
          </button>
          <div class="carousel__lista3">
            <?php for ($i = 1; $i <= count($imgs); $i++) { ?>
                <a class="aimg" type="button" data-bs-toggle="modal" data-bs-target="#modalimg<?php echo $i ?>">
                  <img class="imgscar" src="img/mascotas/<?php echo $b ?>/<?php echo $imgs[$i] ?>">
                </a>
            <?php } ?>
          </div>
          <button aria-label="Siguiente" class="carousel__siguiente3">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      <?php   } else { ?>
        <div class="imgsdm">
          <?php for ($i = 1; $i <= count($imgs); $i++) { ?>
            <a class="aimg" type="button" data-bs-toggle="modal" data-bs-target="#modalimg<?php echo $i ?>">
              <img class="imgscar2" height='400px' src="img/mascotas/<?php echo $b ?>/<?php echo $imgs[$i] ?>">
            </a>
          <?php } ?>
        </div>
      <?php }
    } else { ?>
      <div class="imgsdm">
        <a class="aimg" type="button" data-bs-toggle="modal" data-bs-target="#modalimgerror">
          <img class="imgscar2" height='400px' src="img/errorImg.png">
        </a>
      </div>
    <?php } ?>
    <div class="row align-items-center">
      <div class="col col-dm">
        <h2>Mis datos:</h2>
        <ul class="listado">
          <li>Edad: <?php echo $mascotas['edad'] ?></li>
          <li>Sexo: <?php echo $mascotas['sexo'] ?></li>
          <li>Tamaño: <?php echo $mascotas['tamano'] ?></li>
          <li>Peso: <?php echo $mascotas['peso'] ?>kg</li>
          <li>Nivel de actividad: <?php echo $mascotas['nivel_de_actividad'] ?></li>
        </ul>
      </div>
      <div class="col col-dm">
        <h2>Estado:</h2>
        <ul class="listado">
          <li>Vacunado: <?php echo $mascotas['vacunado'] ?></li>
          <li>Esterilizado: <?php echo $mascotas['esterlizado'] ?></li>
          <li>Desparasitado: <?php echo $mascotas['desparasitado'] ?></li>
        </ul>
      </div>
      <div class="col col-dm">
        <h2>Necesidades:</h2>
        <p><?php echo $mascotas['necesidades'] ?></p>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col col-dm">
        <h2>Especificaciones:</h2>
        <p><?php echo $mascotas['especificaciones'] ?></p>
      </div>
      <div class="col col-dm">
        <h2>Historia:</h2>
        <p><?php echo $mascotas['historia'] ?></p>
      </div>
      <div class="col col-dm">
        <h2>Requisitos:</h2>
        <p><?php echo $mascotas['requisitos'] ?></p>
      </div>
    </div>
  <?php } ?>

  <div class="carousel container">
    <div class="titulocarrusel">
      <h3>Más mascotas de esta organización</h3>
    </div>
    <button aria-label="Anterior" class="carousel__anterior">
      <i class="fas fa-chevron-left"></i>
    </button>
    <div class="carousel__lista">
      <?php foreach ($mascota as $mascota) { ?>
        <a href='../gannis/detalles_mascota.php?id=<?php echo $mascota["id"]; ?>&location=index.php'>
          <div class="card card-min">
            <?php if (file_exists('img/mascotas/' . $mascota["id"] . '/principal.jpg')) { ?>
              <img class='card_image' height='220px' src="img/mascotas/<?php echo $mascota['id'] ?>/principal.jpg">
            <?php  } else { ?>
              <img class='card_image' height='220px' src="img/errorImg.png">
            <?php } ?>
            <p class="card_name"> <?php echo $mascota['nombre']; ?></p>
            <div class="grid-container">
              <div class="about about1">
                <?php echo $mascota['sexo'] ?>
              </div>
              <div class="about">
                <?php echo $mascota['edad']; ?>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>
    <button aria-label="Siguiente" class="carousel__siguiente">
      <i class="fas fa-chevron-right"></i>
    </button>
  </div>

  </div>
  <?php require_once "adopcion.php"; ?>
  <?php require_once "edicion.php"; ?>
  <?php require_once "avisoAdopcion.php"; ?>

  <!-- MODAL DE IMGS -->

  <?php if (isset($rutas)) { ?>
    <?php for ($i = 1; $i <= count($imgs); $i++) { ?>
      <div class="modal fade" id="modalimg<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content mc-img">
            <div class="modal-body mb-img">
              <img src="img/mascotas/<?php echo $b ?>/<?php echo $imgs[$i] ?>">
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php } else { ?>
    <div class="modal fade" id="modalimgerror" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mc-img">
          <div class="modal-body mb-img">
            <img src="img/errorImg.png">
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <script src="js/carrusel.js"></script>
  <script src="js/carrusel3.js"></script>