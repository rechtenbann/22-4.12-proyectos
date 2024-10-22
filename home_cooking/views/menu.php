<?php
require_once("sesion.php");
require_once("config.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <?php if (!isset($_SESSION['usuario_activo']['rango_id'])) { ?>
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" aria-current="page" href="index.php?"><i class="fa-solid fa-house"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" aria-current="page" href="sobrenosotros.php?"><i class="fa-solid fa-circle-info"></i> Sobre Nosotros</a>
                    </li>
                </ul>
                <div class="herramientas-busqueda">
                    <form action="resultados.php" method="GET">

                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">

                            <div class="input-group ">

                                <!--Buscador-->

                                <input type="text" name="busqueda" class="form-control" value="<?php echo (isset($busqueda) ? $busqueda : '') ?>">
                                <button type="text" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>

                            </div>

                        </div>

                    </form>
                    <button class="btn btn-primary filtro-menu" data-bs-target="#filtro" data-bs-toggle="modal" data-bs-dismiss="modal">Filtro</button>
                </div>
            <?php } else if ($_SESSION['usuario_activo']['rango_id'] == 1) { ?>
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" aria-current="page" href="index.php?"><i class="fa-solid fa-house"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" aria-current="page" href="sobrenosotros.php?"><i class="fa-solid fa-circle-info"></i> Sobre Nosotros</a>
                    </li>

                </ul>
                <div class="herramientas-busqueda">
                    <form action="resultados.php" method="GET">
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
                            <div class="input-group ">

                                <input placeholder="Buscar" type="text" name="busqueda" class="form-control" value="<?php echo (isset($busqueda) ? $busqueda : '') ?>">
                                <button type="text" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>

                            </div>
                        </div>
                    </form>
                    <button class="btn btn-primary filtro-menu" data-bs-target="#filtro" data-bs-toggle="modal" data-bs-dismiss="modal">Filtro</button>
                </div>


            <?php } else if ($_SESSION['usuario_activo']['rango_id'] == 2) { ?>
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" aria-current="page" href="index.php?"><i class="fa-solid fa-house"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" aria-current="page" href="sobrenosotros.php?"><i class="fa-solid fa-circle-info"></i> Sobre Nosotros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="buttonAdmin" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear"></i> Administrador</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown03">
                            <li><a class="dropdown-item" href="tabla_de_recetas.php?">Recetas</a></li>
                            <li><a class="dropdown-item" href="tabla_de_usuarios.php?">Usuarios</a></li>
                            <li><a class="dropdown-item" href="interacciones.php?">Interacciones</a></li>
                        </ul>
                    </li>

                </ul>
                <div class="herramientas-busqueda">
                    <form action="resultados.php" method="GET">
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
                            <div class="input-group" id="input-menu">
                                <input placeholder="Buscar" type="text" name="busqueda" class="form-control" value="<?php echo (isset($busqueda) ? $busqueda : '') ?>">
                                <button type="text" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-primary filtro-menu" data-bs-target="#filtro" data-bs-toggle="modal" data-bs-dismiss="modal">Filtro</button>
                </div>

            <?php }
            if (isset($_SESSION['usuario_activo'])) { ?>
                <div class="container-icon-usuario">
                    <div class="col-md-3 text-end ">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            <?php if (file_exists('img/user/' . $_SESSION['usuario_activo']['id'] . '/principal.jpg')) { ?>
                                <a href="profile.php?"><img class="foto" id="user" src="img/user/<?php echo $_SESSION['usuario_activo']['id'] ?>/principal.jpg" alt="Tu foto"></a>
                            <?php } else { ?>
                                <a href="profile.php?"><img class="foto" id="user" src="img/usuario.jpg" alt="Tu foto"></a>
                            <?php } ?>

                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php?"><i class="fa-solid fa-circle-user"></i> Perfil</a></li>
                            <li><a class="dropdown-item" href="logout.php?"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión </a></li>
                            <!-- <button onclick="location.href='logout.php'" type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#logout">Cerrar sesión</button>-->
                        </ul>
                    </div>
                </div>

            <?php } else { ?>
                <div class="col-md-3 text-end">
                    <button onclick="location.href='inicio_sesion.php'" type="button" id="ini-ses" class="btn btn-light btn-sm">Iniciar sesión</button>
                    <button onclick="location.href='registro.php'" type="button" id="res-ses" class="btn btn-light btn-sm">Registrarse</button>
                </div>
            <?php } ?>
        </div>
</nav>
<div class="modal fade" id="filtro" aria-hidden="true" aria-labelledby="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" id="modal-filtro">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Filtrador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="filtro_busqueda.php" method="Post">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Categorias
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php foreach ($categorias as $categoria) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $categoria['id'] ?>" id="flexCheckDefault" name="categoria_id[]" />
                                            <label class="form-check-label" for="tipo"><?php echo $categoria['categoria'] ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Sub categorias Postre
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php foreach ($subcategorias as $subcategoria) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $subcategoria['id'] ?>" id="flexCheckDefault" name="subcategoria_id[]" />
                                            <label class="form-check-label" for="tipo"><?php echo $subcategoria['sub_categoria'] ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="acordion-filtro2">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Sub categorias Comidas
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php foreach ($subcategoriasc as $subcategoriac) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $subcategoriac['id'] ?>" id="flexCheckDefault" name="subcategoria_id[]" />
                                            <label class="form-check-label" for="tipo"><?php echo $subcategoriac['sub_categoria'] ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        Pais
                        <select name="pais">
                            <?php foreach ($paises as $pais) { ?>
                                <option value="<?php echo $pais['id'] ?>"><?php echo $pais['pais'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" value="procesar" class="btn btn-primary">Procesar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>