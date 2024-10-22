<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/">
<link rel="stylesheet" href="css/estilonav.css">
<!-- Custom styles for this template -->

<?php
require_once "includes/config.php";
if (isset($_SESSION['usu'])) { ?>
    <main>
        <nav class="navbar navbar-dark bg-dark" aria-label="Dark offcanvas navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="img/logofooter.png" style="width:200px"></a>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if ($_SESSION['usu']['rol'] == 2 || $_SESSION['usu']['rol'] == 3) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="listado_usu.php">
                                <p class="text-light bg-dark">Usuarios</p>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if ($_SESSION['usu']['rol'] == 2) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="inscripciones_usu.php">
                                <p class="text-light bg-dark">Inscripciones</p>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="nosotros.php">
                            <p class="text-light bg-dark">Sobre Nosotros</p>
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="img/usuarios/<?php echo $_SESSION['usu']['foto']; ?>" style="border-radius:50%; width:45px; height:45px;" alt=""></a>
                    <div class="dropdown-menu m-0">
                        <a href="perfil.php" class="dropdown-item">Perfil</a>
                        <hr class="dropdown-divider">
                        <a href="logout.php" class="dropdown-item">Cerrar sesion</a>
                    </div>
                </div>
                <form class="d-flex" action="buscador.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
                    <button class="btn btn-info" type="submit" name="enviar">Buscar</button>
                </form>
                &nbsp;&nbsp;
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel"><img alt="" src="img/logofooter.png" style="width:300px"></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <form class="d-flex" action="buscador.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
                    <button class="btn btn-info" type="submit" name="enviar">Buscar</button>
                    </form>
                        <br>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-sharp fa-solid fa-house"></i> Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i> Perfil
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="perfil.php">Mi Perfil</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Cerrar Sesion</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="autoridades.php"><i class="fa-sharp fa-solid fa-person-military-rifle"></i> Autoridades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="inscripciones.php"><i class="fa-sharp fa-solid fa-person-military-rifle"></i> Inscripciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="operacionesfaa.php?id=1"><i class="fa-sharp fa-solid fa-jedi"></i> Operaciones Especiales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="arms.php"><i class="fa-sharp fa-solid fa-jedi"></i> Armas</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-sharp fa-solid fa-jet-fighter-up"></i> Divisiones
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="formaciones.php?id=1">Ejercito Argentino</a></li>
                                    <li><a class="dropdown-item" href="formaciones.php?id=2">Armada Argentina</a></li>
                                    <li><a class="dropdown-item" href="formaciones.php?id=3">Fuerza armada Argentina</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="conflictos2.php?pagina=1"><i class="fa-solid fa-triangle-exclamation"></i> Conflictos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-cart-shopping"></i> Mercado
                                </a>
                                <ul class="dropdown-menu">

                                    <li><a class="dropdown-item" href="misarmas.php?pagina=1">vender armas</a></li>
                                    <li><a class="dropdown-item" href="divisiones_lista.php?pagina=1">mercado libre</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-sharp fa-solid fa-jet-fighter-up"></i> Rangos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="rangos_ejercito.php?division=Ejercito">Ejercito Argentino</a></li>
                                    <li><a class="dropdown-item" href="rangos_ejercito.php?division=Armada">Armada Argentina</a></li>
                                    <li><a class="dropdown-item" href="rangos_ejercito.php?division=Fuerza_Aérea">Fuerza Aérea Argentina</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="informes2.php?pagina=1"><i class="fa-solid fa-circle-info"></i> Informes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </main>

<?php } else { ?>
    <main>
        <nav class="navbar navbar-dark bg-dark" aria-label="Dark offcanvas navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="img/logofooter.png" style="width:200px"></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="validar.php">
                            <p class="text-light bg-dark">Iniciar Sesion</p>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">
                            <p class="text-light bg-dark">Registarse</p>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link" href="nosotros.php">
                            <p class="text-light bg-dark">Sobre Nosotros</p>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" action="buscador.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
                    <button class="btn btn-info" type="submit" name="enviar">Buscar</button>
                </form>
                &nbsp;&nbsp;
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel"><img alt="" src="img/logofooter.png" style="width:300px"></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <form class="d-flex" action="buscador.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
                    <button class="btn btn-info" type="submit" name="enviar">Buscar</button>
                    </form>
                        <br>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-sharp fa-solid fa-house"></i> Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="autoridades.php"><i class="fa-sharp fa-solid fa-person-military-rifle"></i> Autoridades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="inscripciones.php"><i class="fa-sharp fa-solid fa-person-military-rifle"></i> Inscripciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="operacionesfaa.php?id=1"><i class="fa-sharp fa-solid fa-jedi"></i> Operaciones Especiales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="arms.php"><i class="fa-sharp fa-solid fa-jedi"></i> Armas</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-sharp fa-solid fa-jet-fighter-up"></i> Divisiones
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="formaciones.php?id=1">Ejercito Argentino</a></li>
                                    <li><a class="dropdown-item" href="formaciones.php?id=2">Armada Argentina</a></li>
                                    <li><a class="dropdown-item" href="formaciones.php?id=3">Fuerza armada Argentina</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="conflictos2.php?pagina=1"><i class="fa-solid fa-triangle-exclamation"></i> Conflictos</a>
                            </li>
                            <?php if (isset($_SESSION['usu'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="divisiones_lista.php?pagina=1"><i class="fa-solid fa-cart-shopping"></i> Mercado</a>
                                </li>
                            <?php } ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-sharp fa-solid fa-jet-fighter-up"></i> Rangos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="rangos_ejercito.php?division=Ejercito">Ejercito Argentino</a></li>
                                    <li><a class="dropdown-item" href="rangos_ejercito.php?division=Armada">Armada Argentina</a></li>
                                    <li><a class="dropdown-item" href="rangos_ejercito.php?division=Fuerza_Aérea">Fuerza Aérea Argentina</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="informes2.php?pagina=1"><i class="fa-solid fa-circle-info"></i> Informes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </main>

<?php } ?>