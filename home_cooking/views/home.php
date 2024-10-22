<!-- Three columns of text below the carousel -->
<?php require_once("sesion.php") ?>


<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <img src="../home_cooking/img/home-carrusel.jpg" alt="...">
            </svg>

            <div class="container">

                <div class="carousel-caption text-start">

                    <h3>¡Bienvenido a Home Cooking!</h3>

                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <img src="../home_cooking/img/galletas.jpg" alt="...">
            </svg>

            <div class="container">
                <div class="carousel-caption">
                    <h3>¡Acá podrás compartir esas deliciosas recetas tradicionales y hasta tus recetas más personales!</h3>

                </div>
            </div>
        </div>
        <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <img src="../home_cooking/img/frascos.jpg" alt="...">
            </svg>

            <div class="container">
                <div class="carousel-caption text-end">
                    <h3>¡Disfruta de la variedad de platillos que tenemos para ofrecerte!</h3>

                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container marketing">

    <div class="titulocarrusel">
        <h3 class="h1_categoria">Recetas de tus compañeros de cocina:</h3>
        <a href="maxcarrusel1.php" class="btn btn-light">Más recetas</a>
    </div>

    <div class="container">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($comidas as $comida) { ?>
                    <div class="swiper-slide">
                        <div class="card card-rec" style="width: 18rem;">
                            <a href='../home_cooking/detalles_receta.php?id=<?php echo $comida["id"]; ?>&location=index.php'>
                                <?php if (file_exists('img/recetas/' . $comida['id'] . '/principal.jpg')) {  ?>
                                    <img src="img/recetas/<?php echo $comida['id'] ?>/principal.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="img/error.png" class="card-img-top" alt="...">

                                <?php } ?>
                            </a>

                            <div class="card-body">
                                <a href='../home_cooking/detalles_receta.php?id=<?php echo $comida["id"]; ?>&location=index.php'>
                                    <h5 class="card-title"> <div class="cont-res"> <?php echo $comida['nombre']; ?></div></h5>
                                    <p class="card-text card-pais">
                                        <?php echo $comida['pais'] ?>
                                    </p>
                                    <p class="card-text descripcion-carrusel">
                                        <?php echo $comida['descripcion']; ?>
                                    </p>
                                </a>
                                <div class="btncard">
                                    <?php if (isset($_SESSION['usuario_activo'])) {
                                        echo likes($comida["id"]);
                                        echo favorito($comida["id"]);
                                    ?>

                                    <?php } else { ?>
                                        <?php echo cantidad($comida['id']) ?>
                                        <a data-bs-target="#iniciarsesion" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-regular fa-star"></i></a>
                                    <?php } ?>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
            <div id="der1" class="swiper-button-next"></div>
            <div id="izq1" class="swiper-button-prev"></div>

        </div>
    </div>

    <!--Carrusel de comida vegana-->

    <div class="titulocarrusel">
        <h3 class="h1_categoria">Recetas veganas:</h3>
        <a href="maxcarrusel2.php" class="btn btn-light">Más recetas</a>
    </div>


    <div class="container">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($com_veg as $vegano) { ?>
                    <div class="swiper-slide">
                        <div class="card card-rec" style="width: 18rem;">
                            <a href='../home_cooking/detalles_receta.php?id=<?php echo $vegano["id"]; ?>&location=index.php'>
                                <?php $pais_id = $vegano['pais_id']; ?>
                                <?php if (file_exists('img/recetas/' . $vegano['id'] . '/principal.jpg')) {  ?>
                                    <img src="img/recetas/<?php echo $vegano['id'] ?>/principal.jpg" class="card-img-top" alt="...">
                                <?php } else { ?>
                                    <img src="img/error.png" class="card-img-top" alt="...">

                                <?php } ?>
                            </a>
                            <a href='../home_cooking/detalles_receta.php?id=<?php echo $vegano["id"]; ?>&location=index.php'>
                                <div class="card-body">
                                    <h5 class="card-title"> <div class="cont-res"><?php echo $vegano['nombre']; ?></div> </h5>
                                    <p class="card-text card-pais">
                                        <?php echo $vegano['pais'] ?>
                                    </p>
                                    <p class="card-text descripcion-carrusel">
                                        <?php echo $vegano['descripcion']; ?>
                                    </p>
                            </a>
                            <div class="btncard">
                                <?php if (isset($_SESSION['usuario_activo'])) {
                                    echo dos($vegano["id"]);
                                    echo fdos($vegano["id"]);
                                ?>

                                <?php } else { ?>
                                    <?php echo cantidad($vegano['id']) ?>
                                    <a data-bs-target="#iniciarsesion" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-regular fa-star"></i></a>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
            </div>
        <?php } ?>
        </div>
        <div id="der1" class="swiper-button-next"></div>
        <div id="izq1" class="swiper-button-prev"></div>

    </div>
</div>


<!--Carrusel de comida para celiacos-->


<div class="titulocarrusel">
    <h3 class="h1_categoria">Recetas aptas para celiacos:</h3>
    <a href="maxcarrusel3.php" class="btn btn-light">Más recetas</a>
</div>


<div class="container">

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($com_celiacos as $sin_TACC) { ?>
                <div class="swiper-slide">
                    <div class="card card-rec" style="width: 18rem;">
                        <a href='../home_cooking/detalles_receta.php?id=<?php echo $sin_TACC["id"]; ?>&location=index.php'>
                            <?php $pais_id = $sin_TACC['pais_id']; ?>
                            <?php if (file_exists('img/recetas/' . $sin_TACC['id'] . '/principal.jpg')) {  ?>
                                <img src="img/recetas/<?php echo $sin_TACC['id'] ?>/principal.jpg" class="card-img-top" alt="...">
                            <?php } else { ?>
                                <img src="img/error.png" class="card-img-top" alt="...">

                            <?php } ?>
                        </a>
                        <div class="card-body">
                            <a href='../home_cooking/detalles_receta.php?id=<?php echo $sin_TACC["id"]; ?>&location=index.php'>

                                <h5 class="card-title">  <div class="cont-res"><?php echo $sin_TACC['nombre']; ?></div> </h5>
                                <p class="card-text card-pais">
                                    <?php echo $sin_TACC['pais'] ?>
                                </p>
                                <p class="card-text descripcion-carrusel">
                                    <?php echo $sin_TACC['descripcion']; ?>
                                </p>
                            </a>
                            <div class="btncard">
                                <?php if (isset($_SESSION['usuario_activo'])) {

                                    echo tres($sin_TACC["id"]);
                                    echo ftres($sin_TACC["id"]);
                                ?>

                                <?php } else { ?>
                                    <?php echo cantidad($sin_TACC["id"]) ?>
                                    <a data-bs-target="#iniciarsesion" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-regular fa-star"></i></a>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div> <?php
                    } ?>
        </div>
        <div id="der1" class="swiper-button-next"></div>
        <div id="izq1" class="swiper-button-prev"></div>

    </div>
</div>


</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/crs.js"></script>

<?php require_once("aviso.php"); ?>
<script src="js/favorito.js"></script>
<script src="js/like.js"></script>
<script src="js/dos.js"></script>
<script src="js/tres.js"></script>