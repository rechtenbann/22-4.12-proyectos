<main>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img\1.png" class="d-block w-1000">
                <div class="carousel-caption d-none d-md-block">
                </div>

            </div>
            <div class="carousel-item">
                <img src="img\2.png" class="d-block w-1000">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="img\3.png" class="d-block w-1000">
                <div class="carousel-caption d-none d-md-block">

                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>

    </div>

    <div class="container">


        <!-- Carrousel de Gatos-->
        <div class="carousel container">
            <div class="titulocarrusel">
                <h3>Gatos en adopción</h3>
                <!-- link a la pagina para ver mas perros en adopcion -->
                <div class="botones-home">
                    <button class="btn btn-warning" data-bs-target="#filtro" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-filter"></i>  Filtro </button>
                    <a href="gatos.php" class="btn btn-warning">Más mascotas</a>
                </div>

            </div>
            <button aria-label="Anterior" class="carousel__anterior">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="carousel__lista">
                <?php foreach ($gatos as $mascota) { ?>
                    <a href='../gannis/detalles_mascota.php?id=<?php echo $mascota["id"]; ?>&location=index.php'>
                        <div class="card card-min">
                            <?php if (file_exists('img/mascotas/' . $mascota["id"] . '/principal.jpg')) { ?>
                                <img class='card_image' height='220px' src="img/mascotas/<?php echo  $mascota["id"] ?>/principal.jpg">
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
        <!-- Carrousel de perros-->
        <div class="carousel container">
            <div class="titulocarrusel">
                <h3>Perros en adopción</h3>
                <!-- link a la pagina para ver mas perros en adopcion -->
                <a href="perros.php" class="btn btn-warning">Más mascotas</a>
            </div>
            <button aria-label="Anterior" class="carousel__anterior2">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="carousel__lista2">
                <?php foreach ($perros as $mascota) { ?>
                    <a href='../gannis/detalles_mascota.php?id=<?php echo $mascota["id"]; ?>&location=index.php'>
                        <div class="card card-min">
                            <?php if (file_exists('img/mascotas/' . $mascota["id"] . '/principal.jpg')) { ?>
                                <img class='card_image' height='220px' src="img/mascotas/<?php echo  $mascota["id"] ?>/principal.jpg">
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

            <button aria-label="Siguiente" class="carousel__siguiente2">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>


        <script src="js/carrusel.js"></script>
        <script src="js/carrusel2.js"></script>
        <?php require_once "filtro.php"; ?>