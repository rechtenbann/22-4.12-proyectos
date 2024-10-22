<?php
require_once('session_start.php');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://mrwgifs.com/wp-content/uploads/2014/02/Ditto-Dance-Rave-All-Over-The-Place-In-Pokemon-Gif.gif" Target="_blank">
      <img src="img\logo.png" alt="" width="230" height="50" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <?php
        if (!isset($_SESSION['usuario'])) { ?>
          <li class="nav-item">
            <a class="nav-link <?php if ($view == 'home') {
                                  echo "nav-link2";
                                }; ?>" href="index.php"></i><i class="fa-solid fa-house-chimney"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($view == 'sobrenosotros') {
                                  echo "nav-link2";
                                }; ?>" href="sobrenosotros.php"><i class="fa-solid fa-circle-info"></i> Sobre Nosotros</a>
          </li>
          <div class="dropdown">
              <a class="nav-link <?php if ($view=='todosadopt' || $view=='gatos' || $view=='perros') { echo "nav-link2"; }; ?> " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-caret-down"></i>  Mascotas 
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="todosadopt.php"> <i class="fas fa-paw"></i> Todos</a></li>
                <li><a class="dropdown-item" href="gatos.php"> <i class="fas fa-cat"></i> Gatos</a></li>
                <li><a class="dropdown-item" href="perros.php"> <i class="fas fa-dog"></i> Perros</a></li>
              </ul>
            </div>
          <?php
        } else {
          if ($_SESSION['usuario']['rol_id'] == 1) { ?>
            <li class="nav-item">
              <a class="nav-link <?php if ($view == 'home') {
                                    echo "nav-link2";
                                  }; ?>" href="index.php"></i><i class="fa-solid fa-house-chimney"></i> Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($view == 'sobrenosotros') {
                                    echo "nav-link2";
                                  }; ?>" href="sobrenosotros.php"><i class="fa-solid fa-circle-info"></i> Sobre Nosotros</a>
            </li>
            <div class="dropdown">
              <a class="nav-link <?php if ($view=='todosadopt' || $view=='gatos' || $view=='perros') { echo "nav-link2"; }; ?> " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-caret-down"></i> Mascotas 
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="todosadopt.php"><i class="fas fa-paw"></i> Todos</a></li>
                <li><a class="dropdown-item" href="gatos.php"> <i class="fas fa-cat"></i> Gatos</a></li>
                <li><a class="dropdown-item" href="perros.php"> <i class="fas fa-dog"></i> Perros</a></li>
              </ul>
            </div>
          <?php } else if ($_SESSION['usuario']['rol_id'] == 2) { ?>
            <li class="nav-item">
              <a class="nav-link <?php if ($view == 'home') {
                                    echo "nav-link2";
                                  }; ?>" href="index.php"></i><i class="fa-solid fa-house-chimney"></i> Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($view == 'sobrenosotros') {
                                    echo "nav-link2";
                                  }; ?>" href="sobrenosotros.php"><i class="fa-solid fa-circle-info"></i> Sobre Nosotros</a>
            </li>
          <?php } else if ($_SESSION['usuario']['rol_id'] == 3) { ?>
            <li class="nav-item">
              <a class="nav-link <?php if ($view == 'home') {
                                    echo "nav-link2";
                                  }; ?>" href="index.php"></i><i class="fa-solid fa-house-chimney"></i> Inicio</a>
            </li>
            <div class="dropdown">
              <a class="nav-link <?php if ($view=='todosadopt' || $view=='gatos' || $view=='perros') { echo "nav-link2"; }; ?> " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-caret-down"></i> Mascotas 
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="todosadopt.php"><i class="fas fa-paw"></i> Todos</a></li>
                <li><a class="dropdown-item" href="gatos.php"> <i class="fas fa-cat"></i> Gatos</a></li>
                <li><a class="dropdown-item" href="perros.php"><i class="fas fa-dog"></i> Perros</a></li>
              </ul>
            </div>
            <li class="nav-item">
              <a class="nav-link <?php if ($view == 'sobrenosotros') {
                                    echo "nav-link2";
                                  }; ?>" href="sobrenosotros.php"><i class="fa-solid fa-circle-info"></i> Sobre Nosotros</a>
            </li>
            <div class="dropdown">
              <a class="nav-link <?php if ($view == 'listado_mascota' || $view == 'listado_organizaciones' || $view == 'listado_adoptantes') {
                                    echo "nav-link2";
                                  }; ?>" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-caret-down"></i> Listados</a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="listado_mascota.php"><i class="fas fa-paw"></i> Mascotas</a></li>
                <li><a class="dropdown-item" href="listado_adoptantes.php"><i class="fas fa-user-tie"></i> Adoptantes</a></li>
                <li><a class="dropdown-item" href="listado_organizaciones.php"><i class="fas fa-users"></i> Organizaciones</a></li>
              </ul>
           </div>
          
          
        <?php }
        }
        ?>
      </ul>

    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <?php
      if (isset($_SESSION['usuario'])) { ?>
        <div class="d-grid gap-2  gap-22 d-md-flex justify-content-md-end botonav">

          <p id="p">
            <?php if ($_SESSION['usuario']['rol_id'] == 1) { ?>

          <div class="dropdown">
            <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if (file_exists('img/usuarios/' . $_SESSION['usuario']['id'] . '/principal.jpg')) { ?>
                <img class="foto" id="user" src="img/usuarios/<?php echo $_SESSION['usuario']['id'] ?>/principal.jpg" alt="Tu foto">
              <?php } else { ?>
                <img class="foto" id="user" src="img/usuario.jpg" alt="Tu foto">
              <?php } ?>
            </a>
            <ul class="dropdown-menu drop-perfil" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item rol-drop">Registrado como <br><b>Adoptante</b></a></li>
              <li><a href="perfil_ado.php" class="dropdown-item item-sec"><i class="fa-solid fa-user"></i> Perfil</a></li>
              <li><a type="button" data-bs-toggle="modal" data-bs-target="#logout" class="dropdown-item item-sec"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a></li>
            </ul>
          </div>

        <?php } else if ($_SESSION['usuario']['rol_id'] == 2) { ?>
          <div class="dropdown">
            <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if (file_exists('img/usuarios/' . $_SESSION['usuario']['id'] . '/principal.jpg')) { ?>
                <img class="foto" id="user" src="img/usuarios/<?php echo $_SESSION['usuario']['id'] ?>/principal.jpg" alt="Tu foto">
              <?php } else { ?>
                <img class="foto" id="user" src="img/usuario.jpg" alt="Tu foto">
              <?php } ?>
            </a>
            <ul class="dropdown-menu drop-perfil" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item rol-drop">Registrado como <br><b>Organizacion</b></a></li>
              <li><a href="perfil_org.php" class="dropdown-item item-sec"><i class="fa-solid fa-user"></i> Perfil</a></li>
              <li><a href="registro_mascota.php" class="dropdown-item item-sec"><i class="fas fa-upload"></i> Subir mascota</a></li>
              <li><a type="button" data-bs-toggle="modal" data-bs-target="#logout" class="dropdown-item item-sec"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a></li>
            </ul>
          </div>

        <?php } else if ($_SESSION['usuario']['rol_id'] == 3) { ?>
          <div class="dropdown">
            <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if (file_exists('img/usuarios/' . $_SESSION['usuario']['id'] . '/principal.jpg')) { ?>
                <img class="foto" id="user" src="img/usuarios/<?php echo $_SESSION['usuario']['id'] ?>/principal.jpg" alt="Tu foto">
              <?php } else { ?>
                <img class="foto" id="user" src="img/usuario.jpg" alt="Tu foto">
              <?php } ?>
            </a>
            <ul class="dropdown-menu drop-perfil" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item rol-drop">Registrado como <br><b>Admin</b></a></li>
              <li><a href="perfil_admin.php" class="dropdown-item item-sec"><i class="fa-solid fa-user"></i> Perfil</a></li>
              <li><a type="button" data-bs-toggle="modal" data-bs-target="#logout" class="dropdown-item item-sec"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a></li>
            </ul>
          </div>

        <?php } ?>
 
        </div> 
        <?php
              } else { ?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary me-md-2" href="inicio_sesion.php">Iniciar sesión</a>
          <button class="btn btn-primary" data-bs-target="#registro" data-bs-toggle="modal" data-bs-dismiss="modal">Registrarse</button>
        </div>
      <?php } ?>
    </div>
  </div>
</nav>

<?php require_once "registro.php"; ?>
<?php require_once "logout.php"; ?>